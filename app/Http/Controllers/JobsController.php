<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Storage;

class JobsController extends Controller
{
    public function index()
    {
       
        return view('welcome');
    }
    
    
    public function edit($id)
    {
        $job = Job::find($id);

        return view('user.editing', [
            'job' => $job,
        ]);
    }
    
    
    
    
     public function store(Request $request)
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

        //s3アップロード開始
        $image = $request->file('picture');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('/myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $imageUrl = Storage::disk('s3')->url($path);



        $request->user()->jobs()->create([
            
            'name' => $request->name,
            'district' => $request->district,
            'genre' => $request->genre,
            'title' => $request->title,
            'age' => $request->age,
            'content' => $request->content,
            'requirement' => $request->requirement,
            'mail' => $request->mail,
            'number' => $request->number,
            //'picture' => $request->picture,
            'picture' => $imageUrl,
            'status'  => 0,
            
            'save_id' => null,
        ]);
        
        

        return redirect()->route('separate.poster');
    }
    
    
       public function destroy($id)
    {
        $job = \App\Job::find($id);

        if (\Auth::id() === $job->user_id) {
            $job->delete();
        }

        return back();
    }
    
    public function destroyTalk($id)
    {
        $talk = \App\Talk::find($id);

        if (\Auth::id() === $talk->user_id) {
            $talk->delete();
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
    
   
    
    
    
    
    
}





