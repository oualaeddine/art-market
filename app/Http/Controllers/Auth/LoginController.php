<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    protected $maxAttempts = 3;

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

    public function reload_captcha(){

        return response()->json(['captcha'=> captcha_img()]);

    }


    protected function authenticated(Request $request, $user)
    {
        $request->session()->forget('second_try');
    }


    public function showLoginForm()
    {
        if (Auth::guard('vendor')->check()){
            return  redirect()->route('vendor.home');
        }

        return view('auth.login')->with(['page_title' => 'Se connecter']);
    }

    protected function validateLogin(Request $request)
    {
        $count = $request->session()->get('second_try');

        if($request->session()->get('second_try')){

            $request->validate([
                $this->username() => 'required|string',
                'password' => 'required|string',
                'captcha' => 'required|captcha'
            ]);

        }else{

            $request->validate([
                $this->username() => 'required|string',
                'password' => 'required|string',
            ]);
        }



    }

    protected function redirectPath()
    {

        if (Auth::guard('vendor')->check()){
            return '/admin-dash/vendor/home';

        }
        return '/admin-dash/home';
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        if ($response = $this->authenticated($request, Auth::guard('vendor')->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }


    protected function attemptLogin(Request $request)
    {
        $admin= $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );

        $vendor=Auth::guard('vendor')->attempt(array_merge($this->credentials($request),['is_active'=>true]), $request->filled('remember'));
        return $admin||$vendor;
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        $request->session()->put('second_try','true');


        return $this->sendFailedLoginResponse($request);
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }


    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('vendor')->check()){
            Auth::guard('vendor')->logout();
        }else{

            $this->guard()->logout();
        }


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin-dash/login');
    }


}
