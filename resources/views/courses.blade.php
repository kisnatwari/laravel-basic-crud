<x-app-layout class="min-h-screen">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($courses as $course)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <img src="{{Storage::url($course -> file)}}" alt="" class="rounded w-full h-52 object-cover">
                        <h2 class="text-lg font-bold mb-2 line-clamp-1 text-gray-800">{{ $course->title }}</h2>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                        <div class="flex gap-1">
                            <a href="{{route('courses.show', $course)}}" class="grow text-white bg-indigo-600 rounded">
                                <button class="w-full h-full bg-transparent">
                                    View
                                </button>
                            </a>
                            <a href="{{ route('courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900 rounded px-2 py-1 bg-indigo-600/20">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 rounded px-2 py-1 bg-red-600/20">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>