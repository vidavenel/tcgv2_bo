<?php


namespace Tcgv2\Bo\Test\Models;


use Tcgv2\Bo\Interfaces\DemarcheInterface;
use Tcgv2\Bo\Interfaces\StatutInterface;

class Demarche extends BaseModel implements DemarcheInterface
{
    private $id;
    private $nom;
    private $friendlyUrl;
    private $prix;
    private $statut;
    private $referenceAnts;
    private $description;
    private $iconPath;

    const DEMARCHES = [
        'Changemennt de propriétaire',
        'Changement de domicile',
        'Changement de nom',
        'Certificat provisoire',
        'Véhicule étranger + certificat provisoire'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->id = $this->faker->randomNumber();
        $this->nom = $this->faker->randomElement(self::DEMARCHES);
        $this->friendlyUrl = $this->faker->sentence;
        $this->prix = $this->faker->randomNumber(4) / 100;
        $this->referenceAnts = $this->faker->randomNumber();
        $this->description = $this->faker->sentence;
        $this->iconPath = $this->faker->word;

        $this->statut = new Statut();
    }

    function getId(): int
    {
        return $this->id;
    }

    function getNom(): string
    {
        return $this->nom;
    }

    function getFriendlyUrl(): string
    {
        return $this->friendlyUrl;
    }

    function getPrix(): float
    {
        return $this->prix;
    }

    function getStatut(): StatutInterface
    {
        return $this->statut;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    function getReferenceAnts(): string
    {
        return $this->referenceAnts;
    }

    function getIconPath(): string
    {
       return $this->iconPath;
    }
}