<div  class=" flex flex-col w-full h-screen ">
    <div class=" flex h-16 items-center justify-center gap-2 bg-green-400">
        <input type="search" class="rounded-xl" placeholder="Search Name..." />
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 30 30">
            <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
        </svg>
    </div>


    <div class="py-4 relative flex flex-grow flex-col px-10 justify-start" style="background-color:#e5ddd5;">
        <span class="mb-6 text-sm rounded-3xl shadow-lg bg-blue-400 w-fit p-2">Have a chat with your fellows</span>

       <div  wire:poll.keep-alive.100ms class="flex flex-col  p-2  overflow-x-hidden scrollbar-hidden rounded-md h-96 overflow-y-auto ">
           @php
               function labelDate($date)
                {
                  $carbonDate = \Carbon\Carbon::parse($date);
                  $yesterday = \Carbon\Carbon::yesterday();

                  if ($carbonDate->isSameDay($yesterday)) {
                     return 'Yesterday';
                  } else {
                     return $carbonDate->format('H:i'); // Format for other dates
                  }
                }
           @endphp
           @foreach($chats as $chat)
               @if($chat->user_reg_no === auth()->user()->regNo)
               <div
                   class="ml-auto rounded-lg rounded-tr-none my-1 p-2 text-sm bg-green-300 flex flex-col relative speech-bubble-right">
                   <div class="flex gap-2">
                       <div class="flex flex-col z-10">
                           <p class="">{{ $chat->user_chat }}</p>
                           <p class="text-gray-600 text-xs mt-2 italic text-right leading-none">{{ labelDate($chat->created_at)}}</p>
                       </div>
                       <button wire:click="viewDetails({{ $chat->id }})" class="flex mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-three-dots-vertical " viewBox="0 0 16 16">
                               <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                           </svg>
                       </button>
                       @if($this->openDetails[$chat->id] ?? false)
                           <div  class="origin-top-right absolute right-0 mt-6 w-20 z-30 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 flex flex-col">
                               <!-- Dropdown content here -->
                               <button wire:click="deleteChat({{ $chat->id }})" class=" px-4 py-2 text-gray-900 text-xs hover:bg-gray-100 hover:rounded-lg">delete</button>
                               <button onclick="copyText('{{ $chat->user_chat }}')" class=" px-4 py-2 text-gray-900 text-xs hover:bg-gray-100 hover:rounded-lg">copy</button>
                               <button wire:click="closeDetails" class=" px-4 py-2 text-gray-900 text-xs hover:bg-gray-100 hover:rounded-lg flex items-center justify-center">
                                   <svg height="12" width="12" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 26 26" xml:space="preserve">
                                     <g>
                                      <path style="fill:#030104;" d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                             	     	C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                            	    	L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
	                                 	L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                            	    	c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
	                                	C19.033,16.725,19.033,17.138,18.78,17.394z"/>
                                     </g>
                                   </svg>
                               </button>
                           </div>
                       @endif
                   </div>
               </div>
               @else
               <div class="mr-auto rounded-lg rounded-tl-none my-1 p-2 text-sm bg-white flex flex-col relative speech-bubble-left">
                       <div class="flex gap-2 bg-gray-200 mb-2 rounded-md items-center w-fit p-1">
                           <img src="{{ asset('storage/'.$chat->user_photo_url) }}" class="flex h-6 w-6 rounded-md" />
                           <span class="flex text-xs items-center justify-center italic">{{'@'.\Illuminate\Support\Facades\DB::table('users')->where('regNo', $chat->user_reg_no)->value('username')}}</span>
                       </div>

                   <p>{{ $chat->user_chat }}</p>
                   <p class="text-gray-600 text-xs mt-2 italic text-right leading-none">{{ $chat->created_at}}</p>
               </div>
               @endif
           @endforeach

       </div>

        <form wire:submit.prevent="sendMessage" class="flex flex-row items-center justify-end w-full gap-1 mr-4 mt-8">
            <div class="flex items-center h-20 w-full">
                <textarea wire:model="user_chat" type="text" class="rounded-xl items-center flex w-full p-2"></textarea>
            </div>
            <div class="flex-shrink-0">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" class="bg-white hover:bg-gray-400 rounded-md" height="28" viewBox="0 0 24 24" id="send">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path d="M3.4 20.4l17.45-7.48c.81-.35.81-1.49 0-1.84L3.4 3.6c-.66-.29-1.39.2-1.39.91L2 9.12c0 .5.37.93.87.99L17 12 2.87 13.88c-.5.07-.87.5-.87 1l.01 4.61c0 .71.73 1.2 1.39.91z"></path>
                    </svg>
                </button>
            </div>
        </form>


    </div>


    <style>
        .speech-bubble-right::before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border-left: 5px solid #9ae6b4;
            border-right: 5px solid transparent;
            border-top: 5px solid #9ae6b4;
            border-bottom: 5px solid transparent;
            right: -10px;
            top: 0;
        }

        .speech-bubble-left::before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border-left: 5px solid transparent;
            border-right: 5px solid white;
            border-top: 5px solid white;
            border-bottom: 5px solid transparent;
            left: -10px;
            top: 0;
        }
    </style>
</div>

<script>
    function copyText(textToCopy) {
        const textarea = document.createElement('textarea');
        textarea.value = textToCopy;

        textarea.style.position = 'fixed';
        textarea.style.top = '0';
        textarea.style.left = '0';

        document.body.appendChild(textarea);

        textarea.select();
        document.execCommand('copy');

        document.body.removeChild(textarea);

        alert('Text copied to clipboard!');
    }

</script>
