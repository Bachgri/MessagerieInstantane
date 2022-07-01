<div wire:poll.1000ms>
    <div class="relative w-full p-6 overflow-y-auto ">
        <ul class="space-y-2">
            @forelse($messagesGroupe as $message )
                    {{--dd(Auth()->user())--}}
                    @if($message->userId != Auth()->user()->id)    
                        <li class="flex justify-start">
                        <!-- <img src="" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo"> -->
                        @if($message->type == "text")
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <span class="block">{{\Crypt::decryptString($message->content)}}</span>
                            </div>
                        @elseif($message->type == "png" or $message->type == "jpg")
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="{{Storage::url(\Crypt::decryptString($message->content))}}" alt="" style = "width:10rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @elseif($message->type == "pdf")
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="/images/filePDF.png" alt="" style = "width:10rem;height:4rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @elseif($message->type == "txt")
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="/images/fileTXT.png" alt="" style = "width:10rem;height:4rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @elseif($message->type == "pptx")
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="/images/filePPT.png" alt="" style = "width:10rem;height:4rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="/images/file.png" alt="" style = "width:10rem;height:4rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                        </li> 
                    @else
                        @if($message->type == "text")
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <span class="block">{{\Crypt::decryptString($message->content)}}</span>
                                </div>
                                <img src="{{Storage::url(Auth()->user()->profilePecture)}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                            </li>
                        @elseif($message->type == "png" or $message->type == "jpg")
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <img src="{{Storage::url(\Crypt::decryptString($message->content))}}" style="width:10rem; border-radius: 7px 0 7px 7px;">
                                    
                                </div>
                                <img src="{{Storage::url(Auth()->user()->profilePecture)}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                            </li>
                        @elseif($message->type == "pdf")
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <img src="/images/filePDF.png" style="width:10rem; border-radius: 7px 0 7px 7px;">
                                    
                                </div>
                                <img src="{{Storage::url(Auth()->user()->profilePecture)}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                            </li>
                        @elseif($message->type == "txt")
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <img src="/images/fileTXT.png" style="width:10rem; border-radius: 7px 0 7px 7px;">
                                    
                                </div>
                                <img src="{{Storage::url(Auth()->user()->profilePecture)}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                            </li>
                        @elseif($message->type == "pptx")
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <img src="/images/filePPT.png" style="width:10rem; border-radius: 7px 0 7px 7px;">
                                    
                                </div>
                                <img src="{{Storage::url(Auth()->user()->profilePecture)}}" style="border-radius: 50%;width:1rem ;height:1rem;margin-top:1.5rem;margin-left:0.2rem" alt="logo">
                            </li>
                        @else
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span style="font-size: 10px;"> {{$message->name}} : </span>
                                <img src="/images/file.png" alt="" style = "width:10rem;height:4rem; border-radius: 0 7px 7px 7px;">
                                <a href="{{Storage::url(\Crypt::decryptString($message->content))}}" download="{{$message->userId}}IN_Groupe{{$message->groupId}}at{{now()}}.{{$message->type}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    @endif
                    @empty
                        <h1>Aucune Messages</h1>
                @endforelse
                
        </ul>
    </div>
</div>
<!-- 
<a href="Storage::url(\Crypt::decryptString($message->content))" download="">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
    </svg>
</a>

 -->