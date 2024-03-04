<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Mail\sendMail;
use App\Models\Chrono;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    // Accueil

    public function index(Request $request){
        $posts = Post::all();
         if($request->search){
            $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
         } elseif($request->category){
             $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
         }
         else{
            $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        }

        $categories = Category::all();
        $events = Event::all();
        //chrono
        $chrono = Chrono::all();
        
        if ($chrono->count()) {
            $date = $chrono[0]->date;
            $date = date_create($date);
            $date = date_format($date, "m/d/Y");
        } else {
            $date = 0;
        }
        
        return view('pages.index', compact('posts', 'categories', 'date', 'events'));
    }

    // Parties events
    public function events()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $events = Event::all();
        return view('pages.events', compact('events','posts'));
    }

    // Parties contact
    public function services()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('pages.services', compact('posts'));
    }
    // Parties contact
    // public function eventi_nscription()
    // {
    //     $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
    //     return view('pages.Inscription', compact('posts'));
    // }

    // Parties contact
    public function contact()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('pages.contact', compact('posts'));
    }
    public function contactValidate(Request $request) {
        $this->validate($request, [
          'username' => 'required',
          'email' => 'required|email',
          'phone' => 'required|max:10',
          'subject'=>'required',
          'message' => 'required'
       ]);

       ContactUs::create($request->all());
       $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $data = [
          'username' => $request->username,
          'email' => $request->email,
          'phone' => $request->phone,
          'subject' => $request->subject,
          'message' => $request->message
        ];

        Mail::to('information@cievenement.com')->send(new sendMail($data));
  
    //   Mail::send('email', array(
    //       'name' => $request->get('name'),
    //       'email' => $request->get('email'),
    //       'phone' => $request->get('phone'),
    //       'subject' => $request->get('subject'),
    //       'form_message' => $request->get('message'),
    //   ), function($message) use ($request){
    //       $message->from($request->email);
    //       $message->to('richkardmagelan@gmail.com', 'Hello Admin')->subject($request->get('subject'));
    //   });

      return back()->with('success', 'Merci de nous avoir contacté.');
    }
}
