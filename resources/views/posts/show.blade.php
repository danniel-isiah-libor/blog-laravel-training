<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (auth()->user()->id === $post->user_id)
                <a href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    Update
                </a>
            @endif

            <br>

            <a href="{{ route('posts.delete', ['post' => $post->id]) }}">
                Delete
            </a>

            <h1>Title: {{ $post->title }}</h1>

            <br>

            <h2>Body:</h2>
            <p>
                {{ $post->body }}
            </p>
            <i>{{ $post->updated_at->format('M d, Y') }}</i>

            <br>

            <h2>Author:</h2>
            <p>
                {{ $post->user->name }}
            </p>

            <p>
                {{ $post->user->email }}
            </p>

            <form action="{{ route('comments.store') }}" method="post">
                @csrf

                <input type="hidden" value="{{ $post->id }}" name="post_id">

                <input type="text" name="comment">

                <button type="submit">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>
