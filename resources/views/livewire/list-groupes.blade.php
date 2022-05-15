<div  >
    {{now()}}
    <div class="mx-3 my-3">
        <div class="flex text-gray-600">
            <span class="flex  inset-y-0 left-0 flex items-center pl-2">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="search" class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none" name="search"
                placeholder="Search" required />
        </div>
    </div>
    <h2 class=" my-2 mb-2 ml-2  text-lg text-gray-600">groups</h2>
    <ul class="overflow-auto ">
        @forelse($groupes as $group)
        <li>
            <a href="/groupes/{{$group->id}}" class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                <img class="object-cover w-10 h-10 rounded-full" src="/images/{{$group->logo}}" alt="{{--$group->nom--}} logo" />
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
        @if($groupeInvit!=null)
        <h2 class=" my-2 mb-2 ml-2  text-lg text-gray-600">Invitation</h2>
            @forelse($groupeInvit as $invit)
                <li>
                    <span class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full" src="/images/{{$group->logo}}" alt="{{--$group->nom--}} logo" />
                        <div class="w-full pb-2">
                        <div class="flex justify-between">
                            <span class="block ml-2 font-semibold text-gray-600">{{$invit->nom}}</span>
                            <span class="block ml-2 text-sm text-gray-600">{{$invit->type}}</span>
                        </div>
                        <span class="block ml-2 text-sm text-gray-600">{{--dd($group)--}}</span>
                        </div>
                    </span>
                </li>
                @empty

            @endforelse
        @endif
    </ul>
</div>
