<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $posts = Post::all();
        $num = 0;

        return view('post.dashboard_post',compact('posts', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
        $categories = Category::all();

        return view('post.create_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $post = new Post;

        $post->title = $validated['title'];
        $post->body = $validated['body'];

        if ($request->hasFile('imagePath')) {

            $file = $request->file('imagePath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/posts/');
            $file->move($path,$fileName);

            $post->imagePath = $fileName;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = $validated['category_id'];

        $post->save();


       return redirect('/dashboard/blog/posts')->with('success', 'Post Creer avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $post = Post::findOrFail($id);
        $select = Category::findOrFail($post->category_id);
        $categories = Category::all();

        return view('post.edit_post', compact('post', 'categories', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditPostRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $post = Post::findOrFail($id);

        $post->title = $validated['title'];
        $post->body = $validated['body'];

        if ($request->hasFile('imagePath')) {

            $file = $request->file('imagePath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/posts/');
            $file->move($path,$fileName);

            $post->imagePath = $fileName;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = $validated['category_id'];

        $post->save();


        return redirect('/dashboard/blog/posts')->with('success', 'Post modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect()->back()->with('success', 'Poste supprime avec succes');
    }
}
