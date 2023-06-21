<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="p-6 text-gray-900">

                    
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500"
                        <tr>
                            <th scope="col" class="px-6 py-4">Course name</th>
                            <th scope="col" class="px-6 py-4">Category</th>
                            <th scope="col" class="px-6 py-4">Lecturer</th>
                            <th scope="col" class="px-6 py-4">Duration</th>
                        </tr>
                        </thead>

                        @foreach ($courses as $course)
                            <tr  class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $course->name }}</td>
                                <td lass="whitespace-nowrap px-6 py-4">{{ $course->category->name }}</td>
                                <td lass="whitespace-nowrap px-6 py-4">{{ $course->lecturer }}</td>
                                <td lass="whitespace-nowrap px-6 py-4">{{ $course->duration }}</td>
                                
                                <td lass="whitespace-nowrap px-6 py-4">
                                
                                <a href="{{ route('course.show', ['id' => $course->id]) }}">Show </a>
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit">Delete</button>
                                    </form>
                                
                                </td>
                            </tr>
                        @endforeach
                    </table>
                 <h3><a href="{{ route('course.create') }}">Create new course</a></h3>            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>