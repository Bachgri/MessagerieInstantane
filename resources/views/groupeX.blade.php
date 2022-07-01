<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>groupes</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @livewireStyles    
    <style>
        .showit{display: none;}
        #invitMembreD{
            position: absolute;right: 5%;top: 10%;z-index: 1000;
            width:auto; background-color: #AEbbc5; padding: 0.25cm;border-radius: 4px; display: none;
        }
        #closeInvitMembre{
            cursor: pointer;width: 1rem; height: 1rem;padding: 0.7rem; border-radius: 6px;
        }
        #closeInvitMembre:hover{
            background-color: lightgray;
        }
    </style>
</head>
<body >
    <div id="invitMembreD">
        <div class="hedaerClose" style="text-align: right;padding-bottom:1cm">
            <span id="closeInvitMembre">X</span>
        </div>
        <table>
            <tr>
                <th style="text-align: left;">nom</th><th style="text-align: left;">role</th><th>
            </tr>
            @forelse($usersToInvit as $u)
                <tr>
                    <td style="border-bottom: 2px solid gray; padding-right: 1.2rem;">{{$u->name}}</td>
                    <td style="border-bottom: 2px solid gray; padding-right: 1.2rem;">
                        {{$u->Rol}}
                    </td>
                    <td style="padding-left: 1rem ;border-bottom: 2px solid gray;">
                        <a href="/invit/{{$u->id}}/to/{{$groupeActuelle->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty

            @endforelse
        </table>
    </div>
  <div class="GroupesEmp " id="main" >
    <div class="min-w-full border rounded  row grid grid-cols-6" style="height:40rem ;" >
        <div class="border-r border-gray-300  col-start-1 col-end-3 h-10 overflow-y-auto" style="height: 100%;">
            <div class="MenuHeader">
                <style>
                    .header{
                        position: sticky;
                        top:0; left:0; right:0;
                        z-index: 1000;
                        background: none;
                        display: flex;
                        text-align: left;
                        padding:1rem ;
                        width: 20%;
                    }
                    .icons div{
                        font-size: 1.5rem;
                        font-weight: bold;
                        margin-left: 0;
                        color: black;
                        cursor: pointer;
                    }
                    .header{
                        justify-content: center;
                    }
                    .header .icons div{
                        margin:0 0.1rem;
                    }
                    /************************/
                    .side-bar{
                        position: fixed;
                        top:0; left:0%;
                        height: 100%;
                        width: 33.45%;
                        background: white;
                        z-index: 10000;
                        display: none;
                        overflow-y: auto;
                    }
                    .side-bar .active{
                        left:0;
                        box-shadow: 0 0 0 100vw rgba(0,0,0,.7);
                    }
                    .side-bar #close-side-bar{
                        position: absolute;
                        top:1rem; left:2rem;
                        font-size: 2rem;
                        cursor: pointer;
                    }
                    #close-side-bar:hover {
                        transform: rotate(90deg);
                        color:black;
                        cursor: pointer;
                    }
                    .navbar a{
                        display: block;
                        padding:0.41rem 2rem;
                        font-size: 1rem;
                    }
                    .navbar a:hover{
                        color:blue;
                        padding: 0.41rem 2.2rem;
                    }
                    .navbar  i{
                    padding-right: 2rem;
                    }
                

                    i{
                        padding-right: .5rem;
                    }
                    .user{
                        padding:2rem;
                        text-align: center;
                        align-items: center;
                    }
                    .user img{
                        height: 50%;
                        width: 50%;
                        border-radius: 50%;
                        border:1rem solid white;
                        margin-bottom: .5rem;
                        margin-left: 25%;
                    }

                    .user h3{
                        padding:.5rem 0;
                        font-size: 1rem;
                    }

                    .user a{
                        font-size: 0.8rem;
                        color:blue;
                    }
                    .user a:hover{
                        color:black;
                    }
                    

                </style>
                <header class="header">      
                    <div class="icons">
                        <div id="menu-btn" class="fas fa-bars"></div>
                    </div>

                </header>

                <div class="side-bar" id="side-bar">

                    <div id="close-side-bar" class="fas fa-times"></div>

                    <div class="user">
                        <img src="{{Storage::url(Auth()->user()->profilePecture)}}" >
                            <h3>
                                {{Auth()->user()->name}}
                            </h3>
                            <a href="/logout">log out</a>
                        </div>
                    <nav class="navbar" id="">
                        <a href="/messages"> <i class="fas fa-angle-right"></i> Mes messages </a>
                        <a href="/profiles/{{auth()->user()->id}}"> <i class="fas fa-angle-right"></i> Mon profil </a>
                        <a href="/invitation"> <i class="fas fa-angle-right"></i> Mes invitations </a>
                        <a href="/groupesCreateOne"> <i class="fas fa-angle-right"></i> Créer un groupe </a>                          
                    </nav>

                </div>
            </div>
            
    <div class="mx-3 my-3">
        <form action="/searchGAvec/{{$groupeActuelle->id}}" method="get">
            <div class="flex text-gray-600">
                <span class="flex  inset-y-0 left-0 flex items-center pl-2">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" class="w-6 h-6 text-gray-300" style="cursor: pointer;"
                        >
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg> 
                </span>
                <input type="search"  class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none" name="search"
                    placeholder="Search" required
                    />
            </div>
        </form>
    </div>
            @livewire('list-groupes', ['groupes'=>$groupes, 'otherGroupe'=>$otherGroupe,'groupeInvitation'=>$groupeInvitation])
        </div>
        <div class=" lg:col-span-4 lg:block col-start-3 col-end-7 "  >
            <div class="w-full">
                <div class=" row grid grid-cols-7 relative flex items-center p-3 border-b border-gray-300">
                    <div class="relative flex items-center col-span-6">
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="{{ Storage::url($groupeActuelle->logo) }}" alt="" />
                        <span class="block ml-2 font-bold text-gray-600">{{$groupeActuelle->nom}}</span>
                    </div>
                    <div class="items mr-300">
                        <button id="infoGroupe">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </button>
                        @if($groupeActuelle->idAdmin == auth()->user()->id)
                            <button id="invitMembre" style="padding-left: 0.2cm;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                            <button id="editGroupe" style="padding-left: 0.1cm;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                            </button>
                            <div id="FormEdit" style="display: none; position: absolute;right:40%;background-color: lightgray;z-index: 10000;border-radius: 3px;">
                                <form class="max-w-lg mt-5" method="post" action="{{ route('editGroupe') }}" enctype="multipart/form-data">
                                    @csrf 
                                    <button style="cursor: pointer;" id="closeEdite">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </button>
                                    <center><br><h1><b>Modifier le groupe</b></h1></center>
                                    <input type="hidden" name="idGroupe" value="{{$groupeActuelle->id}}">
                                    <div class="flex flex-wrap  mb-6 pb-6 px-6">
                                        <div class="w-full"><label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Nom de groupe : 
                                            </label>
                                            <input name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" 
                                                    id="grid-first-name" type="text" placeholder="nom de groupe" value="{{$groupeActuelle->nom}}">
                                            <p class="text-red-500 text-xs italic">
                                                @error('nom')
                                                    @if($message == "validation.unique")
                                                        Le nom existe déja
                                                    @elseif($message == "validation.required")
                                                        Le nom est obligatoire
                                                    @endif
                                                    
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="w-full">  
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                Logo du groupe :
                                            </label>
                                            <input name="logo" type="file" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                            <p class="text-red-500 text-xs italic">
                                                @error('logo')
                                                    @if($message == "validation.required")
                                                        Le Logo est obligatoire
                                                    @endif
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap  mb-6 mx-6">
                                        <div class="w-full ">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                            Thematique
                                        </label>
                                        <textarea name="thematique" value=""
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" placeholder="Decrivez voutre groupe ici">{{$groupeActuelle->Thematique}}
                                        </textarea>
                                            <p class="text-red-500 text-xs italic">
                                                @error('thematique')
                                                    @if($message == "validation.max.string")
                                                        Nombre maximale de caractére est 255
                                                    @elseif($message == "validation.required")
                                                        le champs Thematique est requis
                                                    @elseif($message == "validation.min.string")
                                                        Nombre minimale de caractere est 10
                                                    @endif
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-full  flex flex-wrap mb-6 pb-6 px-6" style="width: 100%;">
                                        <button type="submit" style="width: 100%;" class="form-control inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                            Modifier
                                        </button>    
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div style="height: 32rem;" class="overflow-y-auto">
                    @livewire('groupe-messages', ['idG'=>$groupeActuelle->id, 'messagesGroupe'=>$messagesGroupe])
                </div>
            </div>
            <form  action="{{route('saveMessage')}}" method="post" enctype="multipart/form-data">
                @csrf  
                <div class="relative flex">
                    <span class="absolute inset-y-0 flex items-center">
                        <span id="audioRecord" type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                        </span>
                    </span>
                    <input type="text" id="message" name="message" placeholder="Votre message!" class="message w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                    <input type="file" id="messageFile" name="messageF" placeholder="Votre fichier!" class="messagefile w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3 absolute showit">
                    <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                    <span  id="filechooser" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                    </span>
                    
                    <span  id="emj"  class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                        <input type="hidden" name="type" id="type" value="text">
                        <input type="hidden" name="userId" value="{{auth()->user()->id }}" id="idUser" class="idSent">
                        <input type="hidden" name="groupId" value="{{ $groupeActuelle->id }}" class="idGroupe">
                        <input type="file" name="fichier" id="file" style="display: none;">
                        
                        
                        <button type="submit" id="submitf"  name="envf" class="add_messagef inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-red-500 hover:bg-blue-400 focus:outline-none   ">
                            <span class="font-bold fg-blue-600"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-8 ml-2 transform rotate-90">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
