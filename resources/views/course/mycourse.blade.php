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
                    <a href="{{ route('mycourses.show') }}">{{ __('messages.Back') }}</a>
                    <h2 class="mb-4 font-bold">{{ __('messages.Details') }}</h2>
                    <h3 class="pt-2 pb-1 text-bold">{{ __('messages.Title') }}</h3>
                    <p>{{ $course->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">{{ __('messages.Category') }}</h3>
                    <p>{{ $course->category->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">{{ __('messages.Lecturer') }}</h3>
                    <p>{{ $course->lecturer->name }}</p>
                    <h3 class="pt-2 pb-1 text-bold">{{ __('messages.Description') }}</h3>
                    <p>{{ $course->description }}</p><br>
                    <a href="{{ route('assignments.index', ['course' => $course->id]) }}">{{ __('messages.Assignments') }}</a>
 @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

            <form action="{{ route('courses.leave', ['course' => $course]) }}" method="POST">
             @csrf
             <button type="submit" class="btn btn-danger">{{ __('messages.Leave Course') }}</button>
            </form>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
