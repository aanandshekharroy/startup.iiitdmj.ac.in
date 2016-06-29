<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Thread;
use App\Post;
class DashboardController extends BaseController
{
    //
    public function __construct(){
    	parent::__construct();
    	$this->middleware('isAdmin');
    }
    public function index(){
    	$threads=Thread::where('moderated',0)->orderBy('created_at','DESC')->get();
        $moderated_threads=Thread::where('moderated',1)->orderBy('created_at','DESC')->get();
    	$posts=Post::where('moderated',0)->orderBy('created_at','DESC')->get();
        $moderated_posts=Post::where('moderated',1)->orderBy('created_at','DESC')->get();
    	return view('dashboard')
        ->with(['threads'=>$threads
            ,'posts'=>$posts
            ,'moderated_threads'=>$moderated_threads
            ,'moderated_posts'=>$moderated_posts]);
    }
}
