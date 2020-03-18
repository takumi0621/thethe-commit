<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Job;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function countsTwo() {
        $count_europe = Job::where('district', 'europe')->count();
        $count_oceania = Job::where('district', 'oceania')->count();
        $count_america = Job::where('district', 'america')->count();
        $count_asia = Job::where('district', 'asia')->count();
        $count_africa = Job::where('district', 'africa')->count();

        return [
            'count_europe' => $count_europe,
            'count_oceania' => $count_oceania,
            'count_america' => $count_america,
            'count_asia' => $count_asia,
            'count_africa' => $count_africa,
        ];

    }
    
    
    
    
    
    
    
    
    
    
       public function counts($user) {
        $count_microposts = $user->jobs()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_favoriting = $user->favoriting()->count();
        $count_favorited = $user->favorited()->count();




        return [
            'count_microposts' => $count_microposts,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favoriting' => $count_favoriting,
            'count_favorited' => $count_favorited,
        ];

    }
    
    
    
       
    
    
    
    
    
    
    
    
    
}
