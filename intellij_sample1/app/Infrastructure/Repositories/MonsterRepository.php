<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Monster;

class MonsterRepository implements MonsterRepositoryInterface
{
    protected $monster;

    /**
    * @param object $monster
    */
    public function __construct(Monster $monster)
    {
        $this->monster = $monster;
    }

    public function getAll()
    {
      $items = Monster::all();
      return $items;
    }

    public function getById($id)
    {
        $item = Monster::find($id);
        return $item;
    }

    public function changeById($id, $name, $voice)
    {
        $monster = Monster::find($id);
        $monster->name = $name;
        $monster->voice = $voice;
        $monster->save();

        $status = "ok";
        return $status;
    }

    public function add($name, $voice)
    {
        $monster = new Monster();
        $monster->name = $name;
        $monster->voice = $voice;
        $monster->save();

        $status = "ok";
        return $status;
    }

    public function delete($id)
    {
        $monster = Monster::find($id);
        $monster->delete();

        $status = "ok";
        return $status;
    }
}