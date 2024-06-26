<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->user->username }}">
                                {{ $post->user->name }}</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>
            </div>

            <section class="col-span-8 col-start-5 space-y-5 ">
                @auth
                <x-panel heading="Comment Down">
                <form method='POST' action="/posts/{{$post->slug}}/comments" >
                    @csrf
                <header class='flex items-center'>
                        <img src="https://i.pravatar.cc/60?{{auth()->id()}}" alt="" width='60' height='60'>
                        <h2 class='ml-3'>Want to participate?</h2>
                    </header>
                    <textarea class='w-full mt-5 focus:outline-none focus:ring' placeholder='Comment here...' name='body'></textarea>
                    @error('body')
                        <span class='text-xs text-red-500'>{{$message}}</span>
                        @enderror
                    <div class='mt-3'>
                        <button type='submit'class='bg-blue-500 hover:bg-blue-600  rounded-full text-xs font-semibold text-white uppercase py-3 px-8'>Post</button>
                    </div>
                </form>
                </x-panel>
                @else
                <a href='/login' class='hover:underline'>Log In</a> or <a href="/register" class='hover:underline'>Register</a> to leave a comment
                @endauth
                @foreach($post->comments as $comment)
                <x-post-comment :comment=$comment/>
                @endforeach
            </article>
        </section>
    </main>

</x-layout>
