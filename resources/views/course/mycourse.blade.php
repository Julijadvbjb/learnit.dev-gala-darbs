<x-app-layout>
@php
    $assignment = $assignment ?? null;
@endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Displaying the course ' . $course->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('course.index') }}">Back</a>
                    <h2 class="mb-4 font-bold">Details</h2>
                    <h3 class="pt-2 pb-1 text-bold">Name</h3>
                    <p>{{ $course->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">Category</h3>
                    <p>{{ $course->category->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">Lecturer</h3>
                    <p>{{ $course->lecturer->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">Description</h3>
                    <p>{{ $course->description }}</p><br>
                    @can('is-admin')
                    <a href="{{ route('course.edit', ['id' => $course->id]) }}">Edit</a>
                   @endcan
                    <a href="{{ route('assignments.index', ['id' => $course->id]) }}"> Assignments</a>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
