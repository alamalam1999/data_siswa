<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\UserRepository;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

class UserPasswordController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Auth\UserRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\Auth\UserRepository $userRepository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     * @param \App\Models\Auth\User $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, User $user)
    {
        return view('backend.auth.user.change-password')->withUser($user);
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\UpdateUserPasswordRequest $request
     * @param \App\Models\Auth\User $user
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function update(Request $request, User $user)
    {
        $this->repository->updatePassword($user, $request->only('password'));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.access.users.updated_password'));
    }
}
