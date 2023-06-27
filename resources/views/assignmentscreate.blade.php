<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ $course->name }} {{ __('Creating new Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('course.mycourse', ['course' => $course->id]) }}" class="text-white">Back</a>
            <h2 class="mb-4 font-bold text-white">{{ $course->name }}: {{ __('messages.create new assignment') }}</h2><br>

            <form action="{{ route('assignments.store', ['course' => $course]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="mb-4 text-black">
                    @error('title')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <label for="title" class="text-black">{{ __('messages.Title') }}</label>
                    <input type="text" id="title" name="title" class="form-input w-full" value="{{ old('title') }}">
                </div>

                <div class="mb-4 text-black">
                    @error('task')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <label for="task" class="text-black">{{ __('messages.Task') }}</label>
                    <textarea id="task" name="task" class="form-input w-full">{{ old('task') }}</textarea>
                </div>

                <div class="mb-4 text-black">
                    @error('duedate')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <label for="duedate" class="text-black">{{ __('messages.DueDate') }}</label>
                    <input type="date" id="duedate" name="duedate" class="form-input w-full" value="{{ old('duedate') }}">
                </div>

                <div class="mb-4 text-white">
                    @error('file_path')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <label for="file_path" class="text-bold">{{ __('messagesAssignment File.') }}</label>
                    <input type="file" id="file_path" name="assignment_file" class="form-input w-full">
                </div>

                <button type="submit">{{ __('messages.Save') }}</button>

            </form>
        </div>
    </div>
</x-app-layout>
