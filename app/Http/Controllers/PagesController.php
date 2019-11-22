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

            foreach($keywords as $k) {
                $relations = $k->SourcesRelation;
                foreach($relations as $relation) {
                    array_push($queue, $relation);
                }
            }
        }

        $keywordForGoogle = str_replace(" ","+", $keyword);
        $googleSearch = $this->CrawlFromGoogle($keywordForGoogle);
        foreach($googleSearch as $google) {
            array_push($queue, $google);
        }

        // return $queue;

        return view('pages.home')
        ->with('queue', $queue)
        ->with('keyword', $keyword);
    }

    public function CrawlFromGoogle($keyword) {
        $url = 'https://www.googleapis.com/customsearch/v1';
        $searchEngine = '&cx=009612237352166399699:oypptalmeya';
        $key = '?key=AIzaSyAbm5YA2arT6pHzA4Ax5argeC2VxdQaR7Q'.$searchEngine;
        $keyword = '&q='.$keyword;
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url.$key.$keyword);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        $decoded = json_decode($response, true);

        $array = array();
        if(isset($decoded['items'])) {
            $items = $decoded['items'];

            foreach($items as $item) {
                $objc = (Object) [
                    'name'=>  $item['title'],
                    'description'=> $item['snippet'],
                    'site_link'=> $item['link']
                ];
                array_push($array, $objc);
            }
        }
        return $array;
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
