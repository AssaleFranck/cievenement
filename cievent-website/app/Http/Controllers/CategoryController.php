<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
// use Illuminate\Auth\Access\Gate;

class CategoryController extends Controller
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
    public function index(Request $request)
    {

        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $categories = Category::all();
        $num = 0;

        return view('categorie.index-categories', compact('categories', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $categories = new Category;

        $categories->name =  $validated['name'];

        $categories->save();

        return redirect(route('categories.index'))->with('success', 'Nouvelle catégorie crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $categorie = Category::findOrFail($id);

        return view('categorie.edit-category', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $validated = $request->validated();

        $category = Category::findOrFail($id);

        $category->name = $validated['name'];

        $category->save();

        return redirect(route('categories.index'))->with('success', 'Categorie modifie avec succes');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('admin_access')) {
            abort(403);
        }

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('dashboard/blog/categories')->with('success', 'Categorie supprimé avec succes');
    }
}
