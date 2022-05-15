<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>groupes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    <style>
      
      
    </style>
</head>
<body >
  <div class="GroupesEmp " >
    <div class="min-w-full border rounded   grid grid-cols-6" >
        <div class="border-r border-gray-300  col-start-1 col-end-3  overflow-y-auto" style="height: 80%;">
          @livewire('list-groupes', ['groupes'=>$groupes])
        </div>
        <div class=" col-start-3 col-end-7 "  >
            choose
        </div>
    </div>
  </div>
  @livewireScripts
</body>
</html>