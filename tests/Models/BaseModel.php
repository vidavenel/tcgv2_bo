<?php


namespace Tcgv2\Bo\Test\Models;


use Faker\Factory;
use Faker\Generator;

class BaseModel
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function __get($name)
    {
        return $this->{"get".ucfirst($name)}();
    }
}