<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
     Public function index(){
    	return view('project')->with('name' , 'Projects');
    }
} 
