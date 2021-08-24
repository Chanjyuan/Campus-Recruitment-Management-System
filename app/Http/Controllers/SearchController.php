<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employer;
use App\Post;
use App\JobType;
use App\Industry;
use Carbon;
use DB;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function search(Request $request)
    {
        $types = JobType::pluck('name', 'id');
        $industries = Industry::pluck('name', 'id');

        // For simple search only

        // $search = request()->query('search');
        // $posts = Post::where('title','LIKE',"%{$search}%")->orderBy('id', 'DESC')->paginate(9);
        // return view('posts.search')->with('types', $types)->with('industries', $industries)->with('posts', $posts);

        // Advance search

        $posts = Post::query();

        if($request->title){
            $posts->where('title', 'LIKE', "%" . $request->title . "%");
        }
        // if ($request->filled('company_name')){
        //     $posts->where('company_name','LIKE',"%{$search}%")->orderBy('id', 'DESC')->paginate(9);
        // }
        if ($request->filled('type')){
            $posts->where('type', $request->type);
        }
        if ($request->filled('industry')){
            $posts->where('industry', $request->industry);
        }

        return view('posts.search')->with([
            'types' => $types,
            'industries' => $industries,
            'title' => $request->title,
            'type' => $request->type,
            'industry' => $request->industry,
            'posts' => $posts->where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->orderBy('id', 'DESC')->paginate(9), // or ->get()
        ]);
    }

    public function searchCompany(Request $request)
    {
        // $types = JobType::pluck('name', 'id');
        // $industries = Industry::pluck('name', 'id');

        // For simple search only

        $search = request()->query('company_name');
        $profiles = Employer::where('company_name','LIKE',"%{$search}%")->orderBy('id', 'DESC')->paginate(8);

        return view('emp.list')->with('profiles', $profiles);

    }
}
