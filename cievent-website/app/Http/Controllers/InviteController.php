<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreInviteRequest;
use App\Http\Requests\EditInviteRequest;

class InviteController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInviteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInviteRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $invite = new Invite();

        $invite->name = $validated['name_invit'];
        $invite->surname = $validated['surname_invit'];
        $invite->compagny = $validated['compagny_invit'];
        $invite->description = $validated['description_invit'];
        $invite->event_id = $validated['event_id'];

        if ($request->hasFile('img_invit')) {
            
            $file2 = $request->file('img_invit');
            $fileName2 = time() . '.' . $file2->getClientOriginalExtension();
            $path2 = public_path('images/events/');
            $file2->move($path2,$fileName2);

            $invite->img = $fileName2;
        }
        
        $invite->save();

        return redirect('/dashboard/events')->with('success', 'Invité ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $invites = Invite::where('event_id', $id)->get();
        $num = 0;

        return view('event.invite.invite_event', compact('invites', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invite = Invite::findOrFail($id);

        return view('event.invite.edit_invite', compact('invite'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\EditInviteRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditInviteRequest $request, $id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
    
        $validated = $request->validated();

        // dd($validated);
        $invite = Invite::findOrFail($id);

        $invite->name = $validated['name_invit'];
        $invite->surname = $validated['surname_invit'];
        $invite->compagny = $validated['compagny_invit'];
        $invite->description = $validated['description_invit'];
        $invite->event_id = $validated['event_id'];

        if ($request->hasFile('img_invit')) {
            
            $file2 = $request->file('img_invit');
            $fileName2 = time() . '.' . $file2->getClientOriginalExtension();
            $path2 = public_path('images/events/');
            $file2->move($path2,$fileName2);

            $invite->img = $fileName2;
        }
        
        $invite->save();

        return redirect('/dashboard/events')->with('success', "Les informations de l'invité ont bien été modifié");
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

        // dd($id);

        $data = Invite::findOrFail($id);
        $data->delete();

        return redirect('/dashboard/events')->with('success', "l'invité a bien été supprimé");
    }
}
