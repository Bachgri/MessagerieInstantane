<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    /* Envoyer un message */
    public function addMessage(Request $request){
        
        /* Valider l'input */
        $request->validate([
            'message'=>'required'
        ]);
        /* Enregistrer le message dans la bd */
        $message = Message::create([
            'content'=>$request['message'],
            'userId'=>$request['id'],
        ]);
        dd($$message);
        return back();

        /* return L'iterface des messages */
        // utilisateur Emetteur
        // $userEm = User::where('id', '=', $request['id'])->first();
        // // Les messages 
        // event(new ChatEvent((String) $userEm->name,(String)$request['message']));
        // $messages = Message::where('userId', '=', $request['id'])->get();
        // // Les utilisateurs
        // $users = User::all();
        // return view('welcome', compact('messages', 'users', 'userEm'));
    }
    /* Les messages */
    public function index($id){
        $messages = Message::where('userId', '=', $id)->get();
        $userEm = User::where('id', '=', $id)->first();
        //header('location:/messages');
        $users = User::all();
        return view('welcome', compact('messages', 'users', 'userEm'));
    }
    /* Les Profiles */
    public function Profiles($id){
        $user = User::where('id', '=', $id)->first();
        return view('Profile', compact('user'));
    }
    

}
