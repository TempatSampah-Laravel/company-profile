<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequestUpdate;

class UserController extends Controller
{
    public function index()
    {
        $title_page = 'User Account';
        $config = ConfigWeb::all()->first();
        $user = User::all();

        return view('admin.user.index', compact('title_page','config', 'user'));
    }

    public function create()
    {
        $title_page = 'Create User Account';
        $config = ConfigWeb::all()->first();
        $roles = Role::all();

        return view('admin.user.create', compact('title_page','config','roles'));
    }

    public function store(UserRequest $request, User $user)
    {
        $request->validated();

        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            $user['avatar'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/user');
            $img->move($filePath, $user['avatar']);
        }

        User::Create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->role_id,
            'avatar' => $user['avatar'],
        ]);

        return redirect()->route('user.index')->with(['success' => 'User Created Successfully']);
    }

    public function edit(User $user)
    {   
        $title_page = 'Edit User Account';
        $config = ConfigWeb::all()->first();
        $roles = Role::all();
        return view('admin.user.edit', compact('title_page','config','user', 'roles'));
    }

    public function update(UserRequestUpdate $request, User $user)
    {
        $request->validated();

        if ($request->hasFile('avatar')) {

            $old_image = public_path('upload/user/'.$user->avatar); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('avatar');
            $user['avatar'] = time().'-'. $img->getClientOriginalName();
            $filePath = public_path('/upload/user');
            $img->move($filePath, $user['avatar']);
            
        }

        if(!empty($request->password)) {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->get('password')),
                'role_id' => $request->role_id,
                'avatar' => $user['avatar'],
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'avatar' => $user['avatar'],
            ]);
        }

        return redirect()->back()->with(['success' => 'User Update Successfully']);
    }

    public function destroy(User $user)
    {
        $old_image = public_path('upload/user/'.$user->avatar); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old
        $user->delete();
        return redirect()->back()->with(['success' => 'User Delete Successfully']);
    }
}
