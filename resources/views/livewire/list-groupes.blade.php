<div  wire:poll.1000ms>
    {{--now()--}}
    <h2 class=" my-2 mb-2 ml-2  text-lg text-gray-600">groups</h2>
    <ul class="overflow-auto ">
        @if($groupes!=null)
            @forelse($groupes as $group)
                <li>
                    <a href="/groupes/{{$group->id}}" class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Storage::url($group->logo) }}" alt="{{--$group->nom--}}" />
                        <div class="w-full pb-2">
                            <div class="flex justify-between">
                                <span class="block ml-2 font-semibold text-gray-600">{{$group->nom}}</span>
                                <span class="block ml-2 text-sm text-gray-600">{{--$group->created_at->format('d/m/Y')--}}</span>
                            </div>
                            <span class="block ml-2 text-sm text-gray-600">{{--dd($group)--}}</span>
                        </div>
                    </a>
                </li>
            @empty
                <h2>Aucun Groupe</h2>
        @endforelse
        @endif
        @if($groupeInvit!=null)
            <h2 class=" my-2 mb-2 ml-2  text-lg text-gray-600">Invitation</h2>
            @forelse($groupeInvit as $invit)
                <li>
                    <span class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Storage::url($invit->logo) }}" alt="{{--$invit->nom--}} logo" />
                        <div class="w-full pb-2">
                        <div class="flex justify-between">
                            <span class="block ml-2 font-semibold text-gray-600">{{$invit->nom}}</span>
                            <span class="block ml-2 text-sm text-gray-600">{{$invit->type}}</span>
                        </div>
                        <span class="block ml-2 text-sm text-gray-600">{{--dd($invit)--}}</span>
                        </div>
                    </span>
                </li>
                @empty

            @endforelse
        @endif
        @if($otherGroupe!=null)
        <h2 class=" my-2 mb-2 ml-2  text-lg text-gray-600">suggestions</h2>
            @forelse($otherGroupe as $invit)
                <li>
                    <span class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Storage::url($invit->logo) }}" alt="{{--$invit->nom--}} logo" />
                        <div class="w-full pb-2">
                        <div class="flex justify-between">
                            <span class="block ml-2 font-semibold text-gray-600">{{$invit->nom}}</span>
                            <span class="block ml-2 text-sm text-gray-600">{{$invit->type}}</span>
                            <span class="block ml-2 text-sm text-gray-600"> 
                                <a href="/groupe/sendInvit/{{$invit->id }}">
                                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        Ajouter
                                    </button>  
                                </a>                          
                            </span>
                        </div>
                        </div>
                    </span>
                </li>
                @empty

            @endforelse
        @endif
    </ul>
</div>
