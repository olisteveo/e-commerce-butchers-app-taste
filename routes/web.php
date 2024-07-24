<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RecipeController as DashboardRecipeController;
use App\Http\Controllers\Dashboard\Admin\CategoryController as DashboardCategoryController;
use App\Http\Controllers\Dashboard\Admin\PagesController as DashboardPagesController;
use App\Http\Controllers\Dashboard\Admin\UsersController as DashboardUsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    # guest view page but only my recipes
    Route::get('/my_recipes',[RecipeController::class, 'my_recipes'])->name("my_recipes");
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/my_recipes/uploads',[DashboardRecipeController::class, 'create'])->name("dashboard.my_recipes.uploads");
    Route::post('/store',[DashboardRecipeController::class, 'store'])->name("recipe_store");
    Route::group(["middleware"=>"auth.author", "prefix"=>"dashboard/my_recipes"], function() {
    // routes for verified users with at least an author role
        Route::get('/',[DashboardRecipeController::class, 'index'])->name("dashboard.my_recipes");
        Route::get('/{recipe}/edit',[DashboardRecipeController::class, 'edit'])->name("dashboard.my_recipes.edit");
        Route::post('/update',[DashboardRecipeController::class, 'update'])->name("dashboard.my_recipes.update");
        Route::delete('/{recipe}/destroy',[DashboardRecipeController::class, 'destroy'])->name("dashboard.my_recipes.delete");
    });
    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/categories"], function() {
    // routes for verified users with the site admin role relating to the recipe categories management
        Route::get('/',[DashboardCategoryController::class, 'index'])->name("dashboard.admin.categories");
        Route::get('/create',[DashboardCategoryController::class, 'create'])->name("dashboard.admin.categories.create");
        Route::get('/{category}/edit',[DashboardCategoryController::class, 'edit'])->name("dashboard.admin.categories.edit");
        Route::post('/store',[DashboardCategoryController::class, 'store'])->name("dashboard.admin.category_store");
        Route::post('/update',[DashboardCategoryController::class, 'update'])->name("dashboard.admin.categories.update");
        Route::delete('/{category}/destroy',[DashboardCategoryController::class, 'destroy'])->name("dashboard.admin.categories.delete");
    });
    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/pages"], function() {
    // routes for verified users with the site admin role relating to page content management
        Route::get('/',[DashboardPagesController::class, 'index'])->name("dashboard.admin.pages");
        Route::get('/{page}/edit',[DashboardPagesController::class, 'edit'])->name("dashboard.admin.pages.edit");
        Route::post('/update',[DashboardPagesController::class, 'update'])->name("dashboard.admin.pages.update");
    });
    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/users"], function() {
        // routes for verified users with the site admin role relating to page content management
            Route::get('/',[DashboardUsersController::class, 'index'])->name("dashboard.admin.users");
            Route::get('/{user}/edit',[DashboardUsersController::class, 'edit'])->name("dashboard.admin.users.edit");
            Route::post('/update',[DashboardUsersController::class, 'update'])->name("dashboard.admin.users.update");
            Route::delete('/{user}/destroy',[DashboardUsersController::class, 'destroy'])->name("dashboard.admin.users.delete");

        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about',[PagesController::class, 'about'])->name("about");

Route::get('/recipes',[RecipeController::class, 'index'])->name("recipes");
Route::get('/recipes/{recipe}',[RecipeController::class, 'view'])->name("recipe.view");
Route::get('/categories/{category}',[CategoryController::class, 'index']);
Route::get('/categories',[CategoryController::class, 'index'])->name("categories");

Route::get('/contact',[PagesController::class, 'contact'])->name("contact");

Route::get('/',[PagesController::class, 'index'])->name("home");

require __DIR__.'/auth.php';
