<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;

    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function jobtype(){
        return $this->belongsTo('App\JobType', 'type');
    }

    public function applications(){
        return $this->hasMany('App\JobApplication')->orderBy('created_at', 'desc');
        // return $this->hasMany('App\JobApplication')->where('status', '!=', 'Withdrawn');
    }
}
