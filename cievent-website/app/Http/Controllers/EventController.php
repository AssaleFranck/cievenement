<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\EditEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Models\Chrono;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        
        $num = 0;
        $datas = Event::all();
        $chrono = Chrono::all();
        // dd($chrono[0]->event_id);
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('event.dashboard_event', compact(['datas','num', 'posts', 'chrono']));
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

        return view('event.create_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $event = new Event();

        $event->name = $validated['name'];
        $event->vip = $validated['vip'];
        $event->standard = $validated['standard'];
        $event->statut = $validated['statut'];

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/events/');
            $file->move($path,$fileName);

            $event->img = $fileName;
        }

        $event->contact_one = $validated['contact_one'];
        $event->contact_two = $validated['contact_two'];
        $event->description = $validated['description'];

        $event->date = $validated['date'];
        $event->time = $validated['time'];
        $event->place = $validated['place'];
        $event->url = $validated['url'];

        $event->save();

        $invite = new Invite();

        $invite->name = $validated['name_invit'];
        $invite->surname = $validated['surname_invit'];
        $invite->compagny = $validated['compagny_invit'];
        $invite->description = $validated['description_invit'];
        $invite->event_id = $event->id;

        if ($request->hasFile('img_invit')) {

            $file2 = $request->file('img_invit');
            $fileName2 = time() . '.' . $file2->getClientOriginalExtension();
            $path2 = public_path('images/events/');
            $file2->move($path2,$fileName2);

            $invite->img = $fileName2;
        }

        $invite->save();

        return redirect('/dashboard/events')->with('success', 'Nouvel évènement ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $datas = Event::findOrFail($id);
        // $test = $datas->registeds;

        // dd($invites);
        $vip = 0;
        $stand = 0;
        $nbre = 0;

        foreach (($datas->registeds) as $pass) {

            if ($datas->registeds[$nbre]->pass == "vip"){
                $vip ++;
            }else {
                $stand ++;
            }
            $nbre ++;
        }

        return view('event.details_event', compact('datas', 'vip', 'stand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $datas = Event::findOrFail($id);
        $invites = Invite::where('event_id', $id)->get();
        // dd($invites);

        return view('event.edit_event', compact('datas','invites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\EditEventRequest $request
     * @param  \App\Models\Event  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEventRequest $request,$id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $event = Event::findOrFail($id)->first();
        $validated = $request->validated();

        $event->name = $validated['name'];
        $event->vip = $validated['vip'];
        $event->standard = $validated['standard'];
        $event->statut = $request->statut;

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/events/');
            $file->move($path,$fileName);

            $event->img = $fileName;
        }

        $event->contact_one = $validated['contact_one'];
        $event->contact_two = $validated['contact_two'];
        $event->description = $validated['description'];

        $event->date = $validated['date'];
        $event->time = $validated['time'];
        $event->place = $validated['place'];
        $event->url = $validated['url'];

        $event->save();

        return redirect('/dashboard/events')->with('success', 'Information mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $data = Event::findOrFail($id);
        $data->delete();

        return redirect('/dashboard/events')->with('success', "l'évènement a bien été supprimé");
    }



    public function state($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $data = Event::findOrFail($id);

        if ($data->statut) {

            $data->statut = 0;

        }else {

            $data->statut = 1;
        }

        $data->save();

        return redirect('/dashboard/events')->with('success', "l'évènement a bien été mis en standby");
    }


    
    // Parties events
    public function events_details($id)
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $event = Event::findOrFail($id);
        // dd($events);
        return view('pages.events-details', compact('event', 'posts'));
    }
}
