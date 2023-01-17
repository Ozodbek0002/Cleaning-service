<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\UploadBigFile;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
        $this->authorizeResource(Post::class,'post');
    }

    public function index(Request $request)
    {
        if (isset($request->tag_id)) {
            $posts = Post::latest()->paginate(12);
        } elseif (isset($request->category_id)) {
            $posts = Post::where('category_id',$request->category_id)->paginate(12);
            $title = $posts[0]->category->name;
        } else {
            $posts = Post::latest()->paginate(12);
            $title = 'Oxirgi postlar';
        }
        return view('posts.index', [
            'posts' => $posts,
            'title'=>$title,
        ]);
    }


    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }


        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->conten,
            'photo' => $path ?? null,
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }

        PostCreated::dispatch($post); // event


        UploadBigFile::dispatch($request->file('photo')); // job

        return redirect()->route('posts.index');

    }


    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
        ]);
    }


    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        return view('posts.edit', [
            'post' => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        if ($request->hasFile('photo')) {

            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }


        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->conten,
            'photo' => $path ?? $post->photo,
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }


    public function destroy(Post $post)
    {
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }

}
