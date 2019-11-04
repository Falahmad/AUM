<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Source;
use App\Keyword;
use App\SourceKeywords;

class SourcesController extends Controller
{
    function AddNewSource(Request $request) {

        $keywords = $request['keywords'];
        if(count($keywords) < 2) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'keywords' => ['Keyword should not be empty'],
            ]);
            throw $error;
        }
        $this->validate($request, [
            'name'=>'required|string',
            'description'=>'required|string|max:1000',
            'site'=> 'required|string'
        ]);

        $this->CreateNewResource($request);

        return redirect('/addnewsource');
    }

    private function CreateNewResource($request) {

        $name = $request['name'];
        $description = $request['description'];
        $site = $request['site'];
        $keywords = $request['keywords'];
        $keywords = array_filter($keywords, function($value) { return !is_null($value) && $value !== ''; });

        $sourceId = Source::create([
            'name'=> $name,
            'description'=> $description,
            'site_link'=> $site
        ])->id;

        $existedKeywords = Keyword::all()->pluck('word')->toarray();

        $keywordIds = array();

        foreach($keywords as $keyword) {
            if(!in_array($keyword, $existedKeywords)) {
                $keywordId = Keyword::create([
                    'word'=> $keyword
                ])->id;
                array_push($keywordIds, $keywordId);
            } else {
                $existedKeywordsWithId = Keyword::all();
                foreach($existedKeywordsWithId as $existedKeyword) {
                    if($existedKeyword->word == $keyword) {
                        array_push($keywordIds, $existedKeyword->id);
                        break;
                    }
                }
            }
        }

        foreach($keywordIds as $id) {
            SourceKeywords::create([
                'source_id'=> $sourceId,
                'keyword_id'=> $id
            ]);
        }
    }
}
