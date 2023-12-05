<x-app-layout class="min-h-screen">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <img src="{{Storage::url($course->file)}}" alt="" class="w-full max-h-[500px] object-contain ">
                    <h1 class="text-2xl font-bold mb-4">{{ $course->title }}</h1>
                    <p class="text-gray-500 text-sm mb-4">{{ $course->description }}</p>
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                            <i class="fa-solid fa-pen-to-square text-lg mr-2"></i> Edit
                        </a>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 flex items-center">
                                <i class="fa-solid fa-trash text-lg mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>