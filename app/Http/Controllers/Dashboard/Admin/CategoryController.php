<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Dashboard\Admin\Category\EditCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('dashboard.admin.categories.list')->with([
            // use the logged in user id to choose the users own authored recipes
            "title"     => "Edit the Recipe Categories Available",
            "categories" => Category::getAll()
        ]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Recipe Category';
        return view('dashboard.admin.categories.create')->with([
            "title" => $title,
            "categories" => Category::getAll()
        ]);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            "name" => $request->validated("name"),
            "description" => $request->validated("desc")
        ]);
        return redirect()->route("dashboard.admin.categories")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Category Created</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = 'Edit Category';
        return view('dashboard.admin.categories.edit')->with([
            "title" => $title,
            "category" => $category,
        ]);
    }


    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request)
    {
        $category = Category::where("id", $request->validated('category_id'))->first();

        // Update the category
        $category->name = ucwords($request->validated('name'));
        $category->description = ucfirst($request->validated('desc'));
        $category->save();

        // Redirect the user to the category index page
        return redirect()->route("dashboard.admin.categories")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Category Updated</div>');

    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Category Deleted</div>');
    }
}
