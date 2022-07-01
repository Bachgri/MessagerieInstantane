<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prive</title>
    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        
        .mdi:hover{
            background-color: rgba(237, 242, 222, 0.5);
        }
        .message-groupes{
            padding-top: 4%;
        }
        .scrollbar-w-2::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
        }

        .scrollbar-w-2::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
            background-color: red;
            color: red;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: red;
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: red;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
        }
        .scrollbar-w-2::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
        }
        .emojy{
            width:60% ;background-color: lightgray;padding: 1rem;border-radius: 7px;
            position: absolute;display: block;
            overflow-y: auto;height: 7rem;bottom: 5rem;
        }
        .emojy button{
            width: 2rem;height: 2rem;outline: none;
        }
        .emojyhid{
            display: none;
        }
        .msgs{
            overflow-y: auto;
        }
        .glyphicon-remove:before{content:"\e018"}
        .glyphicon{position:relative;top:1px;display:inline-block;font-family:"Glyphicons Halflings";font-style:normal;font-weight:400;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
        #appels{
            width: 100%;

        }
        .video{
            width: 60%; background-color: #222 ;
            height: 60%; position: absolute;top:0; margin-left: 20%;
            margin-top: 10% ;border-radius: 14px;padding: 0.09rem 0 1.5rem;
            border: 2px solid black;
        }
        .message-groupes .flex a{
            width: auto;
        }
        .chat-message:hover svg{
            display: block;
        }
        .showit{
            display: none;
        }
        .hidevd{display: none;}
        
        .audio svg{
            cursor: pointer;
        }
        .audio svg:hover{
            color: #222; 
        }
        .audio{
            text-align: center;justify-content: space-between;width: 60%;
            
        }
        .audiohide{
            display: none;
        }
        .audio{
            align-items: center ;display:flex
        }
    </style>
    <script>
        document.getElementById('user{{$userEm->id}}').style.backgroundColor="red";
    </script>
