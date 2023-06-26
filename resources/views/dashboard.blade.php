<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Learn-It') }}
        </h2>
    </x-slot>

    <div class="bg-gray-800 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white text-center mb-4">Unlock Your Learning Potential</h1>
            <p class="text-lg text-gray-300 text-center">Expand your knowledge with our wide range of courses.</p>
            <div class="flex justify-center mt-8">
                <a href="{{ route('course.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded">Explore Courses</a>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Learn-It Platform</h2>
                    <p class="mb-4">Learn-It is a comprehensive learning platform designed to help you acquire new skills and enhance your knowledge. With a wide range of courses and experienced instructors, we provide a dynamic and engaging learning experience for learners of all levels.</p>
                    <img src="C:\Users\julij\Documents\tīmekļu gala darbs\attels.jpg" alt="Platform Photo" class="mb-4">
                    <p class="mb-4">Whether you're a student, professional, or lifelong learner, Learn-It offers courses in various disciplines, including technology, business, arts, and more. Our platform combines interactive lessons, practical exercises, and collaborative projects to ensure a well-rounded learning journey.</p>
                    <div class="flex justify-center">
                        <a href="{{ route('course.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded mr-4">All Courses</a>
                        <a href="{{ route('lecturers.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded">All Lecturers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

