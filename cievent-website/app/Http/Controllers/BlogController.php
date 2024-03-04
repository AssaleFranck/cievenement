<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request){
        $postes = Post::all();
        if($request->search){
            $postes = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
        } elseif($request->category){
            $postes = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        }
        else{
            $postes = Post::latest()->paginate(10);
        }
        $poste = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $categories = Category::all();

        $comments = Comment::all();


        return view('pages.blog', compact('postes', 'categories', 'comments','poste', 'posts'));
    }

    // public function blocRecent(Request $request){
    //     $postRecent  = Post::all();



    //         $postRecent = Post::latest()->paginate(3);

    //     return view('pages.blog', compact('postRecent'));
    // }



    public function create(){
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
        $categories = Category::all();
        return view('dashboard.blogPosts.create-blog-post', compact('categories'));
    }

    public function store(Request $request){
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
      $request->validate([
           'title' => ['required', 'string',  'min:3', 'max:255'],
           'imagePath' => 'required | image',
           'body' => 'required',
           'category_id' => 'required'
       ]);

       $title = $request->input('title');
       $category_id = $request->input('category_id');

       if(Post::latest()->first() !== null ){
        $postId = Post::latest()->first()->id + 1;
       } else{
           $postId = 1;
       }

       $slug = Str::slug($title, '-' . '-' . $postId);
       $user_id = Auth::user()->id;
       $body = $request->input('body');

    //    //File upload

    $post = new Post();
    $post->title = $title;
    // if ($post->count()>0) {
        //     # code...
        // }
        $imagePath = 'storage/' .$request->file('imagePath')->store('postsImages', 'public');
        $post->imagePath = $imagePath;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;







        $post->save();


       return redirect()->route('blog.index')->with('status', 'Post Creer avec succes');

      /* $allInputs = $request->all();
       dd($allInputs);*/


    }

    public function edit(Post $post){
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }

        $categories = Category::all();
        $id = $post->category_id;
        $select = Category::findOrFail($id);
        // dd($select);

        return view('dashboard.blogPosts.edit-blog-post', compact('post', 'categories', 'select'));
    }

    public function update(Request $request, $id){
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'image' => 'nullable | image',
            'body' => 'required'
        ]);

        $title = $request->input('title');

        $postId = $post->id;
        $slug = Str::slug($title, '-') . '-' . $postId;
        $body = $request->input('body');

        // //File upload

        // if($request->hasfile('imagePath'))
        // {
        //     $imagePath = 'storage/' . $request->file('image')->store('postsImages', 'public');
        //     $post->imagePath = $imagePath;
        //     $post = $request->file('imagePath');
        // }


        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        // $post->imagePath = $imagePath;

            //    $post = Post::find($id);
            //    $post->category_id = $request->input('category_id');
            //    $post->slug = $request->input('slug');
            //    $post->user_id = $request->input('user_id');
            //    $post->title = $request->input('title');
            //    $post->image = $request->input('imagePath');

        // if ($request->hasFile('imagePath'))
        // {
        //     $destination = 'storage/postsImages/'.$post->imagePath;
        //     if (File::exists($destination))
        //     {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('imagePath');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('storage/postsImages/', $filename);
        //     $post->imagePath = $filename;
        // }


        if ($request->hasFile('imagePath')) {

            $destination = 'storage/postsImages/'.$post->imagePath;
            if (File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('imagePath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('storage/postsimages/');
            $file->move($path,$fileName);

            $post->imagePath = $fileName;
        }



        $post->update();


        return redirect()->route('blog.index')->with('status', 'Poste modifier avec succes');
    }

    // public function show($slug){
        //     $post = Post::where('slug', $slug)->first();
        //     return view('blogPosts.single-blog-post', compact('post'));
        // }*/

        // Using Route model binding
        public function show($id){
            //$category = $post->category;
            $contenu = Post::findOrFail($id);
            // $posts = Post::all();
            // $comments = Comment::all();
             $comments = Comment::where('commentable_id', $id);
            $categories = Category::all();
            $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
            // $categories = Category::orderBy('name', 'Desc')->limit(3)->get();
            $categori = Category::orderBy('created_at', 'Desc')->limit(3)->get();
            // $comments = Comment::findOrFail($id);
            // dd($contenu);
            // dd($comments);
            $poste = Post::orderBy('created_at', 'DESC')->limit(3)->get();

            //$relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
            return view('pages.blog-details', compact('posts', 'contenu', 'categories', 'categori', 'comments','poste'));
    }

    public function destroy(Post $post){

        $post->delete();
        return redirect()->back()->with('success', 'Poste supprime avec succes');
    }
}
