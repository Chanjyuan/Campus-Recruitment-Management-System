<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\JobType;
use App\Industry;
use App\Employer;
use App\JobApplication;
use Auth;
use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:employer', ['except'=>['show']]);
    }

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
        // $employer = Auth::user();

        $types = JobType::pluck('name', 'id');
        $industries = Industry::pluck('name', 'id');

        return view('posts.create', compact('types', 'industries'), [

            'notifications' => auth()->user()->notifications()->paginate(4)

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'industry' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'benefit' => 'required|max: 255',
            'specification' => 'required',
            'job_scope' => 'required',
            'position' => 'required|numeric',
            'deadline' => 'required',
        ]);

        // Post Job
        $post = new Post;
        $post->title = $request->input('title');
        $post->type = $request->input('type');
        $post->industry = $request->input('industry');
        $post->location = $request->input('location');
        $post->salary = $request->input('salary');
        $post->benefit = $request->input('benefit');
        $post->specification = $request->input('specification');
        $post->job_scope = $request->input('job_scope');
        $post->position = $request->input('position');
        $post->deadline = $request->input('deadline');
        $post->employer_id = auth()->user()->id;
        $post->save();

        return redirect('/employer-dashboard')->with('success', 'Your job has been posted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Employer $employer)
    {
        if(\Illuminate\Support\Facades\Auth::guard('web')->check()){
            $post = Post::findOrFail($id);
            $others = Post::where('employer_id', $post->employer->id)->where('id', '!=', $id)->where('deadline', '>=', DB::raw('curdate()'))->get();
            $applications = JobApplication::where('user_id', auth()->user()->id)->where('post_id', $post->id)->where('status', '!=', 'Withdrawn')->get();

            return view('posts.show')->with('post', $post)->with('employer', $employer)->with('others', $others)->with('applications', $applications);
        }
        
        $post = Post::findOrFail($id);
        $others = Post::where('employer_id', $post->employer->id)->where('id', '!=', $id)->where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->get();

        return view('posts.show')->with('post', $post)->with('employer', $employer)->with('others', $others);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $types = JobType::pluck('name', 'id');
        $industries = Industry::pluck('name', 'id');

        if(auth()->user()->id == $post->employer_id){
            return view('posts.edit', compact('types', 'industries'), [

                'notifications' => auth()->user()->notifications()->paginate(4)
    
            ])->with('post', $post);
        }
        else{
            return redirect('/employer-dashboard')->with('error', 'This action is unauthorized.');
        }
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
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'industry' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'benefit' => 'required|max: 255',
            'specification' => 'required',
            'job_scope' => 'required',
            'position' => 'required|numeric',
            'deadline' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->type = $request->input('type');
        $post->industry = $request->input('industry');
        $post->location = $request->input('location');
        $post->salary = $request->input('salary');
        $post->benefit = $request->input('benefit');
        $post->specification = $request->input('specification');
        $post->job_scope = $request->input('job_scope');
        $post->position = $request->input('position');
        $post->deadline = $request->input('deadline');
        $post->save();

        return redirect('/employer-dashboard')->with('success', 'Your job has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->back()->with('success', 'Your job has been removed.');
    }

}
