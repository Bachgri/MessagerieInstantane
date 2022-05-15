<div wire:poll.1000ms id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
    foreach($messages as $message)
    @if($message->userReceiveId == $userEm->id and $message->userSentId == auth()->user()->id)
    <!---  AUthentifiant  -->
        <div class="chat-message">
            <div class="flex items-end justify-end">
                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end rounded-lg inline-block rounded-br-none bg-blue-600 text-white">
                    <div>
                        <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                            {{$message->content}}
                        </span><br>
                    </div>
                </div>
            </div>
        </div>
    @elseif($message->userReceiveId == auth()->user()->id and $message->userSentId == $userEm->id)
        <div class="chat-message">
            <div class="flex items-end">
                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                    <div>
                        <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                            {{$message->content}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endforeach
    <!-- <div class="flex items-end justify-end">
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
    </div> -->
</div>