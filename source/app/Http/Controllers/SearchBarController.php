<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Thread;
use App\Http\Requests;
use App\Category;
use App\Http\Controllers\Controller;
use DB;
class SearchBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function group(Request $request,$id)
    {
        $query=$request->input('query');
        $catId=  Category::where('name',$id)->first();
        if($catId!=null){
            $catId= $catId->catId;
        }
        else{
            $catId=0;
            //return "null";
        }
        if($catId!=0){
            $search =Group::where('gName','like',"%".$query."%")->where('catId',$catId)->get();
        }
        else{
            $search =Group::where('gName','like',"%".$query."%")->get();
        }
       $groups=array();
       foreach($search as $group){
           $category=Category::where('catId',$group->catId)->first();
            $groups[]=  $group->gName;
        }
        return json_encode($groups);
    }
    public function thread(Request $request,$id){
        $query=$request->input('query');
        $search= Thread::where('title','like',"%".$query."%")->get();
        $threads=array();
       foreach($search as $thread){
           //$category=Category::where('catId',$group->catId)->first();
            $threads[]=  $thread->title;
        }
        return json_encode($threads);
    }

    // *
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
     
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
