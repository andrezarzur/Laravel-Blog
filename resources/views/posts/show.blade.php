<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6">
            <article class="mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center mb-10">
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
                    </div>
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-end mb-6">

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>

                <section class="col-span-12 mt-10 mt-6">
                    <header class="ml-1">
                        <h1 class="text-3xl">
                            Discussion ({{ $post->comments->count() }})
                        </h1>
                    </header>
                    @auth
                            <form action="/posts/{{ $post->slug }}/comments" method="POST">
                                @csrf
        
        
                                <div class="mt-4">
                                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" rows="6"
                                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                            placeholder="Write a comment..." required></textarea>
                                    </div>
                                    @error('body')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="flex justify-end mt-4">
                                    <x-primary-button>POST</x-primary-button>
                                </div>
        
                            </form>
                    @else
                        
                    @endauth
                    @foreach($post->comments as $comment)
                        @if($loop->first)
                            <x-post-comment :comment="$comment"/>
                        @else
                            <x-post-comment class="border-t" :comment="$comment"/>
                        @endif
                    @endforeach
                </section>
            </article>
        </main>
    </section>
    
</x-layout>

