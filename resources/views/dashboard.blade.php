<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="p-6 text-white">
<p>Home page with info.............</p>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="p-6 text-gray-900">
                    <ul>
                      
                    <li><a href="{{ route('course.index') }}">List of all courses</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>