</head> 
<body class="bg-gray-100 h-screen antialiased leading-none font-sans ">
<!-- component -->
    <div class="row grid grid-cols-6 gap-4 " >
            <div class="col-start-1 col-end-3 message-groupes " style="width:auto;background-color: lightgray;height:39rem;overflow: auto;">
                <div class="MenuHeader">
                    <style>
                        .header{
                            position: sticky;
                            top:0; left:0; right:0;
                            z-index: 1000;
                            background: none;
                            display: flex;
                            text-align: left;
                            padding-left: 1.7rem;padding-top: -0.3rem;
                            width: 10%;
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
                            top:1rem; left:1.2rem;
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
                            <a href="/groupes"> <i class="fas fa-angle-right"></i> Mes groupes </a>
                            <a href="/profiles/{{auth()->user()->id}}"> <i class="fas fa-angle-right"></i> Mon Profil </a>
                            <a href="/invitation"> <i class="fas fa-angle-right"></i> Mes invitations </a>
                            <a href="/groupe/create"> <i class="fas fa-angle-right"></i> Créer un groupe </a>                        
                        </nav>

                    </div>
                </div>     
                <form method="" action="/search/{{$userEm->id}}" style="width: 90%;">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="search" class="block w-full mx-4 py-2 pl-10 bg-gray-100 rounded outline-none" name="search"
                                placeholder="Search"  />                        
                            <span class="input-group-btn">
                                
                            </span>
                        </div><!-- /input-group -->
                    </div><br>
                </form>
                    
                @livewire('users' , ['users'=>$users])
            </div>
        <div class="col-start-3 col-span-7">
            <div class="row col-lg-8">
                <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
                    <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                        <div class="relative flex items-center space-x-4" style="height: 0rem;" >
                            <div class="relative">
                                @if($userEm->status == 'enligne')
                                    <span class="absolute text-green-500 right-0 bottom-0">
                                        <svg width="20" height="20">
                                            <circle cx="8" cy="8" r="8" fill="green"></circle>
                                        </svg>
                                    </span>
                                @else
                                    <span class="absolute text-gray-500 right-0 bottom-0">
                                        <svg width="20" height="20">
                                            <circle cx="8" cy="8" r="8" fill="gray"></circle>
                                        </svg>
                                    </span>
                                @endif
                                <img src="{{Storage::url($userEm->profilePecture)}}" class="w-8 sm:w-16 h-8 sm:h-16 rounded-full">
                            </div>
                            <div class="flex flex-col leading-tight">
                                <div class="text-2xl mt-1 flex items-center">
                                    <span class="text-gray-700 mr-3">{{$userEm->name}}</span>
                                </div>
                                <span class="text-lg text-gray-600">{{$userEm->Rol}}</span>
                            </div>
                        </div>
                        <div class="flex items-center" style="color: black;">
                            <i style="font-size: 27pt;cursor: pointer;" id="vid" class="mdi mdi-video text-black-1200 mr-8 h-10"></i>
                            <i style="font-size: 27pt;cursor: pointer;" id="aud" class="mdi mdi-phone text-black-1200 mr-6 h-10"></i>
                            <i style="font-size: 27pt;cursor: pointer;" id="pts" class="mdi mdi-dots-vertical text-gray-1200 mr-2 h-10"></i>
                            
                        </div> 
                    </div>
                    <div class="msgs">
                        @livewire('user-controller', ['userEm'=>$userEm])
                    </div>
                    <div class="border-t-2 border-gray-200 px-1 pt-4 mb-2 sm:mb-0">
                        <div class="emojy emojyhid" id="emojy" >
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128147;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128148;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128149;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128150;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128151;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128152;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128512;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128513;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128514;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128515;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128516;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128517;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128518;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128519;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128520;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128521;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128522;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128523;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128524;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128525;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128526;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128527;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128528;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128529;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128530;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128531;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128532;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128533;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128534;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128535;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128536;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128537;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128538;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128539;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128540;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128541;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128542;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128543;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128544;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128545;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128546;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128547;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128548;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128549;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128550;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128551;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128552;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128553;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128554;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128555;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128556;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128557;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128558;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128559;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128560;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128561;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128562;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128563;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128564;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128565;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128566;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128567;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128568;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128569;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128570;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128572;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128573;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128574;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128575;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128576;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128577;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128577;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128578;</button>
                            <button onclick="document.getElementById('message').value+=this.innerHTML">&#128579;</button>

                            
                        </div>
                        <div id="audiodiv" class="audio audiohide " style="display: none;">
                            <svg id="anullerAudio" xmlns="http://www.w3.org/2000/svg" width="20" height="60" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            <svg id="startAudio"  xmlns="http://www.w3.org/2000/svg" width="30" height="60" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                            </svg>
                                <span id="tempAudio">00:00</span>
                            <svg id="stopandsend" xmlns="http://www.w3.org/2000/svg" width="30" height="60" viewBox="0 0 20 20" fill="currentColor" class="ml-2 transform rotate-90">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                            </svg>

                        </div>
                        <form  action="{{route('message')}}" method="post" enctype="multipart/form-data">
                            @csrf  
                            <div class="relative flex">
                                <span class="absolute inset-y-0 flex items-center">
                                    <span id="audioRecord" type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                        </svg>
                                    </span>
                                </span>
                                <input type="text"  id="message" name="message" placeholder="Votre message!" class="message w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                                <input type="file" id="messageFile" name="message" placeholder="Votre fichier!" class="messagefile w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3 absolute showit">
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
                                    <input type="hidden" name="idSent" value="{{auth()->user()->id }}" id="idUser" class="idSent">
                                    <input type="hidden" name="idReceive" value="{{ $userEm->id }}" class="idReceiv">
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
            </div>
            </div>
        </div>
        <script>
        const el = document.getElementById('messages')
        el.scrollTop = el.scrollHeight
    </script>
    </div>
    <div id="appels">
        <div class="video hidevd" id="video" >
            <div class="headerClose">
                <div class="icons" style="text-align: right">
                    <div class="items">
                        <span id="vd" class="mdi mdi-close" style="font-size:2rem; cursor:pointer;border-top-right-radius: 14px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{mix('/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
    document.querySelector('#menu-btn').onclick = () =>{
        $('#side-bar').slideToggle(400);
    }
    document.querySelector('#close-side-bar').onclick = () =>{
        $('#side-bar').slideToggle(400);
    }
    </script>
    <script>
        $(document).ready(function (){
                $('#search').on('keyup', function(){
                    var valeur = $(this).val();
                    // console.log(value);
                    $.ajax({
                        type:'get',
                        url : '/searchusers',
                        data : {'search': valeur},
                        success: function(data){
                            console.log(data);
                        }
                    });
                });
        });
        var sec=0;
        var min=0;
        function tick(){
            sec++;
            if(sec>=60){
                sec=0;
                min++;
            }
            document.getElementById("tempAudio").innerHTML = min+":"+sec;
        }
        document.querySelector("#startAudio").onclick = () =>{
            i = setInterval(() => {
                tick();
            }, 1000);
            
        }
        document.querySelector("#audioRecord").onclick = ()=>{
            // document.querySelector("#audiodiv").classList.toggle("audiohide")
            // $("#audiodiv").fadeToggle(500);
            $("#audiodiv").slideToggle(600);
            $("#emojy").slideUp(200);
            
        }
        document.querySelector("#stopandsend").onclick = ()=>{
            clearInterval(i);
            document.getElementById("tempAudio").innerHTML = "00:00";
        }
        document.querySelector('#vd').onclick = () =>{
            document.querySelector('#video').classList.toggle('hidevd');
        }
        document.querySelector('#vid').onclick = () =>{
            document.querySelector('#video').classList.toggle('hidevd');
            document.querySelector('#video').classList.add('video0');
        }
        document.querySelector('#emj').onclick = () =>{
            // document.querySelector('#emojy').classList.toggle('emojyhid');
            $("#emojy").slideToggle(300);
            $("#audiodiv").fadeOut(300);
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
    
        

    </script>
@livewireScripts

</body>
</html>
