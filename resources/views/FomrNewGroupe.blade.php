<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Groupe</title>
    <link rel="stylesheet" href="{{asset('/css/app.css') }}">
    <style>
        body{
            text-align: center;
        }
        .form{
            width: 40%;margin-left: 30%; background-color: lightgray;
            text-align: left;
        }
        .form form{
            width: 100%;
        }
        
    </style>
</head>
<body>
<div class="form mt-10">
    <form class="max-w-lg mt-5" method="post" action="{{ route('storeGroupe') }}" enctype="multipart/form-data">
        @csrf 
        <center><br><h1><b>Crée un groupe</b></h1></center>
        <div class="flex flex-wrap  mb-6 pb-6 px-6">
            <div class="w-full"><label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nom de groupe : 
                </label>
                <input name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="nom de groupe">
                <p class="text-red-500 text-xs italic">
                    @error('nom')
                        @if($message == "validation.unique")
                            Le nom existe déja
                        @elseif($message == "validation.required")
                            Le nom est obligatoire
                        @endif
                        
                    @enderror
                </p>
            </div>
            <div class="w-full">  
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Logo du groupe :
                </label>
                <input name="logo" type="file" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                <p class="text-red-500 text-xs italic">
                    @error('logo')
                        @if($message == "validation.required")
                            Le Logo est obligatoire
                        @endif
                    @enderror
                </p>
            </div>
        </div>
        <div class="flex flex-wrap  mb-6 mx-6">
            <div class="w-full ">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Thematique
            </label>
            <textarea name="thematique" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" placeholder="Decrivez voutre groupe ici">
            </textarea>
                <p class="text-red-500 text-xs italic">
                    @error('thematique')
                        @if($message == "validation.max.string")
                            Nombre maximale de caractére est 255
                        @elseif($message == "validation.required")
                            le champs Thematique est requis
                        @elseif($message == "validation.min.string")
                            Nombre minimale de caractere est 10
                        @endif
                    @enderror
                </p>
            </div>
        </div>
        <div class="w-full  flex flex-wrap mb-6 pb-6 px-6" style="width: 100%;">
            <button type="submit" style="width: 100%;" class="form-control inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Crée</button>    
        </div>
       
        
    </form>
        
</div>
</body>
</html>