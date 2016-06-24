<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Thread;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    public function welcome(){
        $threads=Thread::where('moderated',1)->orderBy('created_at','DESC')->get();
        return view('welcome')->with('threads',$threads);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/dashboard');
    }
}
