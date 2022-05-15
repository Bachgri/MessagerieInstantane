<div wire:poll.1000ms>
    <div class="relative w-full p-6 overflow-y-auto ">
        <ul class="space-y-2">
            
            @forelse($messagesGroupe as $message )
                    {{--dd(Auth()->user())--}}
                    @if($message->userId != Auth()->user()->id)    
                    <li class="flex justify-start">
                            <img src="" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:7%;" alt="">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;">  </span>
                            <span class="block">{{$message->content}}</span>
                        </div>
                        </li>
                    @else
                        <li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                <span class="block">{{$message->content}}</span>
                            </div>
                            <img src="{{Auth()->user()->profilePecture}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                        </li>
                    @endif
                    @empty
                        <h1>Aucune Messages</h1>
                @endforelse
                
        </ul>
    </div>
</div>
