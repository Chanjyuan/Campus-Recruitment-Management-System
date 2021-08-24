<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employer;
use App\Post;
use Auth;
use Image;
use Carbon;
use DB;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:employer', ['except'=>['show']]);
        
    }

    public function show(Employer $employer)
    {
        // $employer = Employer::find($employer);
        // dd($employer);
        // return view('emp.profile', [
        //     'employer' => $employer
        // ]);
        $posts = Post::where('employer_id', $employer->id)->where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->paginate(5);
        return view('emp.profile', compact('employer'))->with('posts', $posts);
    }

    public function editCompany(Employer $employer)
    {
        if(auth()->user()->id != $employer->id){
            return redirect('/employer-dashboard')->with('error', 'This action is unauthorized.');
        }
        $employer = Auth::user();
        return view('emp.edit', compact('employer'), [

            'notifications' => auth()->user()->notifications()->paginate(4)

        ]);
    }

    public function updateCompany(Employer $employer, Request $request)
    {
        $employer = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'bio' => 'required',
            'logo' => 'image|nullable'
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->fit(200, 200)->save( public_path('/storage/company_logo/' . $filename));

            $employer = Auth::user();
            $employer->logo = $filename;
            $employer->save();
        }
        
        $employer->name = $request->input('name');
        $employer->phone = $request->input('phone');
        $employer->company_name = $request->input('company_name');
        $employer->address = $request->input('address');
        $employer->bio = $request->input('bio');
        
        $employer->save();
         
        return redirect("/employer-dashboard")->with('success', 'Your details have been updated successfully. ');
    }
}