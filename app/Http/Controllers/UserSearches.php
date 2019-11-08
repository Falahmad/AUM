<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserKeywords;
use App\User;
use Illuminate\Support\Carbon;
use Session;

class UserSearches extends Controller
{
    public function InsertNewSearch($keyword) {

        $userName = Session::get('userName')[0];
        $user = User::where('unique_id', $userName)->get()->first();
        if($user == null) { return; }
        $userId = $user->id;

        UserKeywords::create([
            'user_id'=> $userId,
            'keyword'=> $keyword,
            'created_at'=> Carbon::now('Asia/Kuwait'),
            'updated_at'=> Carbon::now('Asia/Kuwait')
        ]);

    }
}
