<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $jobs = $user->jobs()->orderBy('created_at', 'desc')->paginate(10);
            $talks = $user->talked()->orderBy('created_at', 'desc')->paginate(10);
            $workers = $user->working()->orderBy('created_at', 'desc')->paginate(10);

            

            $data = [
                'user' => $user,
                'jobs' => $jobs,
                'talks' => $talks,
                'workers' =>$workers ,
            ];
        }
        return view('welcome', $data);
    }
    
    
    
    
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'district' => 'required|max:191',
            'genre' => 'required|max:191',
            'age' => 'required|max:191',
            'content' => 'required|max:191',
            'requirement' => 'required|max:191',
            'mail' => 'required|max:191',
            'number' => 'required|max:191',
            'picture' => 'required|max:191',
            
        ]);

        $request->user()->jobs()->create([
            
            'name' => $request->name,
            'district' => $request->district,
            'genre' => $request->genre,
            'age' => $request->age,
            'content' => $request->content,
            'requirement' => $request->requirement,
            'mail' => $request->mail,
            'number' => $request->number,
            'picture' => $request->picture,
        ]);

        return back();
    }
    
    
       public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return back();
    }
    
    public function favorited($id)
    {
        $micropost = Micropost::find($id);
        $favoriting_user = $micropost->favorited()->paginate(10);

        $data = [
            'micropost' => $micropost,
            'favoriting_user' => $favoriting_user,
        ];

        $data += $this->counts($micropost);

        return view('users.followers', $data);
    }
    
   
    public function edit($id)
    {
        $job = Job::find($id);

        return view('user.editing', [
            'job' => $job,
        ]);
    }
    
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            
            'content' => 'required|max:191',
            "status" => 'required|max:10',
        ]);
        
        $task = Task::find($id);
        
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }
    
}





