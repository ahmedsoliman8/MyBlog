<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
      //  dd( $this->validatePost());
        $attributes = $this->validatePost();

        $attributes = array_merge($this->validatePost(), [
            'user_id' => \request()->user()->id
        ]);
        if ($attributes['thumbnail']) {
            $file = \request()->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnails';
            $file->move($destinationPath, $fileName);
            $attributes['thumbnail'] = $fileName;
        }
        Post::create($attributes);
        return redirect('/');
    }

    public function edit(Post $post)
    {

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
        if ($attributes['thumbnail'] ?? false) {
            $file = \request()->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnails';
            $file->move($destinationPath, $fileName);
            $attributes['thumbnail'] = $fileName;
        }
        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
           // 'published_at' => 'required'
        ]);
    }

}
