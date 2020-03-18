<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
   protected $fillable = [ 'user_id', 'district', 'name', 'genre', 'title', 'age', 'content', 'requirement', 'mail', 'number', 'picture', 'status','save_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function talks() {
        return $this->hasMany(Talk::class);
    }
    
    
   
    
    
    public function favorited() {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_id', 'user_id')->withTimestamps();
    }
    
     public function is_getting_favirited($favorite_id) {
        return $this->favorited()->where('user_id', $favorite_id);
    }
    
     public function feed_users()
    {
        $favorited_ids = $this->favorited()->pluck('users.id')->toArray();
        
        return User::whereIn('user_id', $favorited_ids);
    }
    
    
    
    public function endtalk() {
        $pretalk = 0;
        $pretalk = $this->talks()->latest()->first();
        if ($pretalk == "") {
            return "";
        } else {
            return $pretalk->talk;
        }
    }
 
    //受注者の最後のトーク
    public function workerEndTalk() {
        $pretalk = 0;
        $jyucyu = $this->worker()->first();
        $pretalk = $this->talks()->where('user_id',$jyucyu->id)->latest()->first();
        
        //dd($pretalk);
        
        if ($pretalk == "") {
            return "";
        } else {
            return $pretalk;
        }
    }
    
    public function endtalkForname() {
        $pretalk = 0;
        $pretalk = $this->talks()->latest()->first();
        if ($pretalk == "") {
            return "";
        } else {
            return $pretalk->user->name;
        }
    }

    public function checkWork() {
        return $this->worker()->count();
    }
    
    public function worker()
    {
       return $this->belongsToMany(User::class, 'workers', 'job_id','user_id');
    } 
    
    
    public function workerTwo() {
        return $this->worker()->first();
    }
    
    
    
    public function searchWorker()
    {
        $one = $this->id->get();
        $two = Worker::find($one);
        //return $two->user;
    } 
    
    
         
            
 
            
             
        
    
    
    
    
    
    
    public function talking() {
        return $this->belongsToMany(Talk::class, 'talks', 'user_id', 'job_id')->withTimestamps();
    }
    
    public function is_talking($user_id) {//jobIDはユーザーのこと、このユーザーと会話したことがあるかどうかを識別
        return $this->talks()->where('user_id', $user_id)->exists();
    }
    
    
    
    
    
    //public function endTalk() {
        //Talk = $this->talks();
       // Talk::latest()->first();
    //}
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
}
