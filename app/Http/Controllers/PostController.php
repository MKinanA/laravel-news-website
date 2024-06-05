<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(): View {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    public function create(): View {
        return view('post.create');
    }

    public function store(Request $request): RedirectResponse {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:256',
            'description' => 'required|string|max:512',
            'content' => 'required|string'
        ]);
     
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/post', $imageName);

        Post::create([
            'image' => 'post/' . $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);

        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(string $id): View {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, string $id): RedirectResponse {
        $post = Post::findOrFail($id);
        
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'title' => 'required|string|max:256',
            'description' => 'required|string|max:512',
            'content' => 'required|string'
        ]);
   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/post', $imageName);
   
            Storage::delete('public/post/' . $post->image);
   
            $post->update([
                'image' => 'post/' . $imageName,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content
            ]);
        }
   
        return redirect()->route('post.show', $id);
    }

    public function destroy(string $id): RedirectResponse {
        $post = Post::findOrFail($id);

        Storage::delete('public/post/'. $post->image);

        $post->delete();

        return redirect()->route('post.index');
    }
}
