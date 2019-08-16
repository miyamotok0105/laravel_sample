<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Services\MonsterService;

class MonsterController extends Controller
{
    protected $monsterService;
    //コンストラクタ追加
    public function __construct(MonsterService $monsterService)
    {
        $this->middleware('UnescapeJsonResponse');
        $this->monsterService = $monsterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->monsterService->getAll();

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
        //insert処理
        $this->validate($request, [
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);
        $name = $request->name;
        $voice = $request->voice;
        $status = $this->monsterService->add($name, $voice);

        $ref = array('status' => $status);
        return response()->json($ref);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'id'   => 'required|max:10'
        ]);
        $id = $request->id;
        $item = $this->monsterService->getById($id);

        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request)
    {
        //update処理
        $this->validate($request, [
            'id'   => 'required|max:10',
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);

        $id = $request->id;
        $name = $request->name;
        $voice = $request->voice;
        $status = $this->monsterService->changeById($id, $name, $voice);

        $ref = array('status' => $status);
        return response()->json($ref);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (empty($id)) {
            $ref = array('status' => "invalied value.");
            return response()->json($ref);
        }
        $status = $this->monsterService->delete($id);

        $ref = array('status' => $status);
        return response()->json($ref);
    }
}
