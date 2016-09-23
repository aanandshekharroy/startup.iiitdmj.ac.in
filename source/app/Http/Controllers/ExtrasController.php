<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExtrasController extends BaseController
{
    //
    public function __construct(){
        parent::__construct();
    }
    public function facility(){
    	return view('facility');
    }
    public function contact_us(){
    	return view('contact_us');
    }
    public function tax_benefits(){
    	return view('tax_benefits');
    }
    public function workshop_1(){
        return view('workshop_1');
    }
}