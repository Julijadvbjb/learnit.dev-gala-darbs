<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Creating new Assignment for') }} {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="text-center">
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ __('messages.Creating new assignment') }} {{ $course->name }}<br><br>
            </h2>
    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('assignments.store', ['course' => $course]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <fieldset>
                            <div>
                                @error('title')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="title">{{ __('messages.Title') }}</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}">
                            </div>
<br>
                            <div>
                                @error('task')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="task">{{ __('messages.Task') }}</label>
                                <input type="text" id="task" name="task" value="{{ old('task') }}">
                            </div>
<br>

                            <div>
                                @error('file_path')
                                <div class="alert">{{ $message }}</div>
                                @enderror
                                <label for="file_path">{{ __('messages.Assignment File') }}</label><br>
                                <input type="file" id="file_path" name="assignment_file">
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
