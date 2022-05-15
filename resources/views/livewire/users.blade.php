<div wire:poll.1000ms>
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
                                    <a href="/userprofile/{{$user->id}}">
                                        <img src="{{$user->profilePecture}}" alt="" class="h-10 w-10 rounded-full">
                                        <span class="absolute text-gray-500 right-0 bottom-0">
                                    </a>
                                    <div href="/messages/{{$user->id}}" class="upercase text-sm font-normal text-gray-500">
                                        <div class="text-base font-semibold text-gray-800 ">
                                            <a href="/messages/{{$user->id}}">{{$user->name}}</a>
                                        </div>
                                        @if($user->status=="enligne")
                                            <div class="text-sm font-bold text-green-500">
                                                {{$user->status}}
                                            </div>
                                        @else
                                            <div class="text-sm font-bold text-gray-500">
                                                {{$user->status}}
                                            </div>
                                        @endif
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
