<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class UserController extends Controller
{
    public function LoginUser(Request $request) {
        $this->Validation($request);

        $checkUser = $this->CheckUserId($request);

        Session::flush();
        if($checkUser == 'Success') {
            $userName = $request['userId'];
            Session::push('userName', $userName);
            return redirect('/');
        } else {
            return redirect()->route('error', array('error'=> $checkUser));
        }
    }


    function Validation($request) {
        return $this->validate($request, [
            'userId'=>'required|string',
            'password'=>'required|string|max:255'
        ]);
    }

    function CheckUserId($request) {
        $userId = $request['userId'];
        $userPassword = base64_encode(md5($request->input('password'), true));
        $user = User::where('unique_id', $userId)->get()->first();

        if($user != null) {
            if($user->makeVisible(['salt'])->salt == $userPassword) {
                return 'Success';
            }
        } else {
            return "Could not found user";
        }
        return 'Wrong email or passowrd';
    }

}
