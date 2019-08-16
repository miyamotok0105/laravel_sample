<?php
// declare (strict_types = 1);

namespace App\Infrastructure\Repositories;

// use App\Domain\Entities\GreetDictionary;
use App\Infrastructure\Repositories\IRepositories\IGreetDicRepositorys;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GreetDicRepositorys implements IGreetDicRepositorys {

    // public function selectGreet(): Collection
    public function selectGreet()
    {
        \Log::info("Rep Select");
        return DB::table('greet_dictionary')->select('greet_id', 'country_id', 'greet_msg')->get();
        // // \Log::info($temp);
        // return $temp;
        // return "!!!";
    }

    // public function SelectGreetByGreetId(int $greetId): Collection{
    //     return DB::table('greet_dictionary')
    //         ->select(['greet_id', 'country_id', 'greet_msg', 'created_at', 'updated_at'])
    //         ->where('greet_id', '=', $greetId)
    //         ->get();
    // }

    // public function InsertGreet(int $greetId, , string $query): Collection{
    //     $now = Carbon::now()->format('Y-m-d H:i:s');
    //     DB::transaction(function () {
    //         DB::table('greet_dictionary')
    //             ->insert([
    //                 'greet_id' => $greetId,
    //                 'country_id' => '001',
    //                 'greet_msg' => $query,
    //                 'created_at' => $now,
    //                 'updated_at' => $now,
    //             ]);
    //     }
    //     return Collection();
    // }

    // public function UpdateGreet(int $greetId, string $query): Collection{
    //     $now = Carbon::now()->format('Y-m-d H:i:s');
    //     DB::transaction(function () {
    //         DB::table('greet_dictionary')
    //             ->where('greet_id', $greetId)
    //             ->update([
    //                 'greet_msg' => $query,
    //                 'updated_at' => $now,
    //             ]);
    //     }
    //     return Collection();
    // }

    // public function DeleteGreet(int $greetId): Collection{
    //     DB::transaction(function () {
    //         DB::table('greet_dictionary')
    //             ->where('greet_id', $greetId)
    //             ->delete();
    //     return Collection();
    // }

}
