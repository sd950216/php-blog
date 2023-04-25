<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        // Code to display the default view
        return view('index');
    }

    public function login() {
        // Code to display the default view
        return view('login');
    }

    public function register() {
        // Code to display the default view
        return view('register');
    }
    public function about() {
        // Code to display the default view
        return view('about');
    }
    public function contact() {
        // Code to display the default view
        return view('contact');
    }
}
