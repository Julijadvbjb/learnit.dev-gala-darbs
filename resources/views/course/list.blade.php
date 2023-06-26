<!-- course.list.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach ($courses as $course)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $course->name }}</h3>
                        <p><strong>Category:</strong> {{ $course->category->name }}</p>
                        <p><strong>Lecturer:</strong> {{ optional($course->lecturer)->name }}</p>

                        <div class="mt-4">
                            <a href="{{ route('course.show', ['course' => $course]) }}">Show</a>
                            @can('is-admin')
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4">Delete</button>
                                </form>
                            @endcan
        

                            @auth
    @if (!auth()->user()->enrolledCourses->contains($course))
        <form action="{{ route('course.enroll', ['course' => $course->id]) }}" method="POST">
            @csrf
            <button type="submit" class="ml-4">Enroll</button>
        </form>
    @else
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @endif
@endauth

                        </div>
                    </div>
                </div>
            @endforeach
            @can('is-admin')
            <div class="p-6 text-gray-900">
                <a href="{{ route('course.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create new course</a>
            </div>
            @endcan
        </div>
    </div>
</x-app-layout>
