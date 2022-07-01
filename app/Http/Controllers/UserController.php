<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Groupe;
use App\Models\Membre;
use App\Models\Message;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{
    
    public $idEM;

    public function ViewProfile($id){
        $user = User::find($id);
        return view('userprofile', compact('user'));
    }

    public function editeProfile(Request $request){
        $request->validate([
            'name'=>'required',
            //'image'=>'required'
        ]);
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        //dd(isset($request->image));
        if(isset($request->image)){
            $pp = Storage::disk('public')->put("images", $request['image']);
            $user->profilePEcture = $pp;
        }
        $user->save();
        return back();
    }

    public function search(Request $request, $id){ 
        $users = User::where('name', 'LIKE', '%'.$request['search'].'%')
                       ->orWhere('email', 'LIKE', '%'.$request['search'].'%')
                       ->get();
        // dd($users);
        $messages = Message::all();
        $lm = Message::where('userReceiveId', '=', $id) ;
        $userEm = User::where('id', '=', $id)->first();
        return view('welcomee', compact('messages', 'users', 'userEm', 'lm'));
    }
    public function searchG(Request $request){

    }
    public function __construct(){
        $this->middleware('auth');
    }

    public function groupes(){
        $groupesDontMembre = DB::table('groupes')
                        ->join('membres', 'groupes.id', '=', 'membres.groupId')
                        ->select('groupes.*')
                        ->where('membres.userId', auth()->user()->id)
                        ->get();
        $groupeInvitation = DB::table('groupes')
                            ->join('invitations', 'groupes.id', 'invitations.groupId')
                            ->where('invitations.userId', '=', auth()->user()->id)
                            ->select('*')
                            ->get();
        $invits = Invitation::where('userId', '=', auth()->user()->id)
                ->select('groupId')
                ->get();
        $membr  = Membre::where('userId', '=', auth()->user()->id)
                    ->select('groupId')
                    ->get();

        //dd(($invits.','));
        $otherGroupe = Groupe::whereNotIn('groupes.id',$invits)
                             ->whereNotIn('groupes.id', $membr)
                             ->get();
        return view('groupes');// , ['otherGroupe'=>$otherGroupe ,'groupes'=>$groupesDontMembre, 'groupeInvitation'=>$groupeInvitation]);
    }

    /* Envoyer un message */
    public function addMesssage(Request $request){
          
        if($request['type']=="image"){
            $cont = Storage::disk('public')->put("images", $request['message']);
            $x = explode('.',$cont)[1];
            if($x == "png" ||$x == "jpg" || $x == "jpeg"){
                $type = "img";
            }else{
                $type = "file";
            }
            
            $message = Message::create([
                'content'=>Crypt::encryptString($cont,"",$x),
                'userSentId'=>$request['idSent'],
                'userReceiveId'=>$request['idReceive'],
                'type'=> $type
            ]);
        }else{
            $message = Message::create([
                'content'=>Crypt::encryptString($request['message']),
                'userSentId'=>$request['idSent'],
                'userReceiveId'=>$request['idReceive'],
                'type'=> $request['type']
            ]);
        }    
        //dd($request['type']=="text");
        return back();
    }
    /* Les messages */
    public function index($id){ 
        $this->idEM = $id; 
        $messages = Message::all();
        $lm = Message::where('userReceiveId', '=', $id) ;
        $userEm = User::where('id', '=', $id)->first();
        $users = User::all();
        return view('welcomee', compact('messages', 'users', 'userEm', 'lm'));
    }
    public function messages(){
        $users = User::all();
        $messages = Message::all();
        return view('messages', compact('users', 'messages'));
    }
    /* Les Profiles */
    public function Profile($id){
        $lm = Message::where('receiveId', '=', $id);
        $user = User::where('id', '=', $id)->first();
        return view('Profile', compact('user'));
    }
    public function logout(Request $request){
        $user = User::find(Auth::user()->id);
        $user->status = 'horsligne';
        $user->save();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function remove($id){
        $m = Message::find($id)->delete();
        // $m->content = Crypt::encrypt('Message supprimer !');
        // $m->save();
        return back();
    }
}
