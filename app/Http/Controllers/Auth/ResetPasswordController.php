<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function redirectTo() {
        return route('home');
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email|string|max:255',
            'Pw' => 'required|string|min:6|max:12',
            'Pw_confirm' => 'required|string|min:6|max:12|same:Pw',
        ];
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->customReset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    protected function customReset(array $credentials, \Closure $callback)
    {
        $user = $this->validateReset($credentials);
        $user = $user->user;

        if (! $user instanceof CanResetPasswordContract) {
            return $user;
        }

        $password = $credentials[$this->password()];

        $callback($user, $password);

        \App\PasswordReset::query()
            ->where('email', '=', $credentials['email'])
            ->delete();

        return Password::PASSWORD_RESET;
    }

    protected function validateReset(array $credentials)
    {
        $user = UserDetail::query()
            ->where('email', '=', $credentials['email'])
            ->first();
        if (is_null($user)) {
            return Password::INVALID_USER;
        }

        $resetToken = \App\PasswordReset::query()
            ->where('email', '=', $credentials['email'])
            ->first();
        if ($resetToken) {
            $expired = $resetToken->created_at;
            if (Carbon::parse($expired)->addSeconds(config('auth.passwords.users.expire')*60)->isPast()) {
                return Password::INVALID_TOKEN;
            }
            $checkToken = Hash::check( $credentials['token'], $resetToken->token);
            if (!$checkToken) {
                return Password::INVALID_TOKEN;
            }
        }
        return $user;
    }

    protected function setUserPassword($user, $password)
    {
        $user->{$this->password()} = $password;
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only(
            'email', 'Pw', 'Pw_confirm', 'token'
        ), [
            'isResetPw' => true,
            'password' => $request->Pw
        ]);
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
