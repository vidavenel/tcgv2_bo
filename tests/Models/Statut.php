<?php


namespace Tcgv2\Bo\Test\Models;


use Tcgv2\Bo\Interfaces\StatutInterface;

class Statut extends BaseModel implements StatutInterface
{
    const STATUT = [
        ['class' => 'warning', 'nom' => 'Documents non envoyés'],
        ['class' => 'success', 'nom' => 'Documents complet'],
        ['class' => 'danger', 'nom' => 'Dossier incomplet'],
    ];

    private $nom;
    private $class;

    public function __construct()
    {
        parent::__construct();
        $statut = $this->faker->randomElement(self::STATUT);
        $this->nom = $statut['nom'];
        $this->class = $statut['class'];
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getClass(): string
    {
        return $this->class;
    }

}