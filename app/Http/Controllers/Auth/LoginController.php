<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'beranda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function login(Request $request)
    {
        return view('auth.login');
    }
        public function loginku(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($request->only(['email_users','password_users']))) {
                $user = User::where('email_users', $request->input('email_users'))->first();
                return redirect()->intended(route('beranda'));
            } else {
                $user = User::where('email_users', $request->input('email_users'))->first();

                if (!$user) {
                    throw ValidationException::withMessages([
                        'email_users' => trans('Email Salah')
                    ]);
                } else {
                    if (!Hash::check($request->input('password_users'), $user->password)) {
                        throw ValidationException::withMessages([
                            'password_users' => trans('Kata Sandi Salah')
                        ]);
                    }
                }
            }
        }
}
