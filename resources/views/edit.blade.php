<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a new assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{ route('assignments.update', ['id' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
                    {{$assignment->title}}{{ __(': editing a new assignment ') }} <br><br>
                        @csrf
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-4">
<label for="title" class="text-bold">Title</label><br>
<input type="text" name="title" id="title" value="{{ old('title', $assignment->title) }}" required>
</div>
<div class="mb-4">
<label for="task" class="text-bold">Task</label><br>
<textarea name="task" id="task" required>{{ old('task', $assignment->task) }}</textarea><br>
</div>
<div class="mb-4">
<label for="duedate" class="text-bold">Due Date</label><br>
<input type="date" name="duedate" id="duedate" value="{{ old('duedate', $assignment->duedate) }}" required><br>
</div>
<div class="mb-4">
<label for="assignment_file">File</label><br>
@if($assignment->file)
  <p>Previously uploaded file: {{ $assignment->file }}</p>
@endif
<input type="file" name="assignment_file" id="assignment_file" accept=".pdf,.doc,.docx"><br>
</div>
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
