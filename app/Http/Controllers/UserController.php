<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(Request $request)
    {
//        dd($request);
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function actionChangePassword(Request $request)
    {
        if (!($request->get('current-password') == Auth::user()->{User::password()})) {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|max:12',
            'new-password_confirmation' => 'required|string|min:6|max:12|same:new-password',
        ]);

        $user = Auth::user();
        $user->Pw = $request->get('new-password');
        $user->save();

        return redirect()
            ->back()
            ->with("success", "Password changed successfully !");
    }

    public function changeEmail()
    {
        return view('auth.change-email');
    }

    public function actionChangeEmail(Request $request)
    {
        $userDetail = Auth::user()->userDetail;
        if (!($request->get('current-email') == $userDetail->Email)) {
            return redirect()->back()->with("error","Your current email does not matches with the email you provided. Please try again.");
        }

        if(strcmp($request->get('current-email'), $request->get('new-email')) == 0){
            return redirect()->back()->with("error","New Email cannot be same as your current email. Please choose a different email.");
        }

        $validatedData = $request->validate([
            'current-email' => 'required',
            'Email' => 'required|string|email|max:255|unique:sqlsrv_userdata.Users_Detail'
        ]);

        $userDetail->Email = $request->get('Email');
        $userDetail->save();

        return redirect()
            ->back()
            ->with("success","Email changed successfully !");
    }
}
