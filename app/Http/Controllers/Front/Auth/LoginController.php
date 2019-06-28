<?php

namespace App\Http\Controllers\Front\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('guest:web', ['except' => 'logout']);
        $this->middleware('guest:customer', ['except' => ['logout', 'changedetails', 'changePassword']]);
    }

    public function showLoginForm()
    {
        return view('frontend.login');
    }

    public function changedetails(Request $request)
    {
        $customer = Customer::findOrFail(auth()->guard('customer')->user()->id);
        $customer->update($request->except(['email', 'password']));
        return back();
    }

    public function changePassword(Request $request)
    {
        $user = auth()->guard('customer')->user();
        // $this->validator($request->all())->validate();
        // dd($user);
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            return redirect($this->redirectTo)->with('success', 'Password change successfully!');
        } else {
            return redirect()->back()->withErrors('Current password is incorrect');
        }
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
            $customer = $this->guard()->user();
            session(['token_id' => $customer->id]);
            session(['email' => $customer->email]);
            if ($request->has('checkout') == true) {
                return redirect()->intended(url('checkout'));
            }
            return $this->sendLoginResponse($request);

        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

}
