<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Keyword;

class KeywordsController extends Controller
{
    function GetSuggestions(Request $request) {
        $keyword = Input::get('keyword');
        if(empty($keyword)) {
            return [];
        }
        $keywords = Keyword::where('word', 'LIKE', '%'.$keyword.'%')->pluck('word');
        return $keywords;
    }
}
