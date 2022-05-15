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
<div class="row grid grid-cols-6 gap-4 " >
    <div class="col-start-1 col-end-3 message-groupes">
        
        <div class="col-start-1 col-end-3 message-groupes" style="width:auto;background-color: lightgray;height:140%;overflow: auto;">
            <div class="flex items-center justify-center" style="width: 100%;padding-bottom: 10px;">
                <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                    <a href="/messages" aria-current="page" class="rounded-l  px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transitionduration-150 ease-in-out ">
                        Messages
                    </a>
                    <a href="/groupes" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out ">
                        Groupes
                    </a>
                
                    <a href="/profiles/{{ Auth()->user()->id }}" class="rounded-r px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out ">
                        Mon Profile
                    </a>
                    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                        </ul>
                    </div>
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
            @if($user->id == auth()->user()->id)

            @else
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
                @endif
            @empty
            @endforelse
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
