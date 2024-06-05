<!DOCTYPE html>
<html class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">


    <div class="container mx-auto py-12">
        <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 dark:bg-gray-800">
            <div class="overflow-hidden rounded-t-lg">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full">
            </div>
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 dark:text-white">{{ $post->title }}</h1>
                <p class="text-gray-700 mb-6 dark:text-gray-400">{{ $post->description }}</p>
                <div class="prose max-w-none dark:text-white">
                    {!! $post->content !!}
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="mr-1 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-sm hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 mt-2">
                        Edit
                        <svg class="w-3.5 h-3.5 ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path></svg>
                    </a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline-block mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="ml-1 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-sm hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Delete
                            <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 16 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M2 2l12 12M2 14l12-12" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.1/dist/flowbite.min.js"></script>
</body>
</html>