<style>
    #infos{display: none ;}
    #infoGX{display: none;}
    #invitations{display: none;}
</style>
<div id="infos"
    class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" 
    style="margin-left:25%;">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   {{ $groupeActuelle->nom}}
                </h3>
                <button id="closeInfos" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="inline-flex rounded-md shadow-sm" role="group" style="width: 100%;">
                <button id="btnMmb" type="button" style="width: 33.26%;text-align: center;" class="inline-flex bg-gray-700 items-center py-2 px-12 text-sm font-bold font-medium text-white bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les membres
                </button>
                <button id="btnInf" type="button" style="width: 33.26%;text-align: center;" class="inline-flex items-center py-2 px-16 text-sm font-medium font-bold text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les Info
                </button>
                <button id="btnInv" type="button" style="width: 33.26%;text-align: center;" class="inline-flex items-center py-2 px-12 text-sm font-medium font-bold text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les invitation
                </button>
            </div>
            <div class="membres " id="membres">
                <table class="table-auto " style="width: 100%" >
                    <thead>
                        <tr style="background-color: lightgray;">
                            <th style="text-align: left;padding-left:0.9rem;">Nom</th>
                            <th style="text-align: left;padding-left:0.9rem;">email</th>
                            <th style="text-align: left;padding-left:0.9rem;">Status</th>
                            <th style="text-align: left;padding-left:0.9rem;" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class=" border-b border-gray-900">
                                @if($user->id == $groupeActuelle->idAdmin)
                                    <td style="text-align: left;padding-left:0.9rem;color:brown;">{{$user->name}}</td>
                                    <td style="text-align: left;padding-left:0.9rem;color:brown;">{{$user->email}}</td>
                                    <td style="text-align: left;padding-left:0.9rem;color:brown;">{{$user->status}} </td>
                                    <td style="text-align: left;padding-left:0.9rem;color:brown;">Admin</td>
                                @else
                                    <td style="text-align: left;padding-left:0.9rem;">{{$user->name}}</td>
                                    <td style="text-align: left;padding-left:0.9rem;">{{$user->email}}</td>
                                    <td style="text-align: left;padding-left:0.9rem;">{{$user->status}} </td>
                                @if($groupeActuelle->idAdmin == auth()->user()->id)
                                    <td style="text-align: left;padding-left:0.9rem;" >
                                        <a href="/removeUserfrom/{{$user->id}}/{{$groupeActuelle->id}}" class="fa fa-trash"></a>
                                    </td><td></td>
                                @endif
                                @endif
                            </tr>
                        @endforeach     
                    </tbody>
                </table>
            </div>
            <div class="infoGX" id="infoGX">
                <table>
                    <tr style="border-bottom:2px solid white ;">
                        <th style="text-align: left;border-right:2px solid lightgray;">Nom :</th> <td>{{$groupeActuelle->nom}} </td>
                    </tr>
                    <tr style="border-bottom:2px solid white ;">
                        <th style="text-align: left;border-right:2px solid lightgray;">Thematique : </th><td>{{$groupeActuelle->Thematique}} </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;border-right:2px solid lightgray;">Nombre des utilisateurs : </th><td>{{count($users)}} </td>
                    </tr>
                </table>
            </div>
            <div class="invitations" id="invitations">
                <table style="width: 100%;">
                        <tr style="background-color: lightgray;">
                            <th style="text-align: left;padding-left:1.4rem;border-right:2px solid black;">Nom</th>
                            <th style="text-align: left;padding-left:1.4rem;border-right:2px solid black;">email</th>
                            <th style="text-align: left;padding-left:1.4rem;border-right:2px solid black;">Date</th>
                            <th style="text-align: left;padding-left:1.4rem;" ></th>
                            <th style="text-align: left;padding-left:1.4rem;"></th>
                        </tr>
                    @foreach($invitAuGroupe as $x)
                    <tr>
                        <td style="text-align: left;padding-left:1.4rem;color:brown;">{{$x->name}}</td>
                        <td style="text-align: left;padding-left:1.4rem;color:brown;">{{$x->email}}</td>
                        <td style="text-align: left;padding-left:1.4rem;color:brown;">{{$x->created_at}}</td>
                        @if($groupeActuelle->idAdmin == auth()->user()->id)
                        <td style="text-align: left;padding-left:1.4rem;color:brown;">
                            <a href="/removeInvite/{{$x->userId}}/from/{{$groupeActuelle->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="/addMembreInvite/{{$x->userId}}/from/{{$groupeActuelle->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                </svg>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    
    <script src="{{mix('/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>

    document.querySelector("#btnMmb").onclick = ()=>{
        $("#infoGX").slideUp(200);
        $("#invitations").fadeOut(200);
        $("#membres").fadeIn(200);   
        document.querySelector("#btnInf").classList.remove('bg-gray-700');   
        document.querySelector("#btnInf").classList.remove('text-white'); 
        document.querySelector("#btnInf").classList.remove('text-gray-900'); 
        document.querySelector("#btnMmb").classList.add('bg-gray-700'); 
        document.querySelector("#btnMmb").classList.add('text-white'); 
        document.querySelector("#btnInv").classList.remove('bg-gray-700');     
        document.querySelector("#btnInv").classList.remove('text-white'); 
        document.querySelector("#btnInv").classList.remove('text-gray-900'); 
    }
    document.querySelector("#btnInf").onclick = ()=>{
        $("#membres").fadeOut(100);
        $("#invitations").slideUp(200);
        $("#infoGX").slideDown(200);
        document.querySelector("#btnInf").classList.add('bg-gray-700');   // btn info background black 
        document.querySelector("#btnInf").classList.remove('text-gray-700');     
        document.querySelector("#btnInf").classList.add('text-white');     /**** fin btn info  *****/
        document.querySelector("#btnInv").classList.remove('bg-gray-700');// btn invit bg white
        document.querySelector("#btnInv").classList.add('text-gray-700');     
        document.querySelector("#btnMmb").classList.remove('text-white'); //btn membre text white
        document.querySelector("#btnMmb").classList.add('text-gray-700');     // btn membre text gray
        document.querySelector("#btnMmb").classList.remove('text-gray-700');     
        document.querySelector("#btnMmb").classList.remove('bg-gray-700');     
    }
    document.querySelector("#btnInv").onclick = ()=>{
        $("#infoGX").slideUp(200);
        $("#membres").slideUp(200);
        $("#invitations").slideDown(200);
        document.querySelector("#btnInf").classList.remove('text-white'); 
        document.querySelector("#btnInf").classList.remove('text-gray-700'); 
        document.querySelector("#btnInf").classList.remove('bg-gray-700');   
        document.querySelector("#btnMmb").classList.remove('text-white'); 
        document.querySelector("#btnMmb").classList.remove('text-gray-700'); 
        document.querySelector("#btnMmb").classList.remove('bg-gray-700'); 
        document.querySelector("#btnInv").classList.add('bg-gray-700');         
        document.querySelector("#btnInv").classList.remove('bg-white');         
        document.querySelector("#btnInv").classList.add('text-white');  
        document.querySelector("#btnInv").classList.remove('text-gray-700');  
    }
    document.querySelector("#infoGroupe").onclick = ()=>{
        $("#infos").slideToggle(500);
        $("#main").css('opacity', '0.50')
    }
    document.querySelector("#closeInfos").onclick = ()=>{
        $("#infos").slideUp(300);
        $("#main").css('opacity', '1')
    }
    
    document.querySelector("#closeInvitMembre").onclick = ()=>{
        $("#invitMembreD").slideUp(300);
        $("#main").css('opacity', '1')
    }
    document.querySelector('#emj').onclick = () =>{
        // document.querySelector('#emojy').classList.toggle('emojyhid');
        $("#emojy").slideToggle(300);
        $("#audiodiv").fadeOut(300);
    }
    document.querySelector('#menu-btn').onclick = () =>{
        $('#side-bar').slideToggle(400);
    }
    document.querySelector('#close-side-bar').onclick = () =>{
        $('#side-bar').slideToggle(400);
    }
    document.querySelector("#filechooser").onclick = () =>{
        $("#emojy").slideUp(300);
        $("#audiodiv").fadeOut(300);
        var inp = document.querySelector("#messageFile");
        var btnf = document.querySelector("#submitf");
        var tp = document.getElementById("type");

        if(tp.value === "text" || tp.value==="audio"){
            inp.classList.remove("showit");
            //btnf.classList.remove("showit");
            tp.value = "image";
            inp.click();
        }else{
            inp.classList.add('showit');
           // btnf.classList.add('showit');    
            tp.value = "text";
        }
    }
  
    $(document).ready(function(){
        // $(document).on('click', '.submitMessage', function(e){
        //     e.preventDefault();

        //     var data = {
        //         'message' : $('.Message').val(),
        //         'idUser'  : $('.idUser').val(),
        //         'idGroupe': $('.idGroupe').val()
        //     };

        //     // console.log(data);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type : 'POST',
        //         url  : '/saveMessage',
        //         data : data ,
        //         dataType: 'json',
        //         success:function(reponse){
        //           console.log("reponse");
        //         }
        //     })
        // });
    });
    document.querySelector("#invitMembre").onclick = ()=>{
        $("#invitMembreD").fadeToggle(400);
        $("#main").css('opacity', '0.50');
    }
    document.querySelector('#editGroupe').onclick = ()=>{
        $('#FormEdit').fadeIn(300);
    }

    document.querySelector('#closeEdite').onclick = ()=>{
        $('#FormEdit').fadeIn(300);
    }

    
    </script>

    @livewireScripts
</body>
</html>