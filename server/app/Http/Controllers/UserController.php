<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\Role;
use App\Models\RoleConstants;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.profile', compact('user'));
    }

    public function index()
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $roles = Role::all();
        return view('admin.users.add', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $this->uploadImage($user, $request);
        $user->save();

        return redirect()->route('users.index')->with('success','Add Successfully');

    }

    public function edit($id)
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));

    }

    public function update(Request $request, $id)
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $this->uploadImage($user, $request);
        $user->save();
        return redirect()->route('users.index')->with('success','Update Successfully');;
    }

    public function delete($id)
    {
        if (!$this->userCan('admin')) {
            abort('403', __("You do not have permission"));
        }

        $city = City::where('user_id', $id)->get();
        $user = User::findOrFail($id);
        if(count($city)) {
            $success = false;
            $message = "This user is managing a city<br><br>Can not delete";

        }
        else {
            $user->delete();
            $success = true;
            $message = "Deleted successfully";
        }

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }

    public function staffEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-staff', compact('user'));
    }

    public function staffUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $this->uploadImage($user, $request);
        $user->save();

        return redirect()->route('users.profile', $user->id)->with('success','Update Successfully');
    }

    public function changePass() {
        return view('admin.users.changePass');
    }

    public function updatePass(ChangePasswordRequest $request) {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.profile',$id)->with('success','Update Password Successfully');
    }

    function uploadImage($obj, $request)
    {
        if ($request->hasfile('image')) {
            $pathImage = $request->file('image')->store('public/images');
            $obj->image = $pathImage;
        }
    }
}
