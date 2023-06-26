<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Displaying the course assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('course.mycourse', ['id' => $course->id]) }}" class="text-white">Back to Course</a>

        <h2 class="mb-4 font-bold text-white" >{{$course->name}} :Current assignments</h2><br>
        
        @if ($assignments->count() > 0)
            @foreach ($assignments as $assignment)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="pt-2 pb-1 text-bold">Title</h3>
                        <p>{{ $assignment->title }}</p>
                        <h3 class="pt-2 pb-1 text-bold">Task</h3>
                        <p>{{ $assignment->task }}</p>
                        <h3 class="pt-2 pb-1 text-bold">Duedate</h3>
                        <p>{{ $assignment->duedate }}</p>
                        @if ($assignment->file_path)
                            <h3 class="pt-2 pb-1 text-bold">Assignment File</h3>
                            <a href="{{ route('assignments.download', $assignment->id) }}">Download Assignment File</a>
                        @endif

                        <div class="mt-4">
                        
                            <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No assignments at the moment</p>
        @endif
            
        <a href="{{ route('assignments.create', ['course' => $course]) }}" class="text-white">Add a new assignment</a>
        
    </div>
</div>
</x-app-layout>
