<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Prive</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
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
<div class="row grid grid-cols-6 gap-4 " >
    <div class="col-start-1 col-end-3 message-groupes">
        
        <div class="col-start-1 col-end-3 message-groupes" style="width:auto;background-color: lightgray;height:92%;overflow: auto;">
            <div class="flex items-center justify-center" style="width: 100%;padding-bottom: 10px;">
                <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                    <a href="/messages" aria-current="page" class="rounded-l  px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transitionduration-150 ease-in-out ">
                        Messages
                    </a>
                    
                    <a href="/groupes" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out ">
                        Groupes
                    </a>
                    <a href="/groupes" class="rounded-r px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out ">
                        Profile
                    </a>
                </div><br>
            </div>
            <div class="flex justify-center">
                <div class="mb-3 xl:w-90">
                    <div class="input-group relative flex flex-wrap items-stretch  mb-4">
                    <input type="search" class="form-control relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    </div>
                </div>
            </div>
            @forelse($users as $user)
                <div class="flex flex-col" style="border-top: 4px solid black;">
                    <div class="overflow-x-auto">
                        <div class="align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden">
                                <table class="table-fixed min-w-full divide-y divid-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                                <a href="/profiles/{{$user->id}}">
                                                    <img src="{{$user->profilePecture}}" alt="" class="h-10 w-10 rounded-full">
                                                    <span class="absolute text-gray-500 right-0 bottom-0">
                                                </a>
                                                <div class="upercase text-sm font-normal text-gray-500">
                                                    <div class="text-base font-semibold text-gray-800 ">
                                                        <a href="/messages/{{$user->id}}">{{$user->name}}</a>
                                                    </div>
                                                    <div class="text-sm font-bold text-green-500">
                                                        {{$user->status}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="col-start-3 col-span-7">
        <div class="row col-lg-8">
            <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
                <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                    <div class="relative flex items-center space-x-4">
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
                                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                                    </svg>
                                </span>
                            @endif
                            
                        
                            <img src="{{$userEm->profilePecture}}" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                        </div>
                        <div class="flex flex-col leading-tight">
                            <div class="text-2xl mt-1 flex items-center">
                                <span class="text-gray-700 mr-3">{{$userEm->name}}</span>
                            </div>
                            <span class="text-lg text-gray-600">{{$userEm->status}}</span>
                        </div>
                    </div>
                </div>
                <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                    @forelse($messages as $message)
                        <div class="chat-message">
                            <div class="flex items-end justify-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end rounded-lg inline-block rounded-br-none bg-blue-600 text-white">
                                    <div>
                                        <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                                            {{$message->content}}
                                        </span><br>
                                        <span style="font-size: 7px;" class="absolute right-0 bottom-0">
                                            {{$message->date}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                    <div class="chat-message">
                            <div class="flex items-end justify-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end rounded-lg inline-block rounded-br-none bg-blue-600 text-white">
                                    <div>
                                        <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                                            slm
                                        </span><br>
                                        <span style="font-size: 7px;" class="absolute right-0 bottom-0">
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="chat-message">
                            <div class="flex items-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                    cv ?
                                </span></div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                <div class="relative flex">
                    <span class="absolute inset-y-0 flex items-center">
                        <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                        </svg>
                        </button>
                    </span>
                    <form style="width: 100%;" action="{{route('messages')}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <input type="text" name="message" placeholder="Votre message!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                            <button type="file" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                            </button>
                        <input type="hidden" name="id" value="{{$userEm->id}}">
                            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            </button>
                            <button type="submit"  name="env" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                <span class="font-bold">Envoyer</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                </svg>
                            </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <style>
        </style>
        <?php
            // if(isset()){

            // }
        ?>
        <script>
            const el = document.getElementById('messages')
            el.scrollTop = el.scrollHeight
        </script>
        </div>
    </div>
</div>

<style>

</style>

<script>
	const el = document.getElementById('messages')
	el.scrollTop = el.scrollHeight
</script>

</div>
<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>
