<?php
namespace App\Http\Controllers;
use App\Models\Recipe;

class RecipeController extends Controller
{

    protected $page_title = 'Recipes';

    public function my_recipes()
    {
        return view('recipes.view_my')->with([
            // use the logged in user id to choose the users own authored recipes
            "author"    => \App\Models\Author::getAuthor4User(auth()->user()->id, 15),
            "title"     => $this->page_title
        ]);
    }

    public function index()
    {
        return view('recipes.view_my')->with([
            // just choose the recipes by randomly determining an author id
            "author"    => \App\Models\Author::getAuthor(rand(1, 8)),
            "title"     => $this->page_title
        ]);
    }

    public function view(Recipe $recipe)
    {
        return view('recipes.view')->with([

            "recipe"    => $recipe,
            "title"     => $this->page_title
        ]);
    }
}
