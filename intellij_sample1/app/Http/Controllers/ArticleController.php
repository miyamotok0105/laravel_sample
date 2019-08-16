<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Domain\Models\Article;

class ArticleController extends Controller
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
//        $items = Article::all();
//        $items = Article::all()->take(5);
        $items = Article::orderBy('id', 'desc')->get();
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
        //登録処理
        $this->validate($request, [
            'id'   => 'required|max:10',
            'user_id'  => 'required|max:10',
            'content'  => 'required|max:100',
            'title'  => 'required|max:100',
        ]);

        $article = new Article();
        $article->id = $request->input('id','');
        $article->user_id = $request->input('user_id','');
        $article->content = $request->input('content','');
        $article->title = $request->input('title','');
        $article->save();

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
        $item = Article::find($id);
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
