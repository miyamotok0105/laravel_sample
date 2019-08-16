<?php
// declare (strict_types = 1);

namespace App\Infrastructure\Repositories\IRepositories;

use Illuminate\Support\Collection;

interface IGreetDicRepositorys{
    //select
    // public function selectGreet(): Collection;
    public function selectGreet();

    // public function SelectGreetByGreetId(int $greetId): Collection;

    // //insert
    // public function InsertGreet(int $greetId, string $query): Collection;

    //update
    // public function UpdateGreet(int $greetId, string $query): Collection;

    //delete
    // public function DeleteGreet(int $greetId): Collection;
}