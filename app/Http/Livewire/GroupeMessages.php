<?php

namespace App\Http\Livewire;

use App\Models\Messagesdegroupes;
use Livewire\Component;

class GroupeMessages extends Component
{
    public $messagesGroupe, $idG;
    public function render(){
        $messagesGroupe0 = Messagesdegroupes::where('groupId', '=', $this->idG)->get();
        $this->messagesGroupe = $messagesGroupe0;
        // dd($messagesGroupe);
        return view('livewire.groupe-messages', ['messagesGroupe'=>$this->messagesGroupe]);
    }
}
