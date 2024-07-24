<?php

// -------------- command to create controller: php artisan make:controller name/controller ------------

// First step in creating Laravel App
// Create controller or model/ order doesnt matter
// The controller gives behaviour to the app

namespace App\Http\Controllers;

//bring in the request library to handle requests
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // inside the controller we define functions
    public function index(){
        return $this->getPageContent('Welcome to Taste!', 'pages.index');
        $title = 'Welcome to Taste!';
        $blade = 'pages.index';
        return $this->getPageContent($title, $blade);
    }

    /**
     * This private function gets the page content from the database based on the page title.
     * The blade is the view/layout template to use to generate the page response
     *
     * @param string $title The page title to get the page conetnt for.
     * @param string $blade The blade view template to use to generate the response.
     * @return View
     */
    private function getPageContent($title, $blade)
    {
        return view($blade)->with(["page" => \App\Models\Page::where("title", $title)->first()]);
    }

    public function about(){
        $title = 'About Us';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        // dd($page);
        return view('pages.about')->with(["page" => $page]);
    }

    public function register(){
        $title = 'Register';
        return view('pages.register', compact('title'));
    }

    public function login(){
        $title = 'Login';
        return view('pages.login', compact('title'));
    }

    public function contact(){
        $title = 'Contact';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        return view('pages.contact')->with(["page" => $page]);
    }


}
