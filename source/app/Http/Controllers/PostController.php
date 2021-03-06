<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;
use Redirect;
use Validator;
class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        parent::__construct();
        $this->middleware('isAdmin', ['only' => ['allow']]);
        // $this->middleware('auth'
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function allow(Request $request){
        $pId=$request->input('pId');
        if($request->input('action')=="delete"){
            // Thread::where('tId',$tId)->delete();
            if(Post::where('id',$pId)->delete()){
                return 1;
            }
            return 0;   
        }else if($request->input('action')=="allow"){
            if(Post::where('id',$pId)->update(['moderated'=>1])){
                return 1;
            }
            return 0;   
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!(Auth::check()&&Auth::user()->isAdmin)){
            $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator,'createPostErrors')
                            ->withInput();
            }    
        }
        
        $post=new Post;
        $post->content=($request->input('content'));
        $post->thread_id=$request->input('tId');
        $post->email=$request->input('email');
        if(Auth::check()){
            if(Auth::user()->isAdmin){
                $post->moderated=1;
                $post->email=Auth::user()->email;
                $post->name=Auth::user()->name;
            }
        }else{
            $post->email=$request->input('email'); 
            $post->name=$request->input('name');       
        }
        $post->save();
        return Redirect::back()->withErrors(["Your post is awaiting moderators approval", 'flag']);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
