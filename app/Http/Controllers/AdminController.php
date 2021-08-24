<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobApplication;
use App\JobType;
use App\Employer;
use App\Post;
use App\User;
use App\UserProfile;
use App\Notifications\PostDeactivated;
use App\Notifications\PostActivated;
use DB;
use Hash;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postCount = Post::all()->count();
        $activeCount = Post::where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->count();
        $position = Post::where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->sum('position');
        $appliedCount = JobApplication::all()->count();
        $jskCount = User::all()->count();
        $graduated = UserProfile::where('status', '!=', 'study')->count();
        $empCount = Employer::all()->count();
        $hiring = DB::table('posts')
                  ->where('deadline', '>=', DB::raw('curdate()'))
                  ->select('employer_id')
                  ->distinct('employer_id')
                  ->count();

        //Top Job Types
        $type = JobType::all();
        $typename = $type->pluck('name');
        $intern = Post::where('type', '=', '1')->count();
        $full = Post::where('type', '=', '2')->count();
        $cont = Post::where('type', '=', '3')->count();

        //Application Status
        $sta1 = JobApplication::where('status', '=', 'Shortlisted')->count();
        $sta2 = JobApplication::where('status', '=', 'Pending')->count();
        $sta3 = JobApplication::where('status', '=', 'Rejected')->count();
        $sta4 = JobApplication::where('status', '=', 'Withdrawn')->count();

        $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        $post = [];
        foreach ($month as $key => $value) {
            $post[] = Post::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->where('created_at','LIKE',"2021%")->count();
        }

        //Average Salary
        $min = Post::where('salary','>',0)->min('salary');
        $max = Post::max('salary');
        $avg = Post::where('salary','>',0)->avg('salary');
        $sum = Post::sum('salary');

        //Featured Industries
        $industries = DB::table('industries')
                ->leftJoin('posts','posts.industry','=','industries.id')
                ->select('industries.id AS id', 'industries.name AS name', DB::raw("count(posts.industry) AS total_posts"), DB::raw("sum(posts.position) AS positions"))
                ->groupBy('industries.id', 'industries.name')
                ->orderBy('positions','desc')
                ->take(3)
                ->get();

        return view('admin.index', compact('postCount', 'activeCount', 'position', 'appliedCount', 'jskCount', 'graduated', 'empCount', 'hiring', 'type', 'typename', 'intern', 'full', 'cont', 'sta1', 'sta2', 'sta3', 'sta4', 'industries', 'month', 'post', 'min', 'max', 'avg', 'sum'));
    }

    public function accountJsk()
    {
        $users = User::orderby('created_at', 'asc')->get();

        return view('admin.jsk_acc', compact('users'), [

            'notifications' => auth()->user()->notifications()->paginate(4)

        ]);
    }

    public function accountEmp()
    {
        $employers = Employer::orderby('created_at', 'asc')->get();

        return view('admin.emp_acc', compact('employers'), [

            'notifications' => auth()->user()->notifications()->paginate(4)

        ]);
    }

    public function removeJsk($id)
    {

        $user = User::find($id);
        $user->delete();

        return redirect('/jobseekers')->with('success', 'The account has been removed.');
    }

    public function removeEmp($id)
    {

        $emp = Employer::find($id);
        $emp->delete();

        return redirect('/employers')->with('success', 'The account has been removed.');
    }

    public function posts()
    {
        // $posts = Post::all();
        // $posts = DB::select('SELECT * FROM posts'); //DB method

        $posts = Post::orderBy('created_at', 'desc')->get(); //Eloquent method
        return view('posts.all')->with('posts', $posts);
    }

    public function activate($id)
    {
        $post = Post::find($id);

        $post->status = "Available";
        $post->save();
        $post->employer->notify(new PostActivated($post));

        return redirect('/all-posted-jobs')->with('success', 'The job has been activated.');
    }

    public function deactivate($id)
    {
        $post = Post::find($id);

        $post->status = "Unavailable";
        $post->save();
        $post->employer->notify(new PostDeactivated($post));

        return redirect('/all-posted-jobs')->with('success', 'The job has been deactivated.');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect('/all-posted-jobs')->with('success', 'The job has been removed.');
    }

    public function applications()
    {
        $applications = JobApplication::orderBy('created_at', 'desc')->get(); //Eloquent method
        return view('applications.all')->with('applications', $applications);
    }

    public function removeApp($id)
    {
        $application = JobApplication::find($id);

        $application->delete();
        return redirect('/all-job-applications')->with('success', 'The application has been removed.');
    }

    public function form()
    {
        return view('admin.password');
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
          $admin = Auth::user();
          $admin->password = bcrypt($request->get('password'));
          $admin->save();
          return redirect("/admin-dashboard")->with('success', 'Your password has been changed successfully');
    }
}
