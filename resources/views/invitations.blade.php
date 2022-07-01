<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes invitations</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    table{
        width: 100%;
    }
    tr:nth-child(odd){
        background-color: #A1B2FF;
    }
    th{
        background-color: #989aae;
        padding: 6px 12px;text-align: left;
    }
    tr:nth-child(even){
        background-color: #FFB2A1;
    }
    td{
        padding: 6px 20px;
    }
    #mesInvit{
        width: 80%;
        margin-left: 10%;
    }
</style>
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
        top:0; left:6.15%;
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
<body>

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
                <a href="/groupes"> <i class="fas fa-angle-right"></i> Mes Groupes </a>                        
                <a href="/profiles/{{auth()->user()->id}}"> <i class="fas fa-angle-right"></i> Mon Profil </a>
                <a href="/groupesCreateOne"> <i class="fas fa-angle-right"></i> Créer un groupe </a>                        
            </nav>

        </div>
    </div>
    
    <div class="mesInvit" id="mesInvit" >
        <h1>Votre invitations </h1>
        <table class="px-20">
                <th style="border-right:2px solid lightgray;">Nom du groupe </th>
                <th style="border-right:2px solid lightgray;">admin du groupe </th>
                <th style="border-right:2px solid lightgray;">date d'invitation </th>
                <th style="border-right:2px solid lightgray;"> </th>
                <th style="border-right:0px solid lightgray;"> </th>
            @forelse($invits as $invit)
                <tr class="px-6">
                    <td style="border-right:2px solid lightgray;"> {{$invit->nom}} </td>
                    <td style="border-right:2px solid lightgray;"> {{$invit->username}} </td>
                    <td style="border-right:2px solid lightgray;"> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invit->created_at)->format('Y-m-d  h:m:s');}} </td>
                    <td class="bg-red-600 text-lg px-5 py-1 rounded border-2-gray border-b-2 cursor-pointer " ><a href="/refuse/{{$invit->idInvit }}">Refuser</a></td>
                    <td class="bg-green-500 text-lg px-5 py-1 rounded border-2-gray border-b-2 cursor-pointer " ><a href="/accept/{{$invit->idInvit}}/de/{{$invit->groupid}}">Accepter</a></td>
                </tr>
            @empty
                <tr><td></td><td col="4" style="text-align: center;">Ucune invitation pour vous</td><td></td><td></td><td></td></tr>
            @endforelse
        </table>
    </div>
    


    <script src="{{mix('/js/app.js')}}"></script>
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









</body>

</html>