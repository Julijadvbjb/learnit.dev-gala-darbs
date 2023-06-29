<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Displaying the course assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="text-center">
    <h2 class="font-semibold text-2xl text-white leading-tight mb-6">
         {{$course->name}} :{{__('messages.Current assignments') }}
    </h2>
    </div> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        <a class="mb-4  text-white hover:font-bold" href="{{ route('course.mycourse', ['course' => $course->id]) }}"> {{__('messages.Back to Course') }}</a>
        @if ($assignments->count() > 0)
            @foreach ($assignments as $assignment)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="pt-2 pb-1 text-bold">{{__('messages.Title') }}</h3>
                        <p>{{ $assignment->title }}</p>
                        <h3 class="pt-2 pb-1 text-bold">{{__('messages.Task') }}</h3>
                        <p>{{ $assignment->task }}</p>
                        @if ($assignment->file_path)
                            <h3 class="pt-2 pb-1 text-bold">{{__('messages.Assignment File') }}</h3>
                            <a href="{{ route('assignments.download', $assignment->id) }}">{{__('messages.Download Assignment File') }}</a>
                        @endif

                        <div class="mt-4">
                        
                            <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-primary-button type="submit">{{__('messages.Delete') }}</x-primary-button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <p>{{__('messages.No assignments at the moment') }}</p>
                </div>
            </div>
        @endif 
        <x-primary-button>
        <a href="{{ route('assignments.create', ['course' => $course]) }}" class="text-grey-700">{{__('messages.Add a new assignment') }}</a>
        </x-primary-button>
    </div></div>
</div>
</x-app-layout>
