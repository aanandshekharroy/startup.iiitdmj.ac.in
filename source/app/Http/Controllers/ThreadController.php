<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Thread;
use App\Post;
use App\User;
use Auth;
use Redirect;
class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $threads=Thread::where('moderated',1)->orderBy('created_at','DESC')->get();
        return view('threads')->with('threads',$threads);
    }
    public function getThreadUrl(Request $request){
        return json_encode(Thread::where('title',$request->input('title'))->pluck('tUrl'));
    }
    public function allow(Request $request){
        $tId=$request->input('tId');
        if($request->input('action')=="delete"){
            // Thread::where('tId',$tId)->delete();
            if(Thread::where('id',$tId)->delete()){
                return 1;
            }
            return 0;   
        }else if($request->input('action')=="allow"){
            if(Thread::where('id',$tId)->update(['moderated'=>1])){
                return 1;
            }
            return 0;   
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        
        $thread=new Thread;
        $thread->title=trim($request->input('title'));
        $thread->title=htmlspecialchars(preg_replace("/\s+/", " ", $thread->title));
        $thread->content=trim($request->input('content'));
        $thread->content=htmlspecialchars(preg_replace("/\s+/", " ", $thread->content));
        $thread->tUrl=ThreadController::createUrl($thread->title);
        $existingSameThread=Thread::where(['tUrl'=>$thread->tUrl,'moderated'=>1])->get()->first();
        if(!empty($existingSameThread)){
            $url="/threads/".$thread->tUrl;
            //var_dump($url);
            return redirect($url);
        }
        $flag=0;
        if(Auth::check()){
            if(Auth::user()->isAdmin){
                $thread->moderated=1;
                $thread->email=Auth::user()->email;
                $flag=1;        
            }
        }else{
            $thread->email=$request->input('email');    
        }
        $thread->save();
        return Redirect::back()->withErrors(['Your post is waiting moderator approval', 'flag']);

        // ThreadController::index_with_flag($flag);
        // return view('threads')->with('flag',$flag);
        // return redirect('/threads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //
        $thread=Thread::where(['tUrl'=>$url,'moderated'=>1])->first();
        if(!empty($thread)){
            //$posts=Post::where(['thread_id'=>$thread->tId,'moderated'=>1])->orderBy('created_at','DESC')->get();
            $posts = $thread->posts()->where(['moderated'=> 1])->orderBy('created_at','DESC')->get();
            return view('posts')->with(['posts'=>$posts,'thread'=>$thread]);    
        }else{
            return Redirect::back();
        }
        
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
    public function createUrl($str){

        for ($i=0;$i<strlen($str);$i++){
            echo ord($str[$i])+"<br>";
            $ascii=ord($str[$i]);
            if(!($ascii>=48&&$ascii<=57||$ascii>=65&&$ascii<=90||$ascii>=97&&$ascii<=122)){
                $str[$i]=' ';
            }
        }
        $str=trim($str);
        $str=preg_replace("/\s+/", " ", $str);
        $str=preg_replace("/\s+/", "-", $str);
        return $str;
    }
}
