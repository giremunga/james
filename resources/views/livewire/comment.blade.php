 <div>
     @foreach ($comments as $comment)
         <div key="{{ $comment['id'] }}"
             class="flex flex-col items-start justify-between max-w-xl pb-8 mb-4 overflow-x-auto border-b">
             <div class="relative group">
                 {!! $comment->body !!}
             </div>
             <div class="flex items-center mt-4 text-xs gap-x-4">
                 <time datetime="{{ $comment->created_at }}" class="text-gray-500">
                     {{-- {{ $comment->created_at }} --}}
                 </time>
                 <a target="_blank" rel="noreferrer" href="{{ $comment->html_url }}"
                     class="relative z-10 text-xs rounded-md bg-gray-50 py-0.5 px-2 font-medium text-gray-600 hover:bg-gray-100">
                     View on GitHub
                 </a>
             </div>
             <div class="relative flex items-center mt-8 gap-x-4">
                 <img src="{{ $comment->user['avatar_url'] }}" alt="User avatar"
                     class="w-10 h-10 rounded-full bg-gray-50" />
                 <div class="text-sm leading-6">
                     <p class="mt-0 font-semibold">
                         <a target="_blank" rel="noreferrer" href="{{ $comment->user['html_url'] }}">
                             <span class="absolute inset-0"></span>
                             {{ $comment->user['login'] }}
                         </a>
                     </p>
                 </div>
             </div>
         </div>
     @endforeach
 </div>
