<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    // use HasFactory;

    protected $table='job_types';

    protected $primarykey='id';

    protected $fillable=['name'];

    public function posts(){
        return $this->hasMany('App\Post', 'id');
    }
}
