<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use Request;
use Session;

class PagesController extends Controller {


    public function ViewErrorPage() {
        $error = Request::input('error');
        $errorType = Request::input('errorType');

        return view('pages.errorPage')
        ->with('error', $error)
        ->with('errorType', $errorType);
    }

    public function ViewLoginPage() {
        return view('pages.login');
    }

    public function ViewHomePage(Request $request) {
        return view('pages.home');
    }

    public function AddNewSourcePage() {
        return view('pages.addnewsource');
    }
}
