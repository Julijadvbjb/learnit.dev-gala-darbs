<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('course.store', $course) }}">
                        @csrf

                        <fieldset>
                            <div>
                                @error('name')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" />
                            </div>
                            <div>
                                @error('category')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="category">Category</label>
                                <select name="category" id="category">
                                    <option value="">Pick a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                @error('lecturer')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="lecturer_id">Lecturer</label>
<select name="lecturer_id" id="lecturer_id">
    <option value="">Pick a lecturer</option>
    @foreach ($lecturers as $lecturer)
        <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
            {{ $lecturer->name }}
        </option>
    @endforeach
</select>

                            </div>
                            <div>
                                @error('description')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="description">Description</label>
                                <input id="description" name="description" type="text" value="{{ old('description') }}" />
                            </div>

                            <button type="submit">Save</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
