<?php

namespace App\Http\Livewire;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Message extends Component{

    public function render(Request $request){
        $messages = Message::all();
        $userEm = User::where('id', '=', $request['userSent'])->first();
        $users = User::all();
        return view('livewire.message', compact('messages', 'users', 'userEm'));
    }
}
