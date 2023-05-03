<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Repositories\Backend\Auth\UserRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use DB;

/**
 * Class UserTableController.
 */
class UserTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Auth\UserRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\Auth\UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageUserRequest $request)
    {
        debug($request->get('is_admin'));

        $is_admin = ($request->get('is_admin')=='true' ? true : false);
        // $users = $this->repository->getForDataTable($request->get('status'), $request->get('trashed'));

        $whereUser = '';
        if($is_admin){
            $whereUser = "WHERE roles.name IN ('Administrator', 'Staff')";
        } else {
            $whereUser = "WHERE roles.name NOT IN ('Administrator', 'Staff')";
        }

        $SQLQuery = 'SELECT
            users.id,
            users.first_name,
            users.last_name,
            users.email,
            users.status,
            users.confirmed,
            users.created_at,
            users.updated_at,
            users.deleted_at,
            roles.name AS roles
        FROM users
        INNER JOIN role_user ON users.id = role_user.user_id
        INNER JOIN roles ON role_user.role_id = roles.id
        '.$whereUser.'
        ORDER BY users.created_at DESC';

        debug($SQLQuery);

        $users = DB::select($SQLQuery);
        return Datatables::make($users)
            ->escapeColumns(['first_name', 'email'])
            ->editColumn('confirmed', function ($user) {
                if ($user->confirmed) {
                    return "<span class='badge badge-success'>".trans('labels.general.yes').'</span>';
                }        
                return "<span class='badge badge-danger'>".trans('labels.general.no').'</span>';
            })
            ->addColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->toDateString();
            })
            ->addColumn('updated_at', function ($user) {
                return Carbon::parse($user->updated_at)->toDateString();
            })
            ->addColumn('actions', function ($user) {

                return '
                <div class="dropdown">
                    <button class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="'.route('admin.auth.user.edit', $user->id).'">Edit</a></li>
                    <li><a class="dropdown-item" href="'.route('admin.auth.user.change-password', $user->id).'">Change Password</a></li>
                    </ul>
                </div>
                ';

            })
            ->make(true);
    }


}
