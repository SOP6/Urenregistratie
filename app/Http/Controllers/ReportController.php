<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
     Public function index(){
    	return  view('report')->with('name' , 'report')
    }

	Public function employeeReport(){
		return view('employee')->with('name' , 'employee')
	}
}
