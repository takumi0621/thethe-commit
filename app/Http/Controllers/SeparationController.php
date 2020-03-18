<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use App\Worker;
class SeparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    
    public function goPosting()
    {
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $jobs = $user->jobs()->with('worker')->orderBy('created_at', 'desc')->paginate(10);
            //$talks = $jobs->talks()->orderBy('created_at', 'desc')->paginate(10); 
         

            $data = [
                'user' => $user,
                'jobs' => $jobs,
                //'talks' => $talks,
            ];
            
        }
        return view('users.poster', $data);
    }
    
    
     public function goContracting()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            //$jobs = Job::orderBy('id', 'desc')->paginate(10);
            $talks = $user->talks()->orderBy('created_at', 'desc')->paginate(10);
            //$jobs = Job::orderBy('id', 'desc')->paginate(10);
            $myjobs =  $user->doingWork;
            $favoriteThing = $user->favoriting;
           
            

            

            $data = [
                'user' => $user,
                'myjobs' => $myjobs,
                'talks' => $talks,
                'favoriteThing' => $favoriteThing,     
            ];
        }
        return view('users.worker', $data);
    }
 
    
     public function goAsking()
    {
        return view('users.posting');
    }
    
    public function goEditing($id)
    {
        $job = Job::find($id);

        return view('users.editing', [
            'job' => $job,
        ]); 
        
    }
    
    
    
    
    
    
    public function goChating($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $job = Job::find($id);
            $talks = $job->talks()->get();

            $data = [
                'user' => $user,
                'job' => $job,
                'talks' => $talks,
                
            ];
        }
        
        return view('users.talkroom', $data);
    }
    
    public function goChating2($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $job = Job::find($id);
            $talks = $job->talks()->get();

            $data = [
                'user' => $user,
                'job' => $job,
                'talks' => $talks,
                
            ];
        }
        
        return view('users.talkroom', $data);
    }
    
    
    
    
    public function talktalk(Request $request, $id)
    {
        $this->validate($request, [
            'talk' => 'required|max:191',
        ]);

        $request->user()->talks()->create([
            'talk' => $request->talk,
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
        ]);
        
        return back();
    }
    
    public function goAllowing(Request $request, $id) { //誰のtalkかを特定
        
        $job = Job::find($id);
        $job->save_id = $request->UserID;
        $job->status = 1;
        $job->save();
        $worker = new Worker;
        $worker->user_id = $request->UserID;//talkのユーザーid
        $worker->job_id = $job->id;
        $worker->save();
        
        
        return back();
    }
    
    
    
    
    
    
    
    public function goUpdating(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required|max:191',
            'district' => 'required|max:191',
            'genre' => 'required|max:191',
            'title' => 'required|max:191',
            'age' => 'required|max:191',
            'content' => 'required|max:191',
            'requirement' => 'required|max:191',
            'mail' => 'required|max:191',
            'number' => 'required|max:191',
            'picture' => 'required|max:191',
        ]);
        
        $task = Job::find($id);
        $task->name = $request->name;
        $task->district = $request->district;
        $task->genre = $request->genre;
        $task->title = $request->title;
        $task->age = $request->age;
        $task->content = $request->content;
        $task->requirement = $request->requirement;
        $task->mail = $request->mail;
        $task->number = $request->number;
        $task->picture = $request->picture;
        $task->save();

        return redirect()->route('separate.poster');
    }

    
    
    
    public function goFavoriting()
    {    
        $user = \Auth::user();
        $countryDatas = $user->favoriting()->paginate(10);
        
        $data = [
            'user' => $user,
            'countryDatas' => $countryDatas,
        ];

        

        return view('users.favoriteList', $data);
    }
    
    
   
    
    
    
    
}



