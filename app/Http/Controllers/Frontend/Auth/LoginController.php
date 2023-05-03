<?php

namespace App\Http\Controllers\Frontend\Auth;

use DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if(Agent::isMobile()) {
            return view('frontend.auth.loginphone');
        }else {
            return view('frontend.auth.login');
        }
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return config('access.users.username');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function loginCustom(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $this->site_access_setup();

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => PasswordRules::login(),
            'g-recaptcha-response' => ['required_if:captcha_status,true', 'captcha'],
        ], [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param         $user
     *
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check to see if the users account is confirmed and active
        if (! $user->isConfirmed()) {
            auth()->logout();

            // If the user is pending (account approval is on)
            if ($user->isPending()) {
                throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
            }

            // Otherwise see if they want to resent the confirmation e-mail

            throw new GeneralException(__('exceptions.frontend.auth.confirmation.resend', ['url' => route('frontend.auth.account.confirm.resend', e($user->{$user->getUuidName()}))]));
        }

        if (! $user->isActive()) {
            auth()->logout();

            throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        }

        event(new UserLoggedIn($user));

        if (config('access.users.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Remove the socialite session variable if exists
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

        // Fire event, Log out user, Redirect
        event(new UserLoggedOut($request->user()));

        // Laravel specific logic
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('frontend.index');
    }

    protected function site_access_setup()
    {
        $SQLSiteAccess = "SELECT 
            ENUM_FILTER.id,
            ENUM_FILTER.group_role,            
            ENUM_FILTER.enum_site,            
            schools.school_name,
            ENUM_FILTER.enum_group,
            ENUM_FILTER.enum_code,
            ENUM_FILTER.enum_order,
            ENUM_FILTER.enum_value,
            ENUM_FILTER.enum_label        
        FROM (
            SELECT
            'PPDB' as group_role,
            CONCAT_WS('-', 
                    'ppdb', 
                    LOWER(enum_data.enum_site), 
                    LOWER(
                        CASE enum_data.enum_code
                        WHEN 'STAGE' THEN enum_data.enum_value
                        ELSE enum_data.enum_code
                        END)
                    ) AS enum_access,
            enum_data.*
            FROM enum_data 
            WHERE enum_group = 'SCHOOL_INFO'
            
            UNION ALL

            SELECT
            'INTERVIEW' as group_role,
            CONCAT_WS('-', 
                    'interview', 
                    LOWER(enum_data.enum_site), 
                    LOWER(
                        CASE enum_data.enum_code
                        WHEN 'STAGE' THEN enum_data.enum_value
                        ELSE enum_data.enum_code
                        END)
                    ) AS enum_access,
            enum_data.*
            FROM enum_data 
            WHERE enum_group = 'SCHOOL_INFO'
            
            UNION ALL
            
            SELECT
            'FINANCE' as group_role,
            CONCAT_WS('-', 
                    'finance', 
                    LOWER(enum_data.enum_site), 
                    LOWER(
                        CASE enum_data.enum_code
                        WHEN 'STAGE' THEN enum_data.enum_value
                        ELSE enum_data.enum_code
                        END)
                    ) AS enum_access,
            enum_data.*
            FROM enum_data 
            WHERE enum_group = 'SCHOOL_INFO'

            UNION ALL
            
            SELECT
            'RND' as group_role,
            CONCAT_WS('-', 
                    'rnd', 
                    LOWER(enum_data.enum_site), 
                    LOWER(
                        CASE enum_data.enum_code
                        WHEN 'STAGE' THEN enum_data.enum_value
                        ELSE enum_data.enum_code
                        END)
                    ) AS enum_access,
            enum_data.*
            FROM enum_data 
            WHERE enum_group = 'SCHOOL_INFO'
        ) ENUM_FILTER        
        INNER JOIN schools ON ENUM_FILTER.enum_site = schools.school_code
        WHERE ENUM_FILTER.enum_access IN (
            SELECT
                permissions.name AS permission_name
            FROM users
            INNER JOIN permission_user ON users.id = permission_user.user_id
            INNER JOIN permissions ON permission_user.permission_id = permissions.id
            WHERE users.id = ".auth()->id().'   
        ) ORDER BY ENUM_FILTER.id;';

        $site_access = DB::select($SQLSiteAccess);

        $schools = [];
        foreach ($site_access as $site) {
            $schools[$site->enum_site] = $site->school_name;
        }

        $school_access = [];
        foreach ($schools as $school => $item) {
            array_push($school_access, ['school_code' => $school, 'school_name' => $item]);
        }

        session(['site_access' => json_encode($site_access)]);
        session(['school_access' => json_encode($school_access)]);
    }
}
