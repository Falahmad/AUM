<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Request;
use Session;
use App\Keyword;

class PagesController extends Controller {


    public function ViewErrorPage() {
        $error = Request::input('error');
        $errorType = Request::input('errorType');
        return view('pages.errorPage')
        ->with('error', $error)
        ->with('errorType', $errorType);
    }

    public function ViewIndex() {
        $userName = Session::get('userName')[0];
        if($userName) {
            return $this->ViewHomePage();
        } else {
            return $this->ViewLoginPage();
        }
    }

    private function ViewLoginPage() {
        return view('pages.login');
    }

    private function ViewHomePage() {
        $queue = array();
        $keyword = Input::get('keyword');
        if($keyword == null) {
            $queue = array();
        } else {
            $keywords = Keyword::where('word', $keyword)->get();
            $relationKeywords = array();
            foreach($keywords as $k) {
                $relations = $k->SourcesRelation;
                foreach($relations as $relation) {
                    array_push($relationKeywords, $relation);
                }
            }
            $queue = $relationKeywords;
        }

        return view('pages.home')
        ->with('queue', $queue)
        ->with('keyword', $keyword);
    }

    public function AddNewSourcePage() {
        return view('pages.addnewsource');
    }
}
