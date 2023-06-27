<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of courses') }}
        </h2>
    </x-slot>
    <div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Add this above your course list -->
            <div class="mb-4">
                <form action="{{ route('course.index') }}" method="GET" class="form-inline">
                    @foreach($categories as $category)
                        <div class="form-check mr-2">
                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category-{{ $category->id }}" name="categories[]" @if(in_array($category->id, $selectedCategories)) checked @endif>
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary ml-auto">{{__('messages.Filter')}}</button>
                </form>
            </div>

            @if ($courses->isEmpty())
                <p class="text-center">{{__('messages.No courses found')}}</p>
            @else

            @foreach ($courses as $course)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $course->name }}</h3>
                        <p><strong>{{__('messages.Category')}}:</strong> {{ $course->category->name }}</p>
                        <p><strong>{{__('messages.Lecturer')}}: </strong> {{ optional($course->lecturer)->name }}</p>

                        <div class="mt-4">
                            <a href="{{ route('course.show', ['course' => $course]) }}">{{__('messages.Show')}}</a>
                            @can('is-admin')
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4">{{__('messages.Delete')}}</button>
                                </form>
                            @endcan
        

                            @auth
    @if (!auth()->user()->enrolledCourses->contains($course))
        <form action="{{ route('course.enroll', ['course' => $course->id]) }}" method="POST">
            @csrf
            <button type="submit" class="ml-4">{{__('messages.Enroll')}}</button>
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
            @endif
            @can('is-admin')
            <div class="p-6 text-gray-900">
                <a href="{{ route('course.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{__('messages.Create new course')}} </a>
            </div>
            @endcan
        </div>
    </div>
   
    </div>
</x-app-layout>
