<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\User;

class AdminController extends Controller
{
    public function CreateUser(Request $request)
    {
        $mail = $request->input('email');
        if (count(User::where('email', $mail)->get()) != 0) {
            return back()->with('error', 'Email already in use');
        } else {
            $token = Str::random(15);
            $user = new User;
            $user->name = '-';
            $user->email = $mail;
            $user->password = '-';
            $user->status = -1;
            $user->register_token = $token;
            $user->save();

            Mail::to($mail)->send(new RegistrationMail($token));

            return back()->with('message', 'Invitation sent with success');
        }
    }
}
