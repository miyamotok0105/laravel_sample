<?php
namespace App\Services;

//追加
// use App\Domain\Models\Monster;

//
use App\Infrastructure\Repositories\MonsterRepositoryInterface;
use App\Infrastructure\Repositories\MonsterRepository;

class MonsterService
{
  private $monsterRepository;
   
  function __construct(MonsterRepositoryInterface $monsterRepository) {
    $this->monsterRepository = $monsterRepository;
  }
  
  public function getAll(){
    return $this->monsterRepository->getAll();
  }

  public function getById($id){
    return $this->monsterRepository->getById($id);
  }

  public function changeById($id, $name, $voice){
    return $this->monsterRepository->changeById($id, $name, $voice);
  }

  public function add($name, $voice){
    return $this->monsterRepository->add($name, $voice);
  }

  public function getMonster($name, $voice){
    return $this->monsterRepository->getMonster($name, $voice);
  }

  public function delete($id){
    return $this->monsterRepository->delete($id);
  }
  
}