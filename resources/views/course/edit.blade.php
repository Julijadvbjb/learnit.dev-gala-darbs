<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($course) ? __('Editing the course') : __('Creating a new course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ isset($course) ? route('course.update', $course) : route('course.store') }}">
                        @csrf
                        @if (isset($course))
                            @method('PUT')
                        @endif

                        <fieldset>
                            <div>
                                @error('name')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="name">Title</label>
                                <input type="text" name="name" id="name" value="{{ old('name', isset($course) ? $course->name : '') }}" />
                            </div>
                            <div>
                                @error('category_id')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id">
                                    <option value="">Pick a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', isset($course) && $course->category_id == $category->id ? 'selected' : '') }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                @error('lecturer')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="lecturer">Lecturer</label>
                                <input id="lecturer" name="lecturer" type="text" value="{{ old('lecturer', isset($course) ? $course->lecturer : '') }}" />
                            </div>

                            <div>
                                @error('duration')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="duration">Duration</label>
                                <input id="duration" name="duration" type="text" value="{{ old('duration', isset($course) ? $course->duration : '') }}" />
                            </div>

                            <div>
                                @error('description')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="description">Description</label>
                                <input id="description" name="description" type="text" value="{{ old('description', isset($course) ? $course->description : '') }}" />
                            </div>

                            <button type="submit">Save</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>