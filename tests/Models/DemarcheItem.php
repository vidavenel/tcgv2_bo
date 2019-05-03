<?php


namespace Tcgv2\Bo\Test\Models;


use Tcgv2\Bo\Interfaces\DemarcheItemInterface;
use Tcgv2\Bo\Interfaces\StatutInterface;

class DemarcheItem extends BaseModel implements DemarcheItemInterface
{
    private $id;
    private $nom;
    private $statut;
    private $info;
    private $taxes;
    private $prestation;
    private $immatriculation;

    const DEMARCHE = ['Changement adresse', 'Changement titulaire', 'Changement nom', 'Demande de duplicata'];

    public function __construct()
    {
        parent::__construct();

        $_regionale = $this->faker->numberBetween(40, 480);

        $this->id = $this->faker->numberBetween();
        $this->nom = $this->faker->randomElement(self::DEMARCHE);
        $this->statut = new Statut();
        $this->info = [];
        $this->taxes = [
            'regionale' => $_regionale,
            'parafiscale' => 0,
            'co2' => 0,
            'supplementaire' => 0,
            'gestion' => 4,
            'acheminement' => 2.76,
            'total' => $_regionale + 4 + 2.76
        ];
        $this->prestation = $this->faker->numberBetween(29, 70);
        $this->immatriculation = $this->generateImmatriculation();
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getStatut(): StatutInterface
    {
        return $this->statut;
    }

    public function getInfo(): array
    {
        return $this->info;
    }

    public function getTotalTaxes(): float
    {
        return $this->taxes['total'];
    }

    public function getTaxes(): array
    {
        return $this->taxes;
    }

    public function getPrestation(): float
    {
        return $this->prestation;
    }

    public function getImmatriculation(): string
    {
        return $this->immatriculation;
    }

    private function generateImmatriculation()
    {
        $immat = $this->faker->randomLetter;
        $immat .= $this->faker->randomLetter;
        $immat .= "-";
        $immat .= $this->faker->randomNumber(3);
        $immat .= "-";
        $immat .= $this->faker->randomLetter;
        $immat .= $this->faker->randomLetter;
        return $immat;
    }
}