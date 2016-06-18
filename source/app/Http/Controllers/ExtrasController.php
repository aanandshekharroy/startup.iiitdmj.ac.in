<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExtrasController extends Controller
{
    //
    public function facility(){
    	return view('facility');
    }
    public function contact_us(){
    	return view('contact_us');
    }
    public function tax_benefits(){
    	return view('tax_benefits');
    }
}
