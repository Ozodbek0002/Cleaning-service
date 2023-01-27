<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ChangePost;
use App\Jobs\UploadBigFile;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\Postcreated as NotificationPostCreate;
use App\Mail\PostCreated as MailPostCreated;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Post::class, 'post');
    }


    public function index(Request $request)
    {
        if (isset($request->tag_id)) {
            $posts = Post::latest()->paginate(12);
        } elseif (isset($request->category_id)) {
            $posts = Post::where('category_id', $request->category_id)->paginate(12);
            $title = $posts[0]->category->name;
        } else {
//            $posts = Post::latest()->paginate(12);
            $posts = Cache::remember('posts', now()->addSeconds(60), function () {
                return Post::latest()->paginate(12);
            });

            if ($current_locale = app()->getLocale() == 'uz'){
            $title = 'Oxirgi postlar';
            }
            else{
                $title = 'Last posts';
            }
        }
        return view('posts.index', [
            'posts' => $posts,
            'title' => $title,
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


        ChangePost::dispatch($post); // job


        Mail::to($request->user())->send(new MailPostCreated($post));  // mail yuborish


//        Auth::user()->notify(new NotificationPostCreate($post));
        Notification::send(Auth::user(), new NotificationPostCreate($post)); // notification yuborish


        return redirect()->route('posts.index')->with('success','Post yaratildi');

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
