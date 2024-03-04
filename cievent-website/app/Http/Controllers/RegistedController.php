<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Registed;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\EventMarkdownMail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreRegistedRequest;

class RegistedController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['create', 'store']);
    // }

    public function index()
    {
        $events = Event::all();
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        // setlocale(LC_TIME, "french");

        // $test = $events[0]->date;
        // $date =  strftime('%e %B %Y');

        // foreach ($events as $event) {
        //    $test = $event->date;
        //    =  strftime('%e %u %Y',)
        // }
        return view('pages.events', compact('events', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Event  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // if (! Gate::allows('admin_access')) {
        //     abort(403);
        // }
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $event = Event::findOrFail($id);

        return view('pages.inscription', compact('event', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreRegistedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistedRequest $request)
    {
        // if (! Gate::allows('admin_access')) {
        //     abort(403);
        // }
        // dd($requsest);

        $validated = $request->validated();

        $registed = new Registed();

        $registed->name = $validated['name'];
        $registed->email = $validated['email'];
        $registed->phone = $validated['phone'];

        if ($request->filled('compagny')) {

            $registed->compagny = $validated['compagny'];
        }
        $registed->pass = $validated['pass'];
        $registed->commune = $validated['commune'];
        $registed->event_id = $validated['event_id'];

        $registed->save();

        $info = Event::findOrFail($validated['event_id']);

        Mail::to($validated['email'])->send(new EventMarkdownMail($info));
        return redirect('/events')->with('success', "Inscription reussie, vous serez contacté pour finaliser l'inscription");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registed  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $datas = User::findOrFail($id);

        return view('event.register_event', compact('datas'));
    }

    public function contact($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $regis = Registed::findOrFail($id);

        return view('event.contact', compact('regis'));
    }

    public function send(ContactRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
        $validated = $request->validated();

        $msg = $validated['message'];
        // dd($validated['message']);
        $msg = preg_replace('#[\r\n]#','',nl2br($msg,false));
        $lines = explode("<br>",$msg);
        $validated['message'] = $lines;


        Mail::to($validated['email'])->send(new ContactMail($validated));
        // return back()->withInput();
        return redirect('/dashboard/events');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registed  $registed
     * @return \Illuminate\Http\Response
     */
    public function edit(Registed $registed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registed  $registed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registed $registed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registed  $registed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registed $registed)
    {
        //
    }
}
