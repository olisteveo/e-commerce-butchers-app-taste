<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRecipeRequest;
use App\Http\Requests\Dashboard\Recipe\EditRecipeRequest;
use App\Models\Category;
use App\Models\Author;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Role;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.recipes.list')->with([
            // use the logged in user id to choose the users own authored recipes
            "title"     => "Recipes",
            "author"    => \App\Models\Author::getAuthor4User(auth()->user()->id, 15),
            "categories" => Category::getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Recipe Upload';
        return view('dashboard.recipes.create')->with([
            "title" => $title,
            "categories" => Category::getAll()
        ]);
    }

    /**
     * Store a newly created recipe resource in storage.
     *
     * @param  \App\Http\Requests\UploadRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRecipeRequest $request)
    {
        // handle file upload
        if($request->hasFile('image')){
            // get file name with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store with a timestamp
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //dd($fileNameToStore);
            // upload the image
            $path = $request->file('image')->storeAs('image_uploads', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }
        $user = auth()->user();
        if(!$user->author) {
            $author = Author::create([
                "user_id" => $user->id,
                "author_name" => $user->name
            ]);
            // saving the users associated author record
            $user->author()->save($author);
            if($user->roles_id == Role::USER_ROLE) {
                // update the users role id now they are becoming an author
                $user->roles_id = Role::AUTHOR_ROLE;
            }
            // pushing updated user relation details incl role id change
            $user->push();
        }
        else{
            // grabbing a reference for the user author for because
            $author = $user->author;
        }
        $recipe = new Recipe;
        $recipe->title = $request->validated('title');
        $recipe->description = $request->validated('desc');
        $recipe->cooking_method = $request->validated('cookmeth');
        $recipe->prep_time = $request->validated('prep');
        $recipe->serves = $request->validated('serves');
        $recipe->image = $fileNameToStore;
        $recipe->author_id = $author->id;
        $recipe->save();
        foreach($request->post("ingredients") as $ingredient_data) {
            $ingredient = new Ingredient();
            $ingredient->name = $ingredient_data["name"];
            $ingredient->quantity = $ingredient_data["quantity"];
            $ingredient->recipe_id = $recipe->id;
            $ingredient->save();
        }
        $category_link = new \App\Models\Recipe2Category;
        $category_link->recipe_id = $recipe->id;
        $category_link->category_id = $request->input('category_id');
        $category_link->save();
        return redirect()->route("dashboard.my_recipes")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Upload Successful</div>');
    }

    /**
     * Show the form for editing the specified recipe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $title = 'Recipe Upload';
        return view('dashboard.recipes.edit')->with([
            "title" => $title,
            "recipe"    => $recipe->load(["ingredients", "category"]),
            "categories" => Category::getAll()
        ]);
    }

    /**
     * Update the specified recipe in storage.
     *
     * @param  EditRecipeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRecipeRequest $request)
    {
        $recipe = Recipe::with(["ingredients", "category"])
                        ->find($request->validated("recipe_id"));
        // handle file upload
        if($request->hasFile('image-new')){
            // get file name with the extension
            $fileNameWithExt = $request->file('image-new')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('image-new')->getClientOriginalExtension();
            // file name to store with a timestamp
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // @todo - Delete the old image file as clean up.
            // upload the image
            $request->file('image-new')->storeAs('image_uploads', $fileNameToStore);
            $recipe->image = $fileNameToStore;
        }
        $recipe->title = $request->validated('title');
        $recipe->description = $request->validated('desc');
        $recipe->cooking_method = $request->validated('cookmeth');
        $recipe->prep_time = $request->validated('prep');
        $recipe->serves = $request->validated('serves');
        $recipe->save();
        return redirect()->route("dashboard.my_recipes")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Recipe Updated</div>');
    }

    /**
     * Remove the specified recipe from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::with(["ingredients", "category"])
                        ->find($id);
        $recipe->delete();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Recipe Deleted</div>');
    }
}
