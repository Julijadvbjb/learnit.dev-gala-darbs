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


    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white opacity-90 shadow-xl sm:rounded-lg flex p-6">
                <div class="w-1/2 text-gray-900 pr-4">
                    <h2 class="text-3xl font-bold mb-4 text-blue-900">{{ __('messages.Learn-It Platform') }}</h2>
                    <p class="mb-4 text-lg text-gray-700">{{ __('messages.Learn-It is a') }}</p>
                    <p class="mb-4 text-lg text-gray-700">{{ __('messages.youre a student') }}</p>

                    <!-- Cards -->
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="bg-blue-100 p-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-500 ease-in-out text-blue-900">
                            <h3 class="font-semibold text-lg mb-2">{{ __('messages.Info') }}</h3>
                            <p>{{ __('messages.With') }}</p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-500 ease-in-out text-blue-900">
                            <h3 class="font-semibold text-lg mb-2">{{ __('messages.Assignments') }}</h3>
                            <p>{{ __('messages.Do assignments') }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-1/2">
                    <img src="https://cdn4.iconfinder.com/data/icons/popicon-business-bluetone-part-4/256/14-512.png" alt="Platform Photo" class="w-full h-auto rounded shadow">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
