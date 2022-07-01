<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>groupes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    @livewireStyles
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
    <style>
       
      
    </style>
</head>
<body >
  <div class=" " >
    <div class=" border rounded   grid grid-cols-6" style="height:40rem;">
        <div class="border-r border-gray-300  col-start-1 col-end-3  overflow-y-auto" style="height: 100%;">
        <div class="MenuHeader">
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
        @livewire('list-groupes')
        </div>
        <div class=" col-start-3 col-end-7 "  >
            choose
        </div>
    </div>
  </div>
  
  <script src="{{mix('/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
      document.querySelector('#menu-btn').onclick = () =>{
          $('#side-bar').slideDown(400);
      }
      document.querySelector('#close-side-bar').onclick = () =>{
          $('#side-bar').slideUp(400);
      }
    </script>
  @livewireScripts
</body>
</html>