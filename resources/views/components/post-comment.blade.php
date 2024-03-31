@props(['comment'])
<x-panel class='bg-gray-200'>
<article class='flex space-x-3'>
                    <div class='flex-shrink-0 rounded-xl '>
                        <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="" width='60' height='60'>
                    </div>
                    <div>
                        <header>
                            <h3 class='font-bold '>{{$comment->user->username}}</h3>
                        <p class='text-xs'>
                           Posted 
                           <time>{{$comment->created_at->format("F j, Y , g:i a")}}</time>
                        </p>
                        </header>
                        <p>
                          {{$comment->body}}
                    </div>
                </article>
</x-panel>