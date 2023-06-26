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
                    <a href="{{ route('lecturers.index') }}">Back</a><br><br>
                   {{ __('Adding new lecturer ') }} 
                   <form method="POST" action="{{ route('lecturer.store') }}">
    @csrf
    <!-- rest of your form fields -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <label for="name">Name</label><br>
    <input type="text" name="name" id="name" required><br>
    <label for="education">Education</label><br>
    <textarea name="education" id="education" required></textarea><br>
    <label for="description">Description</label><br>
    <input type="text" name="description" id="description" required><br>
    <button type="submit">Save</button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
