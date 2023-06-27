<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Welcome to Learn-It') }}
        </h2>
    </x-slot>

    <div class="relative py-20">
    <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('https://www.jibunu.com/wp-content/uploads/2018/02/Demos-1024x433.png');">
        <span class="bg-gray-200 opacity-75 absolute inset-0"></span>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <h1 class="text-4xl font-bold text-gray-700 text-center mb-4">{{ __('messages.Unlock Your Learning Potential') }}</h1>
        <p class="text-2xl font-bold text-gray-700 text-center">{{ __('messages.Expand your knowledge') }}</p>
        <div class="flex justify-center mt-8">
            <a href="{{ route('course.index') }}" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-3 px-6 rounded">{{ __('messages.Explore Courses') }}</a>
        </div>
    </div>
</div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">{{ __('messages.Learn-It Platform') }}</h2>
                    <p class="mb-4">{{ __('messages.Learn-It is a') }}</p>
                    <img src="C:\Users\julij\Documents\tīmekļu gala darbs\attels.jpg" alt="Platform Photo" class="mb-4">
                    <p class="mb-4">{{ __('messages.youre a student') }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

