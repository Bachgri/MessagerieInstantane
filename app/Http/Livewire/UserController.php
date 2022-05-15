<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Component{
    public $messages;
    public $userEm;
    
    public function render(){
        $this->messages = Message::all();
        return view('livewire.user-controller');
    }
}
