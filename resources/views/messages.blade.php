<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <title>Prive</title>
    @livewireStyles

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
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

    </style>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans ">
<!-- component -->
<div class="row grid grid-cols-6 gap-4 " style="height: 40rem;">
        
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
                <a href="/profiles/{{auth()->user()->id}}"> <i class="fas fa-angle-right"></i> Mon profil </a>
                <a href="/invitation"> <i class="fas fa-angle-right"></i> Mes invitations </a>
                <a href="/groupe/create"> <i class="fas fa-angle-right"></i> Créer un groupe </a>                        
            </nav>

        </div>
    </div>     
    <form method="" action="/search/{{auth()->user()->id}}" style="width: 90%;">
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
    <div class="col-start-3 col-end-7">
        
        <div class="row grid grid-cols-6">
            <div class=" col-start-1 col-end-7">
                <div class="w-full col-statr-1 col-end-3">
                    <div class="w-full col-start-1 col-end-4 pt-10">
                        <img src="/images/h.png" alt="" style="width: 57rem;height: 37rem;">
                    </div>
                    <div style="position: absolute; top:60%;right:6%; font-size: 1.5rem;">choisissez un utilisateur pour lui envoyer des messages</div>
                </div>
            </div>
        </div>
    </div>
</div>
    

    

<style>

</style>

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


</div>
<script src="{{mix('/js/app.js')}}"></script>
@livewireScripts

</body>
</html>
