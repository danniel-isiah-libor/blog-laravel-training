<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        </div>
    </div>
</x-app-layout>
