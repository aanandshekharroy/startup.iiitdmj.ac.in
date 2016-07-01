<?php

namespace App\Http\Controllers;

use View;
use App\Thread;
use App\Post;
use Auth;
class BaseController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
    	$threads=Thread::where('moderated',1)->orderBy('created_at','DESC')->take(3)->get();
    	View::share('threads',$threads);
    if(Auth::check()&&Auth::user()->isAdmin){

        $noOfThreads=Thread::where('moderated',0)->get();
        $noOfPosts=Post::where('moderated',0)->get();
    		
        View::share(['noOfThreads'=>$noOfThreads,'noOfPosts'=>$noOfPosts]);		
	    }
    }
}
