<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use App\Value;
use App\Skill;
use App\Label;
use App\Feedback;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Image;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Jenssegers\Agent\Agent;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\View\Factory;


class UserController extends Controller
{
    public function getUserIndex()
    {
        return view('users.UserList');
    }
    public function UserRegister(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->register_token = NULL;
        $user->status = 1;
        $user->save();

        return redirect()->route('login');
    }

    public function RegisterForm(Request $request)
    {
        $token = $request->input('token');
        if ($token == NULL)
            return redirect()->route('login')->with('message', 'Invalid registration token');
        $user = User::where('register_token', $token)->first();
        if ($user != null)
            return view('users.UserRegister')->with('user', $user);
        else
            return redirect()->route('login')->with('message', 'Invalid registration token');
    }

    public function ShowEditUser(Request $request)
    {
        $user = Auth()->user();
        return view('users.edit')->with(['user' => $user]);

    }
    public function EditUser(Request $request)
    {
        $user = Auth()->user();
        $user->name = $request->input('name');
        $user->save();
        var_dump($user->name);

        return back()->with('message', 'Profile Updated');
    }

    public function UserPassword(ChangePasswordRequest $request)
    {
        $user = Auth()->user();
        $validated = $request->validated();
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');

        if (Hash::check($old_password, $user->password)) {
            $user->password = Hash::make($new_password);
            $user->save();
            return back()->with('message', 'Password succesfully changed');
        } else {
            return back()->with('message', 'Invalid old password');
        }
        
    }

    public function AdminListUsers(Request $request){
        $users = User::all();

        return view('users.client')->with('users',$users);

    }
    public function DeleteUser($id){

        $user = User::find($id);

        $user->delete();

        return redirect()->route('AdminGetUserList')->with('message', 'Client sters cu succes!');
    } 
}
