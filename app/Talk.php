<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable = ['user_id', 'talk', 'job_id'];
    
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function job()   
    {
        return $this->belongsto(Job::class);
    }
    
    
    
    
    
    
    
    
    
    
    
}
