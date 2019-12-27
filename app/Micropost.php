<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorited() {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
    
    
    
    
    public function is_getting_favirited($micropost_id) {
        return $this->favorited()->where('user_id', $micropost_id);
    }
    
     public function feed_users()
    {
        $favorited_ids = $this->favorited()->pluck('users.id')->toArray();
        
        return User::whereIn('user_id', $favorited_ids);
    }
}
