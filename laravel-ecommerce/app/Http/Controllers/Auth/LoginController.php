<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    public function validatelogin(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => 'required|captcha'

        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$user->active) {
            Auth::logout();
            return redirect("/login")->with([
                "errorlink" => 'You must activate your account to resend the activation link pleas click
            <a href="' . route("resend", $user->email) . '">here</a>'
            ])->withEmail($user->email);
        }
    }
    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['url' => 'admin']);
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('admin.index');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}