<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Membre;
use App\Models\Invitation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\MessagesDeGroupe;
use App\Models\Messagesdegroupes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Demandeintegration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Facade\Ignition\Exceptions\ViewException;

class GroupeController extends Controller{
    
    public function search(Request $request, $id){
        // dd($request->search);
        $groupesDontMembre = DB::table('groupes')
                        ->join('membres', 'groupes.id', '=', 'membres.groupId')
                        ->where('membres.userId', auth()->user()->id)
                        ->where('groupes.Thematique', 'like', '%'.$request->search.'%')
                        ->OrWhere('groupes.nom', 'like', '"%'.$request->search.'%"')
                        ->select('groupes.*')
                        ->get();
        // dd($groupesDontMembre);
        $groupeInvitation = DB::table('groupes')
                            ->join('invitations', 'groupes.id', 'invitations.groupId')
                            ->where('invitations.userId', '=', auth()->user()->id)
                            ->where('groupes.Thematique', 'like', '"%'.$request->search.'%"')
                            ->OrWhere('groupes.nom', 'like', '"%'.$request->search.'%"')
                            ->select('*')
                            ->get();
        // dd($groupeInvitation);
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
        // dd($otherGroupe);
        // dd($groupeInvitation);                   
        $messagesGroupe  =  DB::table('Messagesdegroupes')
                            ->join('users', 'users.id','=', 'userId')
                            ->select('*')
                            ->get();
        // dd($messagesGroupe);
        $groupeActuelle = DB::table('groupes')->find($id); 

        $users = Membre::join('users', 'membres.userId', '=', 'users.id')
                        ->get();
                        
        $users = Membre::join('users', 'membres.userId', '=', 'users.id')
                        ->where('groupId', '=', $id)                    
                        ->get();  
        $invitAuGroupe = DB::table('users')
                        ->join('invitations', 'invitations.userId', '=', 'users.id')
                        ->where('invitations.groupId', '=', $id)
                        ->select('*')
                        ->get();
        $x = Membre::where('groupId', '=', $id)
                    ->select('userId')                    
                    ->get(); 
        $y = Demandeintegration::where('groupId', '=', $id)
                    ->select('userId')
                    ->get();
        
        $usersToInvit = User::whereNotIn('users.id', $x)
                            ->whereNotIn('users.id', $y)
                            ->get();
        return view('groupeX', ['usersToInvit'=>$usersToInvit,'invitAuGroupe'=>$invitAuGroupe ,'users'=>$users,
                                'otherGroupe'=>$otherGroupe ,'groupes'=>$groupesDontMembre, 'messagesGroupe'=>$messagesGroupe, 
                                'groupeActuelle'=>$groupeActuelle, 'groupeInvitation'=>$groupeInvitation]);
    }

    public function editGroupe(Request $request){
        $id = $request['idGroupe'];
        $Groupe = Groupe::find($id);
        if(isset($request['nom'])){
            $Groupe->nom = $request['nom'];

        }
        if(isset($request['thematique']))
            $Groupe->Thematique = $request['thematique'];
        if(isset($request['logo'])){
            $cont = Storage::disk('public')->put("images", $request['logo']);
            $Groupe->logo = $cont;
        }
        $Groupe->save();
        return back();
    }

    public function invitUserToGroupe($idu, $idg){
        $demande = new Demandeintegration();
        $demande->userId = $idu;
        $demande->groupId = $idg;
        $demande->save();
        return back();
    }

    public function addMembreInvit($IDI, $IDG){
        $m = new Membre();
        $m->userId = $IDI;
        $m->groupId = $IDG;
        $m->save();
        $i = Invitation::where('groupId', '=', $IDG)
                        ->where('userId', '=', $IDI)
                        ->delete();
        return back();
    }

    public function removeMembreInvit($IDI, $IDG){
        $i = Invitation::find($IDI)->delete();
        return back();
    }
    
    public function removeInvit($idInvit){
        $invit = Demandeintegration::find($idInvit)->delete();
        return back();
    }

    public function AcceptInvit($idInvit, $idGroupe){
        $m = new Membre();
        $m->userId = Auth()->user()->id;
        $m->groupId = $idGroupe;
        $m->save();
        $i = Demandeintegration::find($idInvit)->delete();
        return back();
    }

    public function mesInvitation(){
        $invits = Demandeintegration::join('groupes', 'groupes.id', '=', 'demandeintegrations.groupId')
                    ->join('users', 'users.id', '=', 'groupes.idAdmin')
                    ->where('demandeintegrations.userId', '=', Auth()->user()->id)
                    ->select('users.name as username', 'groupes.nom', 'groupes.id as groupid', 'groupes.idAdmin', 'demandeintegrations.created_at', 'demandeintegrations.id as idInvit')
                    ->get();
        return view('invitations', ['invits'=>$invits]);
    }

