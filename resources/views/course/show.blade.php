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
    <div class="text-center">
    <h2 class="font-semibold text-2xl text-white leading-tight mb-6">
    {{ $course->name }}
    </h2>
    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('course.index') }}" class="course-link  hover:font-semibold">{{ __('messages.Back') }}</a>
                    <h2 class="mb-4 font-bold text-xl">{{ __('messages.Details') }}</h2>
                    <h3 class="pt-2 pb-1 font-bold">{{ __('messages.Category') }}</h3>
                    <p>{{ optional($course->category)->name ?? 'No Category' }}</p>
                    <h3 class="pt-2 pb-1 font-bold">Lecturer</h3>
                    <p>{{ optional($course->lecturer)->name ?? 'No Lecturer' }}</p>
                    <h3 class="pt-2 pb-1 font-bold">{{ __('messages.Description') }}</h3>
                    <p>{{ $course->description }}</p><br>
                    @can('is-admin')
                    <a href="{{ route('course.edit', $course) }}"><x-primary-button>{{ __('messages.Edit') }}</x-primary-button></a>
                   @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
