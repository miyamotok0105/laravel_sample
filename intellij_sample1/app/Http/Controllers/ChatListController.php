<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatListController extends Controller
{
    //コンストラクタ追加
    public function __construct()
    {
        $this->middleware('UnescapeJsonResponse');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = array(['id'=>'1', 'message'=>'今日の天気はなんですか？'], ['id'=>'2', 'message'=>'晴れですよ。']);
//        $items = array('id'=>'1', 'message'=>'!!!!!');
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id'   => 'required|max:10',
            'message'  => 'required|max:100',
        ]);

        $id = $request->input('id','');
        $id = $id + 1;
        $message = $request->input('message','');
        $message = $message."っぺ。";
        $item = ['id'=>$id, 'message'=>$message];
        return response()->json($item);
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
