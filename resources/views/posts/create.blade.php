<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-forms.posts>
            <form class="space-y-6" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="avatar">

                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="text" required value="{{ old('title') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                        <span class="text-sm text-red-900">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                    </div>
                    <div class="mt-2">
                        <textarea id="body" name="body" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                        <span class="text-sm text-red-900">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save
                    </button>
                </div>
            </form>
        </x-forms.posts>
    </div>
</x-app-layout>
