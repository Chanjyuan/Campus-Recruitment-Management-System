<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Session;
use Auth;

class SavedJob extends Model
{
    public static function jobItems() {
    	if(Auth::check()) {
    		$jobItems = SavedJob::with(['post'=>function($query){
    			$query->select('id', 'title', 'type', 'deadline');
    		}])->where('user_id',Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
    	}
    	else {
    		$jobItems = SavedJob::with(['post'=>function($query){
    			$query->select('id', 'title', 'type', 'deadline');
    		}])->where('session_id',Session::get('session_id'))->orderBy('id', 'Desc')->get()->toArray();
    	}
    	return $jobItems;	
    }

    public function post() {
    	return $this->belongsTo('App\Post', 'post_id');
    }
}
