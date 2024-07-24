<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //dump(auth()->user());
        $q = \App\Models\Author::myRecipeCount(auth()->user()->id); //give logged in user a count of saved recipes
        //dump($q);
        return view('dashboard')->with([
            // use the logged in user id to choose the users own authored recipes
            "author"    => $q
        ]);
    }
}
