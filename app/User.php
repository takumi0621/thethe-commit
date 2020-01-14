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
    
  
    
     public function talked()
    {
        return $this->belongsToMany(Talk::class, 'talks', 'talk', 'user_id')->withTimestamps();
    }
    
    
    
    
     public function working()
    {
        return $this->belongsToMany(Worker::class, 'workers', 'user_id', 'worker')->withTimestamps();
    }
    
   
   
    
    
    
    
    
  
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function favoriting() {
        return $this->belongsToMany(Micropost::class, 'favorites', 'user_id', 'micropost_id')->withTimestamps();
    }
    
     public function favorited()
    {
        return $this->belongsToMany(Micropost::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
    
    public function favorites($micropost_id) {
        $exist = $this->is_favoriting($micropost_id);
        
        
        if ($exist) {
            return false;
        } else {
            $this->favoriting()->attach($micropost_id);
            return true;
        }
    }
    
    
    public function unfavorites($micropost_id) {
        $exist = $this->is_favoriting($micropost_id);
        
        
        if($exist) {
            $this->favoriting()->detach($micropost_id);
            return true;
        } else {
            return false;
        }
    }
    
    
    
    
    
    
     public function is_favoriting($userId)
    {
        return $this->favoriting()->where('micropost_id', $userId)->exists();
    }
    
    public function feed_favorites()
    {
        $favorites_ids = $this->favoriting()->pluck('users.id')->toArray();
        $favorites_ids[] = $this->id;
        return Micropost::whereIn('user_id', $follow_user_ids);
    }
    
}

