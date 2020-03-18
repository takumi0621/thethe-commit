<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    
     public function separating()
    {
       
        
        
        
         return view('users.show', $data);
        
        
    }
    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
        
        
        
        
        
        
    }




public function show($id)
    {
        $user = User::find($id);
        $jobs = $user->jobs()->orderBy('created_at', 'desc')->paginate(10);
        $talks = $user->talked()->orderBy('created_at', 'desc')->paginate(10);
        //$workers = $user->working()->orderBy('created_at', 'desc')->paginate(10);




        $data = [
            'user' => $user,
            'jobs' => $jobs,
            'talks' => $talks,
            'talks' =>$workers ,
        ];
        
        
        
        

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
   
    
    
    public function favoriting($userIds)
    {    
        $user = \Auth::user();
        $countryData = $user->favoriting()->paginate(10);
        
        $data = [
            'user' => $user,
            'countryData' => $countryData,
        ];

        $data += $this->counts($user);

        return view('users.favoriteList', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}