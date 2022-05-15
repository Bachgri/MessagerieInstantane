<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$user->name}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-gelap{
            background-color: #001E26;
        }
        .bg-btn{
            background-color: #FF6446;
        }
        .fieldEdit{
            width: 60%;position: absolute;top:0;background-color: red;left:20%
        }
        .rowx{
            position: absolute;right: 23%;
        }
        .header  h3{
            justify-content: space-between;
        }
    </style>
</head>
<body>

<!-- component -->
    <div class="min-h-screen flex flex-col max-w-md mx-auto bg-gray-200 opacity-100 font-poppins px-4 bg-no-repeat bg-cover bg-center">
        <div class="flex justify-between px-1 pt-4 items-center">
            <div>
                <a href="/messages"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"/>
                </svg></a>
            </div>
            <div>
                <p class="font-semibold">My Profile</p>
            </div>
            <div>
                <a href="/logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                    </svg>
                    
                </a>  
            </div>
        </div>
    <div class="flex items-center px-4 pt-12 justify-between">
        <div class="w-24 h-24 bg-blue-600 flex items-center rounded-full">
            <img class="h-20 w-20 mx-auto" src="{{$user->profilePecture}}" style="border-radius:50%;">
        </div>
        <div class="w-9/12 flex items-center">
            <div class="w-10/12 flex flex-col leading-none pl-4">
                <p class="text-2xl font-bold">{{$user->name}}</p>
                <p class="text-sm pt-1 font-light text-gray-700">{{$user->Rol}}</p>
            </div>
            <div class="w-2/12">
                <div id="edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700" fill="currentColor" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.243 19H21v2H3v-4.243l9.9-9.9 4.242 4.244L9.242 19zm5.07-13.556l2.122-2.122a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.121-4.242-4.242z"/></svg>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-12 px-4 w-full flex flex-col">
        <p class="font-semibold text-gray-600">
         -----------------------------------------------------------
        </p>
        <div class="flex w-full pt-2 space-x-2">
            <button class="bg-gray-800 w-65 rounded-full mx-2 px-7 py-1 font-ligth text-white flex">Mes Invitation</button>
            <button class="bg-green-800 w-65 rounded-full  px-11 py-1 font-ligth text-white flex">Mes groupe</button>
        </div>
    </div>
    <div class="groupes">
        @forelse(Auth()->user()->groupes as $g)
            <h1>{{$g->nom}} </h1>
        @empty
            empty
        @endforelse
    </div>
</div>
<div class="fieldEdit" id="fieldEdit" style="display: none;">
<div class="flex items-center justify-center min-h-screen bg-gray-100" style="width: 100%;">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg ">
        <div class=" header"> 
        <h3 class="text-2xl font-bold text-left">Join us</h3>
        <h3 class="text-2xl font-bold text-right">X</h3>
        </div>
        <form action="">
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Name<label>
                    <input type="text" placeholder="Name" value="{{$user->name}}"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                    <input type="text" placeholder="Email" value="{{$user->email}}"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">photo de profile<label>
                    <input type="file" placeholder="choose" value="{{$user->profilePecture}}"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <span class="text-xs text-red-400">  </span>
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        Modifier                        
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="{{mix('/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    $(document).ready(function(){
        // $("#fieldEdit").fadeOut(1);
    });
    document.querySelector("#edit").onclick = () =>{
        $('#fieldEdit').fadeIn(700);
    }
    document.querySelector("#option").onclick = () =>{
        $('#optionS').fadeToggle(300);
    }
</script>
</body>
</html>