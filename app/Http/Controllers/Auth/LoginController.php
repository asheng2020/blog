<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use URL;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers {
        showLoginForm as laravelShowLoginForm;
        logout as laravelLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectToSessionKey = 'redirect_to';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        if (!$request->session()->has($this->redirectToSessionKey)) {
            $request->session()->put($this->redirectToSessionKey, URL::previous());
        }

        return $this->laravelShowLoginForm();
    }

    public function redirectTo()
    {
        $request = app(Request::class);
        $redirectTo = $request->session()->get($this->redirectToSessionKey);
        $request->session()->forget($this->redirectToSessionKey);

        return $redirectTo;
    }

    public function logout(Request $request)
    {
        $this->laravelLogout($request);

        return redirect(URL::previous());
    }
}
