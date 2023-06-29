<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="text-center">
            <h2 class="font-semibold text-2xl text-white leading-tight mb-6">
                {{ __('messages.Enrolled Courses') }}
            </h2>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <br>
                    <ul>
                        @forelse ($courses as $course)
                            <li>
                                <a href="{{ route('course.mycourse', ['course' => $course->id]) }}" class="course-link  hover:font-semibold">{{ $course->name }}<br><br></a>
                            </li>
                        @empty
                            <p>{{ __('messages.You are not enrolled') }}</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
