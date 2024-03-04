<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $datas = User::all();
        $num = 0;
        return view('dashboard.dashboard_users', compact('datas','num'));

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

        return view('dashboard.dashboard_home');
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

        return view('dashboard.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }
         // Retrieve the validated input data...

        $validated = $request->validated();


        $users = new User();

        $users->name = $validated['name'];
        $users->email = $validated['email'];
        $users->phone = $validated['phone'];

        if ($request->filled('admin') && $request->filled('author')) {
            $users->admin = $validated['admin'];
            $users->author = $validated['author'];
        }elseif ($request->filled('admin')) {
            $users->admin = $validated['admin'];
        }elseif ($request->filled('author')) {
            $users->author = $validated['author'];
        }

        $users->password = Hash::make($validated['password']);


        $users->save();

        $info = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $request['password'],
        ];
        Mail::to($info['email'])->send(new RegisterMail($info));
        return redirect('/dashboard/users')->with('success', 'Inscription réussie');
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $id
     */
    public function show(User $id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $datas = User::findOrFail($id);

        return view('dashboard.edit_user', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Http\Requests\EditUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request,$id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        User::whereId($id)->update($validated);

        return redirect('/dashboard/users')->with('success', 'Information mise à jour avec succèss');
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

        $data = User::find($id);
        $data->delete();

        return redirect('/dashboard/users')->with('success', 'Utilisateur supprimé');
    }
}
