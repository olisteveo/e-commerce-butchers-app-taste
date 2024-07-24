<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($category="Breakfast")
    {
        $category_recipes = Category::with("recipes")->where("name", $category)->first();
        return View('categories.view')->with([
            // use the logged in user id to choose the users own authored recipes
            "category"    => $category_recipes,
            "title"     => $category_recipes->name,
            "categories" => Category::getAll()
        ]);
    }
}
