<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetService;
use Validator;

class GreetController extends Controller
{
    private $greetService;
    private $greetDic = array(); 

    //メソッドインジェクションでサービスをnewしてる。
    function __construct(GreetService $greetService) {

    // function __construct() {
        $this->greetService = $greetService;
        
        // $this->greet = $app()->make('greetService');
        // $this->greet = $this->greet()->make('greetService');

        
    }

    public function getMessage() {
        return $this->greetService->getMessage();
    }

    public function getMessageByCountry(Request $request, $country) {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:2'
        ]);
        return $this->greetService->getMessageByCountry($request->country);
    }

    public function postMessage(Request $request) {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:2',
            'query' => 'required|string|max:100',
        ]);
        array_push($this->greetDic, $request->input('query'));
        return $this->greetDic;
    }
    
}
