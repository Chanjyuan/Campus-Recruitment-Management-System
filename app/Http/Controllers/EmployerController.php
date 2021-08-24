<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\Post;
use App\User;
use Auth;
use DB;
use Hash;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employer_id = Auth::user()->id;
        $postCount = Post::where('employer_id', $employer_id)->count();
        $apps = DB::table('applications')->join('posts', 'posts.id', 'applications.post_id')
                                         ->where('employer_id', $employer_id)
                                         ->count();
        $posts = Post::where('employer_id', $employer_id)->orderBy('created_at', 'desc')->get();

        $p = Post::where('employer_id', $employer_id)->whereHas('applications', function($pCount){
            $pCount->where('status', 'Pending');
        })->count();

        $s = Post::where('employer_id', $employer_id)->whereHas('applications', function($sCount){
            $sCount->where('status', 'Shortlisted');
        })->count();

        $r = Post::where('employer_id', $employer_id)->whereHas('applications', function($rCount){
            $rCount->where('status', 'Rejected');
        })->count();

        $w = Post::where('employer_id', $employer_id)->whereHas('applications', function($wCount){
            $wCount->where('status', 'Withdrawn');
        })->count();

        return view('emp.index', compact('postCount', 'apps', 'posts', 'p', 's', 'r', 'w'));
    }

    public function notification()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return view ('emp.notification', [

            'notifications' => auth()->user()->notifications()->paginate(10)

        ]);
    }

    public function show($employer_id)
    {
        if(auth()->user()->id != $employer_id){
            return redirect('/employer-dashboard')->with('error', 'This action is unauthorized.');
        }

        $posts = Post::where('employer_id', $employer_id)->get();
        
        return view('emp.posted')->with('posts', $posts)->with('employer_id', $employer_id);
    }

    public function showApplications($employer_id) 
    {
        if(auth()->user()->id != $employer_id){
            return redirect('/employer-dashboard')->with('error', 'This action is unauthorized.');
        }

        $posts = Post::where('employer_id', $employer_id)->get();
        
        return view('applications.emp_list')->with('posts', $posts)->with('employer_id', $employer_id);
    }

    public function activate($id)
    {
        $post = Post::find($id);

        $post->status = "Available";
        $post->save();
        
        return redirect()->back()->with('success', 'The job has been activated.');
    }

    public function deactivate($id)
    {
        $post = Post::find($id);

        $post->status = "Unavailable";
        $post->save();

        return redirect()->back()->with('success', 'The job has been deactivated.');
    }
    
    public function form()
    {
        return view('emp.password');
    }

    public function change(Request $request)
    {
        //Check if the Current Password matches with what is in the database.
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Your current password does not match with what you provided.');
        }
        // Compare the Current Password and New Password using[strcmp function]
        if(strcmp($request->get('current_password'), $request->get('password')) == 0) {
            return back()->with('error', 'Your new password cannot be same with the current password.');
        }
          //Validate the Password.
          $request->validate([
            'current_password' => 'required',
            'password'     => 'required|string|min:8|confirmed',
          ]);
          // Save the New Password.
          $employer = Auth::user();
          $employer->password = bcrypt($request->get('password'));
          $employer->save();
          return redirect("/employer-dashboard")->with('success', 'Your password has been changed successfully');
    }
}
