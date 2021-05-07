<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function redirectTo() {
        return route('home');
    }

    protected function validateLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            $this->username() => 'required|string',
            $this->password() => 'required|string',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ])->redirectTo(route('dang-nhap'));
        }
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), $this->password());
    }

    public function username()
    {
        return User::username();
    }

    public function password()
    {
        return User::password();
    }
}
