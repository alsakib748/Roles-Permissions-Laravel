<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles / Creates
            </h2>
            <a href="{{ route('articles.index') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        <div class="">

                            <label for="title" class="text-lg font-medium">Title</label>
                            <div class="mb-3">
                                <input type="text" name="title" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Title" id="title" value="{{ old('title') }}" />
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="text" class="text-lg font-medium">Content</label>
                            <div class="mb-3">
                                <textarea name="text" id="text" rows="4" class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('text') }}" placeholder="Content"></textarea>
                                @error('text')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="author" class="text-lg font-medium">Author</label>
                            <div class="mb-3">
                                <input type="text" name="author" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Author" id="author" value="{{ old('author') }}" />
                                @error('author')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