    public function storeGroupeFunc(Request $request){
        // dd($request);
        $request->validate([
            'nom'=>['required', 'min:1', 'max:64', 'unique:groupes'],
            'logo'=>'required',
            'thematique'=>['required', 'min:10', 'max:255']
        ]);
        $groupe = new Groupe();
        $groupe->idAdmin = Auth()->user()->id;
        $groupe->nom = $request['nom'];
        $groupe->Thematique = $request['thematique'];
        $logo = Storage::disk('public')->put("images", $request['logo']);
        // dd($logo);
        $groupe->logo = $logo;
        $groupe->save();   
        $id = $groupe->id;
        $m = new Membre();
        $m->userId = Auth()->user()->id;
        $m->groupId = $id;
        $m->save();
        return redirect("/groupes/$id");
    }

    public function create(){
        return view('FomrNewGroupe');
    }

    public function removefromGroupe($idUser, $idGroupe){
        
        $delete = DB::table('membres')->where('userId', '=', $idUser)
                                      ->where('groupId', '=', $idGroupe)
                                      ->delete();

        return back();
    }

    public function sendInvit($id){
        $idGroupe = $id;
        $idUser = auth()->user()->id;
        $invit = new Invitation();
        $invit->userId = $idUser;
        $invit->groupId= $idGroupe;
        $invit->created_at = time();
        $invit->updated_at = time();
        $invit->type = "Envoyer";
        $invit->save();
        return back();
    }

    public function index(  $id, Request $request){
        $groupesDontMembre = DB::table('groupes')
                        ->join('membres', 'groupes.id', '=', 'membres.groupId')
                        ->where('groupes.Thematique', 'like', '"%'.$request->search.'%"')
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
            
        // dd($groupeInvitation);                   
        $messagesGroupe  =  DB::table('Messagesdegroupes')
                            ->where('groupId', '=', $id)
                            ->join('users', 'users.id','=', 'userId')
                            ->select('users.*')
                            ->get();
        // dd($messagesGroupe);
        $groupeActuelle = DB::table('groupes')->find($id); 
        $users = Membre::join('users', 'membres.userId', '=', 'users.id')
                        ->where('groupId', '=', $id)                    
                        ->get();  
        $invitAuGroupe = DB::table('users')
                        ->join('invitations', 'invitations.userId', '=', 'users.id')
                        ->select('*')
                        ->where('invitations.groupId', '=', $id)
                        ->get();
        $x = Membre::where('groupId', '=', $id)
                    ->select('userId')                    
                    ->get(); 
        $y = Demandeintegration::where('groupId', '=', $id)
                    ->select('userId')
                    ->get();
        
        $usersToInvit = User::whereNotIn('users.id', $x)
                            ->whereNotIn('users.id', $y)
                            ->get();
        // dd($usersToInvit);
        return view('groupeX', ['usersToInvit'=>$usersToInvit,'invitAuGroupe'=>$invitAuGroupe ,'users'=>$users,
                                'otherGroupe'=>$otherGroupe ,'groupes'=>$groupesDontMembre, 'messagesGroupe'=>$messagesGroupe, 
                                'groupeActuelle'=>$groupeActuelle, 'groupeInvitation'=>$groupeInvitation]);
        
        }

    public function saveMessageMethode(Request $request){
        // dd($request['groupId']);
        // dd(explode('.', $cont)[1]);  
        // dd($x); 
        if($request['type']=="image"){
            $cont = Storage::disk('public')->put("images", $request['messageF']);
            $extension = explode('.',$cont);// oualid.png.123.147 => oualid png 123 147 
            $x = $extension[count($extension)-1];
            // if($x == "png" ||$x == "jpg" || $x == "jpeg"){
            //     $type = "img";
            // }else{
            //     $type = "file";
            // }
            // dd($type);      
            $message = Messagesdegroupes::create([
                'content'=>Crypt::encryptString($cont,"",$x),
                'userId' => $request['userId'],
                'groupId' => $request['groupId'],
                'type'=> $x 
            ]);
            // dd($message);
        }else{
            // dd($request['type']);
            $message = Messagesdegroupes::create([
                'content'=>Crypt::encryptString($request['message']),
                'userId' => $request['userId'],
                'groupId' => $request['groupId'],
                'type'=> $request['type']
            ]);
        }
        return back();
    }
}