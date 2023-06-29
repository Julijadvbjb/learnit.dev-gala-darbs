<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of courses') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="container">
            <div class="py-12 flex flex-row-reverse">
                <div class="w-5/6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="grid grid-cols-2 gap-4">
                            @if ($courses->isEmpty())
                                <p class="text-center">{{__('messages.No courses found')}}</p>
                            @else
                                @foreach ($courses as $course)
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                                        <div class="p-6 text-gray-900">
                                            <h3 class="font-semibold text-lg">{{ $course->name }}</h3>
                                            
                                            <!-- Add this block to show the success message for the enrolled course -->
                                            @if (session('enrolledCourseId') == $course->id)
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            
                                            <p><strong>{{__('messages.Category')}}:</strong> {{ $course->category->name }}</p>
                                            <p><strong>{{__('messages.Lecturer')}}: </strong> {{ optional($course->lecturer)->name }}</p>
                                            
                                            <div class="mt-4 flex justify-end">
                                                @auth
                                                    @if (!auth()->user()->enrolledCourses->contains($course))
                                                        <form action="{{ route('course.enroll', ['course' => $course->id]) }}" method="POST" class="ml-2">
                                                            @csrf
                                                            <button type="submit">
                                                                <x-primary-button>{{__('messages.Enroll')}}</x-primary-button>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endauth
                                                <a href="{{ route('course.show', ['course' => $course]) }}" class="ml-2">
                                                    <x-primary-button>{{__('messages.Show')}}</x-primary-button>
                                                </a>

                                                @can('is-admin')
                                                <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST" class="ml-2">
    @csrf
    @method('DELETE')
    <button type="submit">
        <x-primary-button>{{__('messages.Delete')}}</x-primary-button>
    </button>
</form>

                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        @can('is-admin')
                            <div class="p-6 text-gray-900">
                                <a href="{{ route('course.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{__('messages.Create new course')}}</a>
                            </div>
                        @endcan
                    </div>
                </div>

                <div class="w-1/6 pr-6">
                    <div class="mb-4">
                        <form action="{{ route('course.index') }}" method="GET" class="form-inline">
                            @foreach($categories as $category)
                                <div class="mb-1 form-check mr-2 text-white">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category-{{ $category->id }}" name="categories[]" @if(in_array($category->id, $selectedCategories)) checked @endif>
                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                            <br>
                            <button type="submit" class="text-white btn btn-primary ml-auto">{{__('messages.Filter')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
