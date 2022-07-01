<?php

namespace App\Http\Livewire;

use App\Models\Groupe;
use App\Models\Membre;
use Livewire\Component;
use App\Models\Invitation;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class ListGroupes extends Component
{
    public $groupes, $groupeInvit, $otherGroupe, $search = '';

    public function mountt(Request $request){
        $this->search=$request['search'];
    }
    public function render(){

        $groupesDontMembre = DB::table('groupes')
                        ->join('membres', 'groupes.id', '=', 'membres.groupId')
                        ->where('membres.userId', auth()->user()->id)
                        ->where('groupes.Thematique', 'like', '%'.$this->search.'%')
                        ->select('groupes.*')
                        ->get();
        $this->groupes = $groupesDontMembre;
        $groupeInvit = DB::table('groupes')
                            ->join('invitations', 'groupes.id', 'invitations.groupId')
                            ->where('invitations.userId', '=', auth()->user()->id)
                            ->where('groupes.Thematique', 'like', '%'.$this->search.'%')
                            ->select('*')
                            ->get();
        $this->groupeInvit = $groupeInvit;
        $invits = Invitation::where('userId', '=', auth()->user()->id)
                ->select('groupId')
                ->get();
        $membr  = Membre::where('userId', '=', auth()->user()->id)
                    ->select('groupId')
                    ->get();
                    
        //dd(($invits.','));
        $otherGroupe = Groupe::whereNotIn('groupes.id',$invits)
                             ->whereNotIn('groupes.id', $membr)
                             ->where('groupes.Thematique', 'like', '%'.$this->search.'%')
                             ->get();
        $this->otherGroupe = $otherGroupe;
        return view('livewire.list-groupes');/*, ['otherGroupe'=>$otherGroupe ,
                                                'groupes'=>$groupesDontMembre, 
                                                'groupeInvitation'=>$groupeInvit]);*/
    }
    // public function render0(Request $request){
    //     $this->search = $request['search'];
    //    $this->render();
    // }
    /*
    public function render0(){
        $groupesDontMembre = DB::table('groupes')
                        ->join('membres', 'groupes.id', '=', 'membres.groupId')
                        ->select('groupes.*')
                        ->where('membres.userId', auth()->user()->id)
                        ->get();
        $this->groupes = $groupesDontMembre; 
        $groupeInvit = DB::table('groupes')
                            ->join('invitations', 'groupes.id', 'invitations.groupId')
                            ->where('invitations.userId', '=', auth()->user()->id)
                            ->select('*')
                            ->get();
        $this->groupeInvit = $groupeInvit;
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
        $this->otherGroupe = $otherGroupe;
        return view('livewire.list-groupes', ['otherGroupe'=>$otherGroupe ,
                                                'groupes'=>$groupesDontMembre, 
                                                'groupeInvitation'=>$groupeInvit]);
    }
    */
}
