<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <div class="text-red-500">
            
            <p style="color: white;">{{$i=1}}</p>
            @foreach($errors->all() as $error)
                Erreur {{$i++}}: {{$error}}
                <br>
            @endforeach
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nom')" />

                <x-input id="name" 
                    class="block mt-1 w-full"                     
                    class="block mt-1 w-full form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    type="text"  placeholder="Nom  "
                    name="name" :value="old('name')"  autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full block mt-1 w-full form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    type="email"  placeholder="Email "
                    name="email" :value="old('email')"  />
                <p></p>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Met de passe')" />

                <x-input id="password" class="block mt-1 w-full block mt-1 w-full form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                type="password"
                                name="password" placeholder="Mot de passe "
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer Le mot de pass')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                class="block mt-1 w-full form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                type="password" placeholder="Confirmer le mot de passe "
                                name="password_confirmation"  />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/login">
                    {{ __('Avez vous déja un compte?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Créer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

</body>
</html>