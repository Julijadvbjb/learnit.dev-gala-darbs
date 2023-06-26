<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{$course->name}} {{ __('Creating new Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('course.mycourse', ['id' => $course->id]) }}" class="text-white">Back</a>
            <h2 class="mb-4 font-bold text-white" >{{$course->name}}: create new assignment</h2><br>

            <form action="{{ route('assignments.store', ['course' => $course]) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <div class="mb-4">
                    <label for="title" class="text-bold">Title</label>
                    <input type="text" id="title" name="title" class="form-input w-full">
                </div>

                <div class="mb-4">
                    <label for="task" class="text-bold">Task</label>
                    <textarea id="task" name="task" class="form-input w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label for="duedate" class="text-bold">Due Date</label>
                    <input type="date" id="duedate" name="duedate" class="form-input w-full">
                </div>

                <div class="mb-4">
    <label for="file_path" class="text-bold">Assignment File</label>
    <input type="file" id="file_path" name="assignment_file" class="form-input w-full">
</div>


   
    <button type="submit">Save</button>

            </form>
        </div>
    </div>
</x-app-layout>
