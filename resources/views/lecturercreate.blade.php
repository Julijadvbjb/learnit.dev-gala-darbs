<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adding new lecturer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('lecturers.index') }}">  {{__('messages.Back') }} </a><br>
                    <div class="font-bold ">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{__('messages.Adding new lecturer') }} 
                    </h2>
                </div><br>
                   <form method="POST" action="{{ route('lecturer.store') }}">
    @csrf
    @error('name')
        <div class="alert">{{ $message }}</div>
    @enderror
    <label for="name">{{ __('messages.Name')}}</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required><br>
    @error('education')
        <div class="alert">{{ $message }}</div>
    @enderror
    <label for="education">{{ __('messages.Education')}}</label><br>
    <input type="text" name="education" id="education"  value="{{ old('education') }}"required><br>
    @error('description')
        <div class="alert">{{ $message }}</div>
    @enderror
    <label for="description">{{ __('messages.Description')}}</label><br>
    <input type="text" name="description" id="description" value="{{ old('description') }}" required><br><br>
    <x-primary-button type="submit">{{ __('messages.Save')}}</x-primary-button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
