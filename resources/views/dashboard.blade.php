@php
    $courses = App\Models\Course::limit(6)->get();
@endphp

<x-app-layout class="min-h-screen">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 pb-2">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-bold mb-4 text-gray-800">Welcome to Our Online Courses Platform</h1>
                        <div>
                            <a href="/courses/create" class="bg-indigo-500/20 hover:bg-indigo-600/20  text-indigo-600 font-bold py-2 px-4 rounded">Create new</a>
                            <a href="/courses" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">See all courses</a>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm ">Discover a wide range of online courses to enhance your skills
                        and knowledge.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($courses as $course)
                        <a href="{{ route('courses.show', $course->id) }}"
                            class="block bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <img src="{{ Storage::url($course->file) }}" alt=""
                                    class="rounded w-full h-52 object-cover">
                                <h2 class="text-lg font-bold mb-2 line-clamp-1 text-gray-800">{{ $course->title }}</h2>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
