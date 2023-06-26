<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Assignments') }}
        </h2>
    </x-slot>
</form>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($assignments as $assignment)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ $assignment->title }}</h3>
                        <p><strong>Course:</strong> {{ $assignment->course->name }}</p>
                        <p><strong>Task:</strong> {{ $assignment->task }}</p>
                        <p><strong>Deadline:</strong> {{ $assignment->duedate }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</x-app-layout>
