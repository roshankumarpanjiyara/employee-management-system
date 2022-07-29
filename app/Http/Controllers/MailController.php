<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function create(){
        return view('admin.mail.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'file'=>'mimes:docx,doc,pdf,jpeg,jpg,png',
            'body'=>'required'
        ]);
        $image = $request->file('file');
        $details = [
            'body'=>$request->body,
            'file'=>$image
        ];
        if ($request->department){
            $users = User::where('department_id',$request->department)->get();
            foreach($users as $user){
                \Mail::to($user->email)->send(new sendMail($details));
            }
        }else if($request->person){
            $user = User::where('id',$request->person)->first();
            $userEmail = $user->email;
            \Mail::to($user->email)->send(new sendMail($details));
        }else{
            $users = User::get();
            foreach($users as $user){
                \Mail::to($user->email)->send(new sendMail($details));
            }
        }
        return redirect()->back()->with('message','Email sent');
    }
}
