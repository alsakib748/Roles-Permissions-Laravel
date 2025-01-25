<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users / Create
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="">

                            <label for="name" class="text-sm font-medium">Name</label>
                            <div class="mb-3">
                                <input type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="User Name" id="name" value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="email" class="text-sm font-medium">Email</label>
                            <div class="mb-3">
                                <input type="text" name="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="User Email" id="email" value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="password" class="text-sm font-medium">Password</label>
                            <div class="mb-3">
                                <input type="password" name="password" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="User Password" id="password" value="{{ old('password') }}" />
                                @error('password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="email" class="text-sm font-medium">Confirm Password</label>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Confirm Password" id="confirm_password" value="{{ old('confirm_password') }}" />
                                @error('confirm_password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">

                                @if($roles->isNotEmpty())
                                    @foreach($roles as $key => $role)
                                    <div class="mt-3">

                                        <input type="checkbox" class="rounded" name="role[]" value="{{ $role->name }}" id="role-{{ $role->id }}" />
                                        <label for="role-{{ $role->id }}" class="text-sm font-medium">{{ $role->name }}</label>

                                    </div>
                                    @endforeach
                                @endif

                            </div>

                            <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-500 transition">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
