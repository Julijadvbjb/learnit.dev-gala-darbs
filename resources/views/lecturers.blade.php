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
                        <p><strong>Education:</strong> {{ $lecturer->education }}</p>
                        <p><strong>Description:</strong> {{ $lecturer->description }}</p>
                        <p><strong>Courses Taught:</strong></p>
                        <ul>
                            @foreach($lecturer->courses as $course)
                                <li>{{ $course->name }}</li>
                            @endforeach
                        </ul>
                        @can('is-admin')
                        <div class="mt-4">
                            @can('is-admin')
                            <form action="{{ route('lecturer.destroy', $lecturer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4">Delete</button>
                            </form>
                            @endcan
                        </div>
                        @endcan
                    </div>
                </div>
            @endforeach
            @can('is-admin')
            <div class="p-6 text-white">
    <p><a href="{{ route('lecturer.create') }}">Add new lecturer</a></p>
</div>
@endcan

        </div>
    </div>
</x-app-layout>
