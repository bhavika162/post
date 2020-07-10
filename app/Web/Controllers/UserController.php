<?php
namespace App\Web\Controllers;

use App\Status;
use App\User;
use App\Users;
use App\Web\WebController;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserController extends WebController {

    public function signup(){

        return view('web.signup');
    }

    public function postSignup(Request $request){

        $requestParams = $request->only(['name','email']);
        $checkEmailExist = Users::whereEmail($requestParams['email'])->first();
        if($checkEmailExist){
            return [
                'status' => 201,
                'message' =>  'Email is already register.'
            ];
        }
        $users = new Users();
        $users->name = $requestParams['name'];
        $users->email = $requestParams['email'];
        $users->password = Hash::make('123456');
        $users->save();
        return view('web.login');
    }

    public function login(){
        return view('web.login');
    }

    public function postLogin(Request $request){

        $credentials = $request->only(['email', 'password']);

        /** @var Users $users  */
        $users  = Users::whereEmail($credentials['email'])->first();
        if($users) {
            if ($users  && Hash::check($credentials['password'], $users->password)){
                session([\Config::get('web.session') => $users ]);
                return redirect('/');
            } else {
                \Response::json(['email and/or password is not recognized.'], 400)->send();
            }
        } else{
            \Response::json(['The email you entered is not registered with us.'], 400)->send();
        }
    }

    public function logout(){
        \Session::forget(\Config::get('web.session'));

        return redirect('/')->with(\Config::get('web.message'), [
            'type' => 'success',
            'message' => 'Logout successfully.'
        ]);
    }
}