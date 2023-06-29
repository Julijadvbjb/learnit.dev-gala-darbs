<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                {{ __('Course: ' . $course->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
    <div class="text-center">
            <h2 class="mb-8 font-semibold text-3xl text-white leading-tight">
                {{ __('Course: ' . $course->name) }}
            </h2>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex flex-wrap justify-center">
                        @foreach($course->files as $file)
                            <div class="w-full sm:w-1/2 mb-4 px-2">
                                <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                                    <div class="p-6">
                                        <h2 class="title-font text-lg font-medium text-center">{{ $file->name }}</h2>
                                        <div class="flex justify-center mt-3">
                                            <a href="{{ route('files.download', ['id' => $file->id]) }}" class="mr-2 text-indigo-500 inline-flex items-center">{{ __('messages.Download') }}</a>
                                            @can('is-admin')
                                            <form action="{{ route('files.delete', ['id' => $file->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger inline-flex items-center">{{ __('messages.Delete') }}</button>
                                                @endcan

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                   
                    <div class="mt-8 text-center">
                         @can('is-admin')
                        <form action="{{ route('files.upload', ['course' => $course->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" />
                            <x-primary-button class="mb-4 " type="submit">{{ __('messages.Upload') }}</x-primary-button>
                        </form>
                        @endcan
                    </div>
                    <a href="{{ route('assignments.index', ['course' => $course->id]) }}"><x-primary-button>{{ __('messages.Assignments') }}</a></x-primary-button>
                    @if (session('success'))
                    <div class="alert alert-success">
                         {{ session('success') }}
                    </div>
                    @endif
                    <div class="mt-6">
                        <form action="{{ route('courses.leave', ['course' => $course]) }}" method="POST">
                            @csrf
                            <x-primary-button type="submit" class="btn btn-danger">{{ __('messages.Leave Course') }}</x-primary-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
