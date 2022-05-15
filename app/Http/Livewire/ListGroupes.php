<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListGroupes extends Component
{
    public $groupes, $groupeInvit;
    public function render(){
        return view('livewire.list-groupes');
    }
}
