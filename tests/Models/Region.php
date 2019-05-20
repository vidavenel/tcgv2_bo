<?php
namespace Tcgv2\Bo\Test\Models;


use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\RegionInterface;

class Region extends BaseModel implements RegionInterface
{
    private $id;
    private $nom;
    private $departements;
    private $taxe;
    private $exoneration;

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->faker->randomNumber();
        $this->nom = $this->faker->word;

        $this->departements = collect();
        $nb_dep = $this->faker->numberBetween(2, 6);
        for ($i = 0; $i < $nb_dep; $i++) {
            $this->departements->push(new Departement());
        }

        $this->taxe = $this->faker->randomNumber(4) / 100;
        $this->exoneration = $this->faker->numberBetween(10, 100);
    }

    function getId(): int
    {
        return $this->id;
    }

    function getNom(): string
    {
        return $this->nom;
    }

    function getDepartements(): Collection
    {
        return $this->departements;
    }

    function getTaxes(): float
    {
        return $this->taxe;
    }

    function getExoneration(): int
    {
        return $this->exoneration;
    }
}