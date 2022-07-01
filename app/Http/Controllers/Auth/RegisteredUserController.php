<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'alpha_num'],
        ],
        [
            'required'=>'Le champ :attribute est obligatoire',
            'min'=>'Le champs :attribute doit avoir plus de :min caractéres',
            'email.unique'=>'cette adresse email est déja pret',
            'password.alpha_num'=>'Le mot de passe doit contenir des chifres et des littres',
            'password.confirmed'=>"Le champ confirm password doit avoir la même valeur que le champs password"
        ]
        );
        if(isset($request['photo'])){
            $logo = Storage::disk('public')->put("images", $request['photo']);
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => "enligne"
            
        ]);

        //event(new Registered($user));

        Auth::login($user);

        return redirect('/messages');
    }
}
