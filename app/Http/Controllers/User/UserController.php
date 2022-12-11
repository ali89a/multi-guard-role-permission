<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User\Designation;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Repository\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct(UserInterface $user)
    {
        $this->userRepo = $user;
    }

    public function index(Request $request)
    {

        if (\request()->ajax()) {
            $users = User::latest()->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('user_info', function ($user) {
                    return view('user.access_control.user.user-image', compact('user'));
                })
                ->addColumn('role_info', function ($user) {
                    return view('user.access_control.user.role', compact('user'));
                })
                ->addColumn('status', function ($user) {
                    switch ($user->is_active) {
                        case 'active':
                            return '<div class="badge text-capitalize badge-light-success badge-pill">ACTIVE</div>';
                        case 'inactive':
                            return '<div class="badge text-capitalize badge-light-secondary badge-pill">INACTIVE</div>';
                        case 'unused':
                            return '<div class="badge text-capitalize badge-light-danger badge-pill">UNUSED</div>';
                    }
                })
                ->addColumn('action', function ($user) {
                    return view('user.access_control.user.action-button', compact('user'));
                })

                ->rawColumns(['user_info', 'status', 'role_info', 'action'])
                ->make(true);
        }
        return view('user.access_control.user.index');
    }


    public function create()
    {
        $data = [

            'roles' => Role::where('is_default', '!=', 1)->where('company_id', Auth::guard('web')->user()->company_id)->pluck('name', 'id')
        ];

        return view('user.access_control.user.create', $data);
    }

    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['name', 'email', 'phone', 'type', 'parent_id', 'designation_id']);
            $data['password'] = bcrypt($request->phone);
            $data['business_id'] = Auth::guard('web')->user()->business_id;
            $data['created_by'] = Auth::guard('web')->user()->id;
            $user = $this->userRepo->createUser($data);
            $user->assignRole($request->get('roles'));
            DB::commit();
            return response()->successRedirect('User Created Successful!', 'user.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return response()->errorRedirect('Opps Something wrong!', 'user.users.index');
        }
    }

    public function show(User $user)
    {
        $data = [
            'user' => $user,
        ];
        return view('user.access_control.user.show', $data);
    }


    public function edit(User $user)
    {
        $data = [
            'user' => $user,
            'roles' => Role::where('guard_name', '!=', 'admin')->pluck('name', 'id'),
            'selected_roles' => Role::whereIn('name', $user->getRoleNames())->pluck('id'),
        ];
        return view('user.access_control.user.edit', $data);
    }


    public function update(UserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['password', 'roles']);
            $data['password'] = bcrypt($request->password);
            $this->userRepo->updateUser($data, $user);
            $user->syncRoles($request->get('roles'));
            DB::commit();
            return response()->successRedirect('Info Updated!', 'user.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return response()->errorRedirect('Opps Something wrong!', 'user.users.index');
        }
    }

    public function destroy(User $user)
    {
        $this->userRepo->deleteUser($user);
        return response()->successRedirect('Info Deleted!', 'user.users.index');
    }

    public function login($userId)
    {
        $data['admin'] = \auth('admin')->loginUsingId($userId);
        session(['loggedIn-from-admin' => true]);
        return redirect()->route('user.dashboard');
    }

    public function passwordReset($userId)
    {

        $user = $this->userRepo->getAnInstance($userId);
        // dd($user);
        $this->userRepo->updateUser(['password' => bcrypt('12345678')], $user);
        return response()->successRedirect('Password Reset', 'user.users.index');
    }
}
