<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Thread;
use App\Post;
use App\User;
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
        $threads=Thread::orderBy('created_at','DESC')->get();
        return view('threads')->with('threads',$threads);
    }
    public function getThreadUrl(Request $request){
        return json_encode(Thread::where('title',$request->input('title'))->pluck('tUrl'));
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
        $user=new User;
        $id=new \StdClass;
        if($request->has('name')&&$request->has('email')){
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->save();

        }
        $validator = Validator::make($request->all(), [
        'title' => trim($request->input('title')),
        'title' => 'required|unique:threads|max:255'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator,'createThreadErrors')
                        ->withInput();
        }
        $thread=new Thread;
        $thread->title=trim($request->input('title'));
        $thread->title=htmlspecialchars(preg_replace("/\s+/", " ", $thread->title));
        $thread->content=trim($request->input('content'));
        $thread->content=htmlspecialchars(preg_replace("/\s+/", " ", $thread->content));
        $thread->tUrl=ThreadController::createUrl($thread->title);
        if(!empty($user->id)){
            $thread->id=$user->id;
        }
        $existingSameThread=Thread::where('tUrl',$thread->tUrl)->get()->first();
        if(!empty($existingSameThread)){
            $url="/threads/".$thread->tUrl;
            //var_dump($url);
            return redirect($url);
        }
        $thread->save();
            $url="/threads/".$thread->tUrl;
            //var_dump($url);
            return redirect($url);
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
        $thread=Thread::where('tUrl',$url)->first();
        $posts=Post::where('tId',$thread->tId)->orderBy('created_at','DESC')->get();
        return view('posts')->with(['posts'=>$posts,'thread'=>$thread]);
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
