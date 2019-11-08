<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Request;
use Session;
use App\User;
use App\Keyword;
use App\UserKeywords;
use App\Http\Controllers\UserSearches;

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
            $keywords = Keyword::where('word', 'LIKE', '%'.$keyword.'%')->get();

            $userSearch = new UserSearches();
            $userSearch->InsertNewSearch($keyword);

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

    public function WhoSearched() {
        $userKeywords = UserKeywords::all();

        $array = Array();

        foreach($userKeywords as $uk) {
            $userName = User::find($uk->user_id)->name;
            $objc = (Object) [
                'name'=> $userName,
                'keyword'=> $uk->keyword,
                'createdAt'=> $uk->created_at
            ];
            array_push($array, $objc);
        }

        return view('pages.whosearched')
        ->with('queue', $array);
    }

    public function AddNewSourcePage() {
        return view('pages.addnewsource');
    }
}
