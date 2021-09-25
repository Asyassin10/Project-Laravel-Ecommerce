<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ActivateYouraccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{

    public function activation($code)
    {
        $user = User::whereCode($code)->first();
        $user->code = null;
        $user->update([
            'active' => 1
        ]);
        Auth::login($user);
        return redirect('/home')->withSuccess('connecte');
    }
    public function resendCode($email)
    {
        $user = User::whereEmail($email)->first();
        if ($user->active) {
            return redirect('/home');
        }
        Mail::to($user)->send(new ActivateYouraccount($user->code));
        return redirect('/login')->withSuccess('the activation link is sent');
        Auth::login($user);
        return redirect('/home')->withSuccess('connecte');
    }
}