<?php


namespace Tcgv2\Bo\Test\Models;


use Tcgv2\Bo\Interfaces\DepartementInterface;

class Departement extends BaseModel implements DepartementInterface
{
    private $id;
    private $nom;
    private $code;

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->faker->randomNumber();
        $this->nom = $this->faker->word;
        $this->code = $this->faker->randomNumber(2);
    }

    function getId(): int
    {
        return $this->id;
    }

    function getNom(): string
    {
        return $this->nom;
    }

    function getCode(): string
    {
        return $this->code;
    }
}