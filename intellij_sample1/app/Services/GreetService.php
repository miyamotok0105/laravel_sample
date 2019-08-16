<?php
namespace App\Services;

use App\Infrastructure\Repositories\GreetDicRepositorys;
use App\Infrastructure\Repositories\IRepositories\IGreetDicRepositorys;


class GreetService
{

  private $greetDicRepositorys;
   
  function __construct(IGreetDicRepositorys $greetDicRepositorys) {
    $this->greetDicRepositorys = $greetDicRepositorys;
    \Log::info("Service コンストラクタ");
    \Log::info(print_r($this->greetDicRepositorys));
    \Log::info(print_r(gettype($this->greetDicRepositorys)));

  }
  

  public static function getMessage()
  {
    \Log::info("Service getMessage");
    \Log::info($this->greetDicRepositorys->selectGreet());
    // $ref = $this->greetDicRepositorys->SelectGreet();
    return 'hello!!!';
    // return $ref;
  }

  public static function getMessageByCountry($country)
  {
    if ($country == "en") {
        return 'hello!!!';
    } elseif ($country == "ja") {
        return 'おはよう!!!';
    }
  }
 
}