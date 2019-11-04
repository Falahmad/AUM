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
        // $checkUser = 'Success';
        // return response()->json([
        //     'salt'=> base64_encode(md5($request->input('password'), true))
        // ]);
        Session::flush();
        if($checkUser == 'Success') {
            // $userName = $request['userId'];
            $userName = '111';
            Session::push('userName', $userName);
            $password = 'fahed123';
            // return response()->json([
            //     'hash'=> \Hash::make('$password'),
            //     'auth'=> Auth::attempt(['unique_id'=> $userName, 'password'=> $password])
            // ]);
            Auth::attempt(['unique_id' => $userName, 'password' => $password]);
            return redirect('/');
        } else {
            return redirect()->route('error', array('error'=> $checkUser));
        }
    }


    function Validation($request) {
        return $this->validate($request, [
            'userId'=>'required|number',
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
