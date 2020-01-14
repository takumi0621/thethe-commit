<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
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
        $workers = $user->working()->orderBy('created_at', 'desc')->paginate(10);




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
    
    public function favoriting($id)
    {
        $user = User::find($id);
        $microposts = $user->favoriting()->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.favoriting', $data);
    }
    
    
    
    
    
    
    public function move()
    {
       
        
        
        
        
        return view('users.posting');
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}