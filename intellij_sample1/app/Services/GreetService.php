<?php
namespace App\Services;
 
class GreetService
{
 
  public static function getMessage()
  {
    return 'hello!!!';
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