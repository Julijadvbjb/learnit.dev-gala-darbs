<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Displaying the course assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('course.show', ['id' => $course->id]) }}">Back</a>
                    <h2 class="mb-4 font-bold">Current assignments</h2>
                    @if ($assignments->count() > 0)
                        @foreach ($assignments as $assignment)
                        <h3 class="pt-2 pb-1 text-bold">Title</h3>
                            <p>{{ $assignment->title }}</p>
                            <h3 class="pt-2 pb-1 text-bold">Task</h3>
                            <p>{{ $assignment->task }}</p>
                            <h3 class="pt-2 pb-1 text-bold">Duedate</h3>
                            <p>{{ $assignment->duedate }}</p>
                            <h2 class="mb-4 font-bold">Feedback</h2>
                            @if ($assignment->feedback)
                                <h3 class="pt-2 pb-1 text-bold">Grade</h3>
                                <p>{{ $assignment->feedback->grade }}</p>
                                <h3 class="pt-2 pb-1 text-bold">Comments</h3>
                                <p>{{ $assignment->feedback->comment }}</p>
                            @else
                                <p>No feedback available.</p>
                            @endif
                        @endforeach
                    @else
                        <p>No assignments at the moment</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
