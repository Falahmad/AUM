<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Session;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PagesController extends Controller {

    public function ViewLoginPage() {
        return view('pages.login');
    }

    public function Login(Request $request) {

    }
}
