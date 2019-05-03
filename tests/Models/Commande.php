<?php


namespace Tcgv2\Bo\Test\Models;


use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\ClientInterface;
use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Interfaces\DemarcheItemInterface;
use Tcgv2\Bo\Interfaces\DiscountInterface;

class Commande extends BaseModel implements CommandeInterface
{
    private $id;
    private $reference;
    private $client;
    private $montant;
    private $totalPaiement;
    private $moyenPaiement;
    private $demarcheItem;
    private $date_facturation;
    private $dateRelance;
    private $discount;
    private $paiements;
    private $notes;
    private $fraisPort;

    public function __construct()
    {
        parent::__construct();

        $this->id = $this->faker->numberBetween();
        $this->reference = $this->faker->word;
        $this->client = new Client();
        $this->montant = $this->faker->numberBetween(80, 600);
        $this->totalPaiement = $this->faker->numberBetween(80, 600);
        $this->moyenPaiement = $this->faker->randomElement(['monetico', 'payplug']);
        $this->demarcheItem = new DemarcheItem();
        $this->dateFacturation = Carbon::createFromFormat('Y-m-d', $this->faker->date());
        $this->dateRelance = Carbon::createFromFormat('Y-m-d', $this->faker->date());
        $this->discount = null;
        $this->paiements = collect();
        $this->notes = $this->generateNotes();

        $this->fraisPort = $this->faker->randomElement([0, 8.5]);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getTotalPaiement(): float
    {
        return $this->totalPaiement;
    }

    public function getMoyenPaiement(): string
    {
        return $this->moyenPaiement;
    }

    public function getDemarcheItem(): ?DemarcheItemInterface
    {
        return $this->demarcheItem;
    }

    public function getDateFacturation(): ?Carbon
    {
        return $this->dateFacturation;
    }

    public function getDateRelance(): ?Carbon
    {
        return $this->dateRelance;
    }

    public function getDiscount(): ?DiscountInterface
    {
        return $this->discount;
    }

    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function getNotes(): Collection
    {
        return $this->notes;
    }


    public function getFraisPort(): float
    {
        return $this->fraisPort;
    }


    private function generateNotes($nbre = null)
    {
        $notes = collect();
        if (is_null($nbre))
            $nbre = $this->faker->numberBetween(0, 5);

        for ($i = 0; $i < $nbre; $i ++) {
            $notes->push(new Note());
        }
        return $notes;
    }
}