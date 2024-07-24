<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Pages\EditPageRequest;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('dashboard.admin.pages.list')->with([
            // use the logged in user id to choose the users own authored recipes
            "title"     => "Edit the available Pages Content",
            "pages" => Page::getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(501);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $Page)
    {
        $title = 'Edit Page';
        return view('dashboard.admin.pages.edit')->with([
            "title" => $title,
            "page" => $Page,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPageRequest $request)
    {
        $Page = Page::where("id", $request->validated('page_id'))->first();

        // Update the Page
        $Page->title = $request->validated('title');
        $Page->content = $request->validated('content');
        $Page->save();

        // Redirect the user to the Page index page
        return redirect()->route("dashboard.admin.pages")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Page Updated</div>');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(501);
    }
}
