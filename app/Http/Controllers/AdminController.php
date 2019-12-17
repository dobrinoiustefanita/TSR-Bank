<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\User;

class AdminController extends Controller
{   
    function RandomString()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public function CreateUser(Request $request)
    {
        function generateRandomString($length = 10) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
       
        $mail = $request->input('email');
        if (count(User::where('email', $mail)->get()) != 0) {
            return back()->with('error', 'Email already in use');
        } else {
            $token = Str::random(15);
            
            $iban1 = mt_rand(10,99);
            $iban2 = generateRandomString();
            $iban = 'RO'.$iban1.'TSRB'.$iban2;
            $user = new User;
            $user->name = '-';
            $user->email = $mail;
            $user->password = '-';
            $user->status = -1;
            $user->register_token = $token;
            $user->iban = $iban;
            $user->save();

            Mail::to($mail)->send(new RegistrationMail($token));

            return back()->with('message', 'Invitation sent with success');
        }
    }

    

}
