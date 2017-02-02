<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
     Public function index(){
    	return view('register')->with("name", "Register");;
    }
}
