<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Users\EditUsersRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('dashboard.admin.users.list')->with([
            //
            "title"     => "Edit Users",
            "users" => User::all()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('dashboard.admin.users.edit')->with([
            "title" => $title,
            "user" => $user,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUsersRequest $request)
    {
        $users = User::where("id", $request->validated('users_id'))->first();

        // Update the user
        $users->name = ucwords($request->validated('name'));
        $users->email = ucfirst($request->validated('desc'));
        $users->save();

        // Redirect the user to the category index page
        return redirect()->route("dashboard.admin.users")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">User Updated</div>');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">User Deleted</div>');
    }
}
