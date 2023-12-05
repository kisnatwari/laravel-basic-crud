<x-app-layout class="min-h-screen">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Create new Course</h1>
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Success</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="/courses" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" id="title" name="title"
                                class="mt-1 p-2 block w-full rounded-md border-gray-300" />
                        </div>
                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3" class="mt-1 p-2 block w-full rounded-md border-gray-300"></textarea>
                        </div>
                        <div class="mt-4">
                            <label for="file" class="block font-medium text-sm text-gray-700">File</label>
                            <input type="file" id="file" name="file" class="mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
