<?php

namespace App\Http\Controllers;

use App\Models\MessagesDeGroupe;
use App\Models\Messagesdegroupes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupeController extends Controller{
    
    public function index($id){
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
        // dd($groupeInvitation);                   
        $messagesGroupe  =  DB::table('Messagesdegroupes')
                            ->where('groupId', '=', $id)
                            ->get();
        $groupeActuelle = DB::table('groupes')->find($id);                            
        // dd($messagesGroupe);
        return view('groupeX', ['groupes'=>$groupesDontMembre, 'messagesGroupe'=>$messagesGroupe, 'groupeActuelle'=>$groupeActuelle, 'groupeInvitation'=>$groupeInvitation]);
    }
    public function saveMessageMethode(Request $request){
        $message = new Messagesdegroupes();
        $message->userId = $request['userId'];
        $message->groupId = $request['groupId'];
        $message->type = $request['type'];
        if($message->type=='text'){
            $message->content = $request['message'];
        }elseif($message->type = 'image'){
            $message->content ='une image inconue';
        }
        // dd($message);
        $message->save();
        return back();
    }

}
