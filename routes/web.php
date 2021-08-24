<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\JobType;
use App\Industry;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $types = JobType::pluck('name', 'id');
    $industries = Industry::pluck('name', 'id');
    $posts = Post::where('deadline', '>=', DB::raw('curdate()'))->where('status', '!=', 'Unavailable')->get();
    return view('home')->with('types', $types)->with('industries', $industries)->with('posts', $posts);
});

Route::get('/jobs', 'SearchController@search');
Route::get('/companies', 'SearchController@searchCompany');

Route::resource('applications', 'ApplicationsController');
Route::get('/my-applications/{user}', 'UserProfilesController@showApp');

Route::post('/saved-for-later', 'UserProfilesController@bookmark');
Route::get('/saved-jobs/{user}', 'UserProfilesController@savedJobs');
Route::post('/remove', 'UserProfilesController@remove');

Auth::routes();

Route::get('/all-notifications', 'UserProfilesController@notification');

Route::get('/dashboard', 'UserProfilesController@index')->name('dashboard');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/change-password', 'UserProfilesController@form');
Route::post('/change-password', 'UserProfilesController@change')->name('pwd.submit');

Route::get('/profile/{user}', 'UserProfilesController@show')->name('profile.show');
Route::get('/profile-edit/{user}', 'UserProfilesController@edit')->name('profile.index');
Route::patch('/profile/{user}', 'UserProfilesController@update')->name('profile.update');

//Employer

Route::resource('posts', 'PostsController');

Route::post('/activate/{post}', 'EmployerController@activate');
Route::post('/deactivate/{post}', 'EmployerController@deactivate');

Route::get('/notifications', 'EmployerController@notification');

Route::get('/job-applications/{application}/accept', 'ApplicationsController@accept');
Route::get('/job-applications/{application}/reject', 'ApplicationsController@reject');

Route::get('/job-applications/{employer}', 'EmployerController@showApplications');
Route::get('/posted-jobs/{employer}', 'EmployerController@show');

Route::get('/company-profile/{employer}', 'ProfilesController@show')->name('emp.profile.show');
Route::get('/company-profile-edit/{employer}', 'ProfilesController@editCompany')->name('emp.profile.edit');
Route::patch('/company-profile/{employer}', 'ProfilesController@updateCompany')->name('emp.profile.update');

Route::get('/employer-dashboard', 'EmployerController@index')->name('employer.dashboard');

Route::get('/changepassword', 'EmployerController@form');
Route::post('/changepassword', 'EmployerController@change')->name('emp.pwd.submit');

Route::get('/employer-login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::post('/employer-login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');
Route::post('/employer-logout', 'Auth\EmployerLoginController@logout')->name('employer.logout');

Route::get('/employer-register', 'Auth\EmployerRegisterController@showForm')->name('employer.register');
Route::post('/employer-register', 'Auth\EmployerRegisterController@register')->name('employer.register.submit');

//Admin

Route::get('/jobseekers', 'AdminController@accountJsk');
Route::get('/employers', 'AdminController@accountEmp');
Route::post('/remove-jobseeker/{user}', 'AdminController@removeJsk');
Route::post('/remove-employer/{user}', 'AdminController@removeEmp');

Route::get('/all-posted-jobs', 'AdminController@posts');
Route::post('/activate-post/{post}', 'AdminController@activate');
Route::post('/deactivate-post/{post}', 'AdminController@deactivate');
Route::post('/remove-post/{post}', 'AdminController@delete');

Route::get('/all-job-applications', 'AdminController@applications');
Route::post('/remove-application/{app}', 'AdminController@removeApp');

Route::get('/admin-dashboard', 'AdminController@index')->name('admin.dashboard');

Route::get('/change_password', 'AdminController@form');
Route::post('/change_password', 'AdminController@change')->name('adm.pwd.submit');

Route::get('/admin-login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('/admin-logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/admin-register', 'Auth\AdminRegisterController@showForm')->name('admin.register');
Route::post('/admin-register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');