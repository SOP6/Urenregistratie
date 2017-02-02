<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    Public function index(){
    	return view('employee')->with('name' , 'employee');
    }
}
