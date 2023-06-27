<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of lecturers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($lecturers as $lecturer)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $lecturer->name }}</h3>
                        <p><strong>{{ __('messages.Education')}}</strong> {{ $lecturer->education }}</p>
                        <p><strong>{{ __('messages.Description')}}</strong> {{ $lecturer->description }}</p>
                        <p><strong>{{ __('messages.Courses Taught')}}</strong></p>
                        <ul>
                            @forelse($lecturer->courses as $course)
                                <li>{{ $course->name }}</li>
                            @empty
                                <li>{{ __('messages.No courses at the moment')}}</li>
                            @endforelse
                        </ul>
                        @can('is-admin')
                            <div class="mt-4">
                                @can('is-admin')
                                    <form action="{{ route('lecturer.destroy', $lecturer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this lecturer?')">{{ __('messages.Delete')}}</button>
                                    </form>
                                @endcan
                            </div>
                        @endcan
                    </div>
                </div>
            @endforeach
            @can('is-admin')
                <div class="p-6 text-white">
                <a href="{{ route('lecturer.create') }}">
    <x-primary-button>{{ __('messages.Add new lecturer') }}</x-primary-button>
</a>

                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
