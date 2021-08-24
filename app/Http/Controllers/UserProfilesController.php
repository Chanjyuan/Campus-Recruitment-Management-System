<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\SavedJob;
use App\JobApplication;
use Session;
use View;
use Auth;
use Image;
use Carbon\Carbon;
use Hash;

class UserProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show']]);
        
    }

    public function index(User $user) //User $user not used yet 28/3
    {
        //Jobseeker dashboard

        $user_id = Auth::user()->id;
        $savedCount = SavedJob::where('user_id', $user_id)->count();
        $apps =  JobApplication::where('user_id', $user_id)->count();
        $applications = JobApplication::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();

        $p = JobApplication::where('user_id', Auth::user()->id)->where('status', 'Pending')->count();
        $s = JobApplication::where('user_id', Auth::user()->id)->where('status', 'Shortlisted')->count();
        $r = JobApplication::where('user_id', Auth::user()->id)->where('status', 'Rejected')->count();
        $w = JobApplication::where('user_id', Auth::user()->id)->where('status', 'Withdrawn')->count();

        return view('index', compact('user', 'savedCount', 'apps', 'applications', 'p', 's', 'r', 'w'));
    }

    public function notification()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return view ('notification', [

            'notifications' => auth()->user()->notifications()->paginate(10)

        ]);
    }

    public function show(User $user)

    {   
        if(\Illuminate\Support\Facades\Auth::guard('web')->check()){  
            return view('profile', compact('user'));
        }
        elseif(\Illuminate\Support\Facades\Auth::guard('employer')->check()){
            return view('profile', compact('user'));
        }
        elseif(\Illuminate\Support\Facades\Auth::guard('admin')->check()){
            return view('profile', compact('user'));
        }
        else{
            return redirect('/')->with('error', 'This action is unauthorized.');
        }
    }

    public function showApp(User $user)
    {
        if(auth()->user()->id != $user->id){
            return redirect('/dashboard')->with('error', 'This action is unauthorized.');
        }
        
        $applications = JobApplication::where('user_id', Auth::user()->id)->get();
        
        return view('applications.jsk_list')->with('applications', $applications);
    }

    public function edit(User $user)
    {
        if(auth()->user()->id != $user->id){
            return redirect('/dashboard')->with('error', 'This action is unauthorized.');
        }
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'title' => 'required' ,
            'achievement' => 'required|max:255',
            'status' => 'required',
            'date' => 'required',
            'experience' => 'required|max:255',
            'skill' => 'required|max:255',
            'image' => 'image|mimes:jpg,png|nullable',
            'resume' => 'mimes:pdf|max:2048'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(200, 200)->save( public_path('/storage/uploads/' . $filename));

            $user = Auth::user();
            $user->profile->image = $filename;
            $user->profile->save();
        }

        if($request->hasFile('resume')){
            $resume = $request->file('resume');
            $filename = $resume->getClientOriginalName();
            $filename = time() . '.' . $filename;
            
            $request->resume->move(public_path('/storage/resumes'), $filename);

            $user = Auth::user();
            $user->profile->resume = $filename;
            $user->profile->save();
        }
        
        $user->name = $request->input('name');
        $user->profile->gender = $request->input('gender');
        $user->profile->dob = $request->input('dob');
        $user->profile->phone = $request->input('phone');
        $user->profile->address = $request->input('address');
        $user->profile->title = $request->input('title');
        $user->profile->achievement = $request->input('achievement');
        $user->profile->status = $request->input('status');
        $user->profile->date = $request->input('date');
        $user->profile->experience = $request->input('experience');
        $user->profile->skill = $request->input('skill');
        
        $user->save();
        $user->profile->save();
        
        return redirect("/dashboard")->with('success', 'Your details have been updated successfully.');
    }

    public function bookmark(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            //Generate session ID if not exists
            $session_id = Session::get('session_id');
            if(empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }
            $savedjob = new SavedJob;
            //Check if post already exists in list
            if(Auth::check()) {
                //User is logged in
                $countPosts = SavedJob::where(['post_id'=>$data['post_id'], 'user_id'=>Auth::user()->id])->count();
                $savedjob->user_id = auth()->user()->id;
            }
            else {
                //User is not logged in
                $countPosts = SavedJob::where(['post_id'=>$data['post_id'], 'session_id'=>Session::get('session_id')])->count();
            }
            
            if ($countPosts>0) {
                $message = "The job offer is already on the list!";
                Session::flash('error_message', $message);
                return redirect()->back();
            } 

            //Save post in list
            $savedjob->session_id = $session_id;
            $savedjob->post_id = $data['post_id'];
            $savedjob->save();

            $message = "The job offer has been saved for later.";
            Session::flash('success_message', $message);
            return redirect()->back();
        }  
    }

    public function savedJobs(User $user)
    {
        if(auth()->user()->id != $user->id){
            return redirect('/dashboard')->with('error', 'This action is unauthorized.');
        }

        $jobItems = SavedJob::jobItems();
        //echo "<pre>"; print_r($userCartItems); die;
        return view('posts.saved')->with(compact('jobItems'));
    }

    public function remove(Request $request) 
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            SavedJob::where('id', $data['savedjobid'])->delete();
            $jobItems = SavedJob::jobItems();
            return response()->json([
                'view'=>(String)View::make('posts.saved_jobs')->with(compact('jobItems'))
            ]);
        }
    }

    public function form()
    {
        return view('auth.passwords.change');
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
          $user = Auth::user();
          $user->password = bcrypt($request->get('password'));
          $user->save();
          return redirect("/dashboard")->with('success', 'Your password has been changed successfully.');
    }
}
