<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Models\Monster;

class MonsterController extends Controller
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
        //追加
        $items = Monster::all();
        return response()->json($items);
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
        //追加

        //insert処理
        $this->validate($request, [
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);
        $monster = new Monster();
        $monster->name = $request->name;
        $monster->voice = $request->voice;
        $monster->save();
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //追加
        $item = Monster::find($id);
        return response()->json($item);
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
        //追加

        //update処理
        $this->validate($request, [
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);
        $monster = Monster::find($id);
        $monster->name = $request->name;
        $monster->voice = $request->voice;
        $monster->save();
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $monster = Monster::find($id);
        $monster->delete();
        return response()->json();
    }
}
