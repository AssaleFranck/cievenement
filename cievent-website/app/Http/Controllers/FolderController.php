<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $datas = Folder::all();
        return view('folder', compact('datas'));
    }

    public function store(Request $request)
    {
        $folders = new Folder;
        dd($request);
    }
}
