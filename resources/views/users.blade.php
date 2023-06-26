<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Registered Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @foreach ($users as $user)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $user->name }}</h3>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Registered At:</strong> {{ $user->created_at->format('d-m-Y H:i:s') }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
