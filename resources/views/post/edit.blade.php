<!DOCTYPE html>
<html class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
</head>
<body class="font-sans antialiased dark:bg-gray-900">


    <div class="container mx-auto p-8">
        <form action="{{ route('post.update' , $post->id)}}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
            @csrf
            @method('put')
            <div>
                <label for="image" class="block text-gray-700 dark:text-white">Image</label>
                <input type="file" id="image" name="image" class="block w-full mt-1 dark:text-white" >


            <div>
                <label for="title" class="block text-gray-700 dark:text-white">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="block w-full mt-1" >
            </div>


            <div>
                <label for="description" class="block text-gray-700 dark:text-white">Description</label>
                <textarea id="description" name="description"  class="block w-full mt-1">{{ $post->description }}</textarea>
            </div>


            <div>
                <label for="content" class="block text-gray-700 dark:text-white">Content</label>
                <textarea id="content" name="content"  class="block w-full mt-1">{{ $post->content }}</textarea>
            </div>


            <div>
                <button type="submit" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </div>
        </form>
    </div>


</body>
</html>