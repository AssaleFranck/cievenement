<?php

namespace App\Http\Controllers;

use App\Models\Chrono;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChronoCntroller extends Controller
{
    public function update(Request $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
        $chrono = Chrono::all();
        
        if ($chrono->count() > 0) {
            $chrono = Chrono::findOrFail(1);
            $event = Event::findOrFail($request['event_id']);
            // dd($event);
            $chrono->date = $event->date;
            $chrono->event_id = $request['event_id'];
            $chrono->save();
        }else {
            $chrono =  new Chrono();
            $event = Event::findOrFail($request['event_id']);
            $chrono->date = $event->date;
            $chrono->event_id = $request['event_id'];
            $chrono->save();
        }
        // if ($chrono->count() > 0) {
        //     $chrono = Chrono::findOrFail(1);
        //     $chrono->date = $request['date'];
        //     $chrono->save();
        // }else {
        //     $chrono =  new Chrono();
        //     $chrono->date = $request['date'];
        //     $chrono->save();
        // }
        return redirect('/dashboard/events')->with('success', 'Compte à rebour initialisé');
    }
}
