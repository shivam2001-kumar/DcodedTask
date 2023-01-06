<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('user.blog');
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
        $data= blog::create([
            'title'=>$request->title,
            'description'=>$request->desc,
            'user_id'=>$request->user_id,

        ]);

        if($data->save()){
            return redirect()->back()->with('success','Your Blog created Successfully !');
        }
        else{
            return redirect()->back()->with('danger','Your Blog not created Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blog_data=blog::where('user_id',$id)->get();
      return view('user.showblog',compact('blog_data'));
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
  $data=blog::where('id',$id)->first();
        return view('user.editblog',compact('data'));
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
        $data= blog::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->desc,
            'user_id'=>$request->user_id
        ]);
        if($data){
            return redirect()->back()->with('success','Your Blog update Successfully !');
        }
        else{
            return redirect()->back()->with('danger','Your Blog not update Successfully!');
        }
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
        blog::destroy($id);
        $msg = "User Deleted successful! ";
        return redirect('blog')->with('msg', $msg);
    }

   
}
