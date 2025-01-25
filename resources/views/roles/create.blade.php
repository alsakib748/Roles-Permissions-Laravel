<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles / Creates
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="">
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="mb-3">
                                <input type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name" id="" value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">

                                @if($permissions->isNotEmpty())
                                    @foreach($permissions as $key => $permission)
                                    <div class="mt-3">
                                        <input type="checkbox" class="rounded" name="permission[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" />
                                        <label for="permission-{{ $permission->id }}" class="text-sm font-medium">{{ $permission->name }}</label>
                                    </div>
                                    @endforeach
                                @endif

                            </div>

                            <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
