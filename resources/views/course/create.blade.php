<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new course') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="text-center">
            <h2 class="font-semibold text-2xl text-white leading-tight">
        {{__('messages.Creating new Course')}}<br><br>
            </h2>
    </div>
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
                                <label for="name">{{ __('messages.Title') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" />
                            </div><br>
                            <div>
                                @error('category')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="category">{{ __('messages.Category') }}</label>
                                <select name="category" id="category">
                                    <option value="">{{ __('messages.Pick a category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div>
                                @error('lecturer_id')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="lecturer_id">{{ __('messages.Lecturer') }}</label>
<select name="lecturer_id" id="lecturer_id">
    <option value="">{{ __('messages.Pick a lecturer') }}</option>
    @foreach ($lecturers as $lecturer)
        <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
            {{ $lecturer->name }}
        </option>
    @endforeach
</select>

                            </div>
                            <br>
                            <div>
                                @error('description')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="description">{{ __('messages.Description') }}</label>
                                <input id="description" name="description" type="text" value="{{ old('description') }}" />
                            </div>
                            <br>
                            <x-primary-button type="submit">{{ __('messages.Save') }}</x-primary-button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
