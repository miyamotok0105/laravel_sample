<?php

namespace App\Infrastructure\Repositories;

interface MonsterRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function changeById($id, $name, $voice);

    public function add($name, $voice);

    public function delete($id);
}
