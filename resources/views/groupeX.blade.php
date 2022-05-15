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
    
    @livewireStyles
    <style>

        .showit{
            display: none;
        }
      
    </style>
</head>
<body >
  <div class="GroupesEmp " >
    <div class="min-w-full border rounded  row grid grid-cols-6" >
        <div class="border-r border-gray-300  col-start-1 col-end-3 h-10 overflow-y-auto" style="height: 80%;">
            @livewire('list-groupes', ['groupes'=>$groupes, 'groupeInvit'=>$groupeInvitation])
        </div>
        <div class=" lg:col-span-4 lg:block col-start-3 col-end-7 "  >
            <div class="w-full">
                <div class="relative flex items-center p-3 border-b border-gray-300">
                    <img class="object-cover w-10 h-10 rounded-full"
                      src="/images/" alt="" />
                    <span class="block ml-2 font-bold text-gray-600">{{$groupeActuelle->nom}}</span>
                </div>
                <div style="height: 32rem;" class="overflow-y-auto">
                    @livewire('groupe-messages', ['idG'=>$groupeActuelle->id])
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
            <!-- <form action="/saveMessage" method="post" enctype="multipart/form-data"> -->
            
              <!-- <div class=" flex items-center justify-between m-0 w-full p-3 border-b border-t border-gray-300">
                  <span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                      </svg>
                  </span>
                  <input type="hidden" name="idUser" class="idUser" value="{{Auth()->user()->id}}">
                  <input type="hidden" name="idGroupe" class="idGroupe" value="{{$groupeActuelle->id}}">
                  <input type="hidden" name="typeMessage" id="typeMessage">
                  <input type="text" placeholder="Message" id="Message"
                    class="Message block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                    name="message"  required />
                  <input type="file" placeholder="Message" id="MessageF"
                    class=" Messagef block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                    name="message"  required style="display: none;"/>
                  <span class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  <button class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                  </button>
                  <button class="" type="submit">
                    <svg class="cursor-pointer w-10 h-5 text-blue-900 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                  </button>
              </div> -->
            <!-- </form> -->
        </div>
    </div>
  </div>


    <script src="{{mix('/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>

        
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
    </script>

    @livewireScripts
</body>
</html>