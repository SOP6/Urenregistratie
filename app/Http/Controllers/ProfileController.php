<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as Requests;
use App\User;
use Auth;
use View;
use Redirect;

class ProfileController extends Controller
{

    public function index(){
        $curUser = Auth::user();
        $userData =  [
            'first_name' => $curUser->first_name,
            'last_name' => $curUser->last_name,
            'email' => $curUser->email,
            'roles' => $curUser->roles,
            'level' => $curUser->level,
        ];
        $view = View::make('/profilecrud/index')->with('userData', $userData);
        return $view;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request){
        Auth::user()->update($request->all());
        return Redirect::back()->with('message','Operation Successful !');
    }
}
