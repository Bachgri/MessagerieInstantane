<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{
    
    public $idEM;
    public function search(Request $request, $id){
      
        $users = User::where('name', 'LIKE', '%'.$request['search'].'%')
                        ->get();
        // dd($users);
        $messages = Message::all();
        $lm = Message::where('userReceiveId', '=', $id) ;
        $userEm = User::where('id', '=', $id)->first();
        return view('welcomee', compact('messages', 'users', 'userEm', 'lm'));
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function groupes(){
        $groupes = Groupe::all();
        return view('groupes', compact('groupes'));
    }

    /* Envoyer un message */
    public function addMesssage(Request $request){
        
        /* Valider l'input */
        // $request->validate([
        //     'message'=>'required' 
        // ]);
        /* Enregistrer le message dans la bd */
        //dd(isset($request['env']));
        
        if($request['type']=="image"){
            $cont = Storage::disk('public')->put("images", $request['message']);
            $message = Message::create([
                'content'=>$cont,
                'userSentId'=>$request['idSent'],
                'userReceiveId'=>$request['idReceive'],
                'type'=> $request['type']
            ]);
        //dd($cont);
        }else{
            $message = Message::create([
                'content'=>$request['message'],
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
        $m = Message::find($id);
        $m->content = "Message supprimer !";
        $m->save();
        return back();
    }
}
