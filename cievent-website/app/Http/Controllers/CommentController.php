<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Test;
use App\Models\User;
use App\Models\Comment;
use App\Models\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Dashboardblack;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{


    public function store(Request $request, Post $post){

        $post->comments()->create([
        'name' => $request->name,
        'email' => $request->email,
        'comment' => $request->comment,
        'post_id' => $request->comment_id,
        'parent_id' => $request->comment_id,
        ]);

        return back();
    }

    // public function index()
    // {
    //     if (! Gate::allows('admin_access')) {
    //         abort(403);
    //     }
    //     $comments = Comment::latest()->paginate(7);

    //     // $datas = User::all();
    //     $num = 0;

    //     return view('dashboard.blogPosts.comments.index', compact('comments','num'));
    // }

    public function edit($id){

        // dd($id);
        $comment = Comment::find($id);
        // dd($comment);

        // $comment = Comment::findOrFail($id);

        return view('dashboard.blogPosts.comments.edit', compact('comment'));
    }


    public function getCommentById($id)
    {
        $comment = comment::find($id);
            return response()->json($comment);
    }




    public function update(Request $request, $id)
    {

        $comments = Comment::findOrFail($id);

        $comment = Comment::findOrFail($id);

        $comment->update([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'parent_id' => $request->comment_id,
        ]);

        $comment->save();

        return redirect()->route('blog.show', $comments->commentable_id);
    }


    public function destroy($id){

        $comment = Comment::findOrFail($id);
        $comment = comment::all();

        // dd($comment);
            Comment::destroy($id);
        return redirect()->back()->with('success', 'votre commentaire a été supprimé avec succes');
    }


    public function index()
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $data = Category::all();
        $step = 1;
        $num = 0;
        
        return view('comment.dashboard_comment', compact('data', 'step', 'num'));
    }

    public function crud(Request $request)
    {

        $data = Category::all();
        $id_cat = 0;
        $post = 0;
        $num = 0;

        if (isset($request['cat'])) {

            $id_cat = $request['cat'];
            $data = Post::where('category_id', $id_cat)->get();
            $step = 2;
        }


        if (isset($request['post'])) {

            $id_post = $request['post'];
            $data = Comment::where('commentable_id', $id_post)->get();
            $step = 3;
        }


        return view('comment.dashboard_comment', compact('data', 'step', 'post', 'num'));
    }


}
