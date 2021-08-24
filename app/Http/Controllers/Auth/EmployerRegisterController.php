<?php

namespace App\Http\Controllers\Auth;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employer');
    }

    public function showForm()
    {
        return view('auth.emp_register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'company_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:employers'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]
        );

        // Create employer user
        try {
            $employer = Employer::create([
                'name' => $request->name,
                'company_name'=> $request->company_name,
                'phone'=> $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Log the employer in
            Auth::guard('employer')->loginUsingId($employer->id);
            return redirect()->route('employer.dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }
}