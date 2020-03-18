<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
      
        
        
        
    protected $fillable = [
        'name', 'email', 'password',
    ];


   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




     public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    
    
     public function feed_jobs()
    {
        $jobs_ids = Job::orderBy('id', 'desc')->paginate(10); 
        $favorites_ids[] = $this->id;
        return Micropost::whereIn('user_id', $follow_user_ids);
       
        $jobs = Job::orderBy('id', 'desc')->paginate(10); 
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function talks() {
        return $this->hasMany(Talk::class);
    }
    
    
    
     public function talking()
    {
        return $this->belongsToMany(Job::class, 'talks', 'user_id', 'job_id')->withTimestamps();
    } 
 /*   
 
    public function talked()
    {
        return $this->belongsToMany(Talk::class, 'talks', 'talk', 'user_id')->withTimestamps();
    } 
 */   
     public function getTalk()
    {
         $data = [];
        if (\Auth::check()) {
            
            $talk1 = $this->talking()->orderBy('created_at', 'desc')->paginate(10);
            //$talk2 = $this->talked()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                
                'talk1' => $talk1,
                'talk2' => $talk2,
            
            ];
        }
        return $data;
    }
    
    
    
  
        

       
    
    
    
    
    
    
    
    
    
    
     
    
    
    
    
    
     public function worked()
    {
        return $this->belongsToMany(Worker::class, 'workers', 'job_id', 'user_id')->withTimestamps();
    } 
    
    
    
    public function is_working($userId) {
        return $this->working()->where('job_id', $userId)->exists();
    } 
    
    
     public function is_getting_worked($job_id) {
        return $this->worked()->where('user_id', $userId)->exists();
    } 
    
    
 
    
    
    
    
    
    
    public function give_work($userId)
    {
        $exist = $userId->status　== 0;
        
     
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
           
            return false;
        } else {
            $userId->status += 1; 
            $this->attach($userId);
            return true;
        }
    }
    
    public function checkStatus() {
     
        return $this->belongsTo(Worker::class, 'workers', 'user_id', 'job_id')->withTimestamps();
    }
    
    
    
    
    
    
    
    
    
    public function block_work($useId) {
        $exist = $this->is_working($userId);
       
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            
            $this->working()->detach($userId);
            return true;
        } else {
        
            return false;
        }
    }
    
    
  
    
  
  
  
  
  
  
    







    
    
    
    
    
   
   
    
    
    
    
    
  
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function favoriting() {
        return $this->belongsToMany(Job::class, 'favorites', 'user_id', 'favorite_id')->withTimestamps();
    }
    
     public function favorited()
    {
        return $this->belongsToMany(Job::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
    
    public function favorites($favorite_id) {
        $exist = $this->is_favoriting($favorite_id);
        
        
        if ($exist) {
            return false;
        } else {
            $this->favoriting()->attach($favorite_id);
            return true;
        }
    }
    
    
    public function unfavorites($favorite_id) {
        $exist = $this->is_favoriting($favorite_id);
        
        
        if($exist) {
            $this->favoriting()->detach($favorite_id);
            return true;
        } else {
            return false;
        }
    }
    
    
    
    
    
    
     public function is_favoriting($userId)
    {
        return $this->favoriting()->where('favorite_id', $userId)->exists();
    }
    
    public function feed_favorites()
    {
        $favorites_ids = $this->favoriting()->pluck('users.id')->toArray();
        $favorites_ids[] = $this->id;
        return Micropost::whereIn('user_id', $follow_user_ids);
    }
    
    
     public function doingWork()
    {
        return $this->belongsToMany(Job::class, 'workers', 'user_id', 'job_id')->withTimestamps();
    }
    
    public function worker()
    {
       return $this->belongsToMany(User::class, 'workers','user_id', 'job_id');
    }
}

