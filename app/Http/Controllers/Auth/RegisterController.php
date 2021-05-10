<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserAdmin;
use App\UserDetail;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function redirectTo() {
        return route('home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'UserName' => ['required', 'string', 'max:255'],
            'UserID' => ['required', 'string', 'max:255', 'unique:sqlsrv_userdata.Users_Master'],
            'Pw' => ['required', 'string', 'min:6', 'max:12'],
            'Pw_confirm' => ['required', 'string', 'min:6', 'max:12', 'same:Pw'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sqlsrv_userdata.Users_Master'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        $maxUserUID = $this->getMaxUserUID();
        if (!$maxUserUID) return null;

        $newUserUID = $maxUserUID + 1;

        $newlyUser = User::create([
            'UserUID' => $newUserUID,
            'UserID' => Helper::clearXSS($data['UserID']),
            'Pw' => Helper::clearXSS($data['Pw']),
            'JoinDate' => now(),
            //'Admin' => 0,
            //'AdminLevel' => 0,
            //'UseQueue' => 0,
            'Status' => 0,
            'Leave' => 0,
            'LeaveDate' => null,
            //'UserType' => 'U',
            'UserIp' => null,
            'ModiIp' => null,
            //'ModiDate' => null,
            'Point' => 0,
            //'Enpassword' => null,
            //'Birth' => null,
            'Email' => Helper::clearXSS($data['email']),
        ]);
        if ($newlyUser) {
            DB::commit();
            return $newlyUser;
        }
        DB::rollBack();
        return null;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
            $request->session()->regenerate();
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
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

    public function getMaxUserUID()
    {
        $maxUserUID = User::query()->orderBy('UserUID', 'desc')->limit(1)->first();
        return isset($maxUserUID) ? $maxUserUID->UserUID : false;
    }
}
