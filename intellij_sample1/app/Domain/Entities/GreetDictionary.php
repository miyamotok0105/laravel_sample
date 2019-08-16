<?php
declare (strict_types = 1);

namespace App\Domain\Entities;


class GreetDictionary
{
    /** @var int */
    private $greet_id;

    /** @var int */
    private $country_id;

    /** @var string */
    private $greet_msg;

    public function __construct(
        int $greet_id,
        int $country_id,
        string $greet_msg
    ) {
        $this->greet_id = $greet_id;
        $this->country_id = $country_id;
        $this->greet_msg = $greet_msg;
    }

    /**
     * @return int
     */
    public function getGreetId(): int
    {
        return $this->greet_id;
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @return string
     */
    public function getGreetMsg(): string
    {
        return $this->greet_msg;
    }

}
