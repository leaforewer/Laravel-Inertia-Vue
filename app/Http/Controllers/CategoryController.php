<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;



class CategoryController extends Controller
{

    public function index() : \Inertia\Response
    {
        return Inertia::render('Category/Index', [
            "categories" => Category::orderBy('id', 'ASC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create(
            $request->validate(
                [
                    'name' => ['required', 'max:50'],
                    STR::slug('slug') => ['required']
                ]
            )
        );

        return Redirect::route('categories.index')->with('cat_message', 'Your Category is Stored Successfully in the database');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'max:50'],
            'slug' => ['required']
        ]);
        $category->update($data);


        return Redirect::route('categories.index')->with('cat_message', 'Category Edit Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('categories.index')->with('cat_message', 'Category Delete Successfull');
    }
}
