<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users / Edit
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf

                        <div class="">

                            <label for="name" class="text-sm font-medium">Name</label>
                            <div class="mb-3">
                                <input type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="User Name" id="name" value="{{ old('name',$user->name) }}" />
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="email" class="text-sm font-medium">Email</label>
                            <div class="mb-3">
                                <input type="text" name="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="User Email" id="email" value="{{ old('email',$user->email) }}" />
                                @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">

                                @if($roles->isNotEmpty())
                                    @foreach($roles as $key => $role)
                                    <div class="mt-3">

                                        <input {{ ($hasRoles->contains($role->id)) ? 'checked' : '' }} type="checkbox" class="rounded" name="role[]" value="{{ $role->name }}" id="role-{{ $role->id }}" />
                                        <label for="role-{{ $role->id }}" class="text-sm font-medium">{{ $role->name }}</label>

                                    </div>
                                    @endforeach
                                @endif

                            </div>

                            <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-500 transition">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
