<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobApplication;
use App\Post;
use App\User;
use App\Notifications\ApplicationSent;
use App\Notifications\ApplicationAccepted;
use App\Notifications\ApplicationRejected;
use Auth;
use Session;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->profile->resume != NULL){
        if($request->isMethod('post')){

            $data = $request->all(); 
            $post_id = $request->get('post_id');

            // Send Application
            $jobapp = new JobApplication;

            $jobapp->user_id = auth()->user()->id;
            $jobapp->post_id = $post_id;
            $jobapp->save();

            $post = Post::find($post_id);
            $post->save();
            $post->employer->notify(new ApplicationSent($post, $jobapp));

            $message = "Your application has been succesfully sent.";
            Session::flash('success_message', $message);
            return redirect()->back();
        }
        }
        else{
            $message = "Please complete your profile before applying.";
            Session::flash('error_message', $message);
            return redirect()->back(); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jobapp = JobApplication::find($id);
        $jobapp->status = "Withdrawn";
        $jobapp->save();

        return redirect()->back()->with('success', 'Your application has been withdrawn.');
    }

    public function accept(Request $request, $id)
    {
        $jobapp = JobApplication::find($id);

        $post_id = $jobapp->post_id;
        $post = Post::find($post_id);

        $jobapp->status = "Shortlisted";
        $jobapp->save();
        $jobapp->user->notify(new ApplicationAccepted($post, $jobapp));

        return redirect()->back()->with('success', 'The candidate has been shortlisted.');
    }

    public function reject(Request $request, $id)
    {
        $jobapp = JobApplication::find($id);

        $post_id = $jobapp->post_id;
        $post = Post::find($post_id);

        $jobapp->status = "Rejected";
        $jobapp->save();
        $jobapp->user->notify(new ApplicationRejected($post, $jobapp));

        return redirect()->back()->with('success', 'The candidate has been rejected.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
