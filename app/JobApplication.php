<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
     // Table Name
     protected $table = 'applications';
     // Primary Key
     public $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;
 
     public function post()
     {
         return $this->belongsTo('App\Post');
     }
 
     public function user()
     {
         return $this->belongsTo('App\User');
     }
}
