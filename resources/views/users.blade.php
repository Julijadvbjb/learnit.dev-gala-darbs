<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Registered Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="text-center">
    <h2 class="font-semibold text-2xl text-white leading-tight mb-6">
    {{ __('messages.All Registered Users') }}
    </h2>
    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($users as $user)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $user->name }}</h3>
                        <p><strong>{{ __('messages.Email')}}</strong> {{ $user->email }}</p>
                        <p><strong>{{ __('messages.Registered At')}}</strong> {{ $user->created_at->format('d-m-Y H:i:s') }}</p>
                        
                        <!-- Delete User Button -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="mt-3">{{ __('messages.Delete User') }}</x-primary-button>
                        </form> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
