<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Employer;

class EmployerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.emp_login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8'
            ]
        );

        // Attempt to login as employer
        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            $id = Auth::guard('employer')->user()->id;
            $employer = Employer::find($id);
            $employer->last_login_at = Carbon::now()->toDateTimeString();
            $employer->save();
            // If successful then redirect to intended route or employer dashboard
            return redirect()->intended(route('employer.dashboard'));
        }

        // If unsuccessful then redirect back to login page with email and remember fields
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('employer')->logout();
        return redirect('/employer-login');
    }
}