<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
                <p class="font-semibold">Profil de {{$user->name}} </p>
            </div>
            <div>
                  
            </div>
        </div>
    <div class="flex items-center px-4 pt-12 justify-between">
        <div class="w-24 h-24 bg-blue-600 flex items-center rounded-full">
            <img class="h-20 w-20 mx-auto" src="{{Storage::url($user->profilePecture)}}" style="border-radius:50%;">
        </div>
        <div class="w-9/12 flex items-center">
            <div class="w-10/12 flex flex-col leading-none pl-4">
                <p class="text-2xl font-bold">{{$user->name}}</p>
                <p class="text-sm pt-1 font-light text-gray-700">{{$user->Rol}}</p>
            </div>
            
        </div>
    </div>
    
    
</div>


<script src="{{mix('/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


</body>
</html>