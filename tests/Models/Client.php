<?php


namespace Tcgv2\Bo\Test\Models;


use Tcgv2\Bo\Interfaces\ClientInterface;

class Client extends BaseModel implements ClientInterface
{
    private $id;
    private $civilite;
    private $nom;
    private $prenom;
    private $adresse_1;
    private $adresse_2;
    private $cp;
    private $ville;
    private $telephone;
    private $email;

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->faker->numberBetween();
        $this->civilite = $this->faker->randomElement(['M.', 'Mme']);
        $this->nom = $this->faker->lastName;
        $this->prenom = $this->faker->firstName;
        $this->adresse_1 = $this->faker->sentence;
        $this->adresse_2 = '';
        $this->ville = $this->faker->city;
        $this->cp = $this->faker->postcode;
        $this->telephone = $this->faker->phoneNumber;
        $this->email = $this->faker->email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCivilite(): string
    {
        return $this->civilite;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAdresse_1(): string
    {
        return $this->adresse_1;
    }

    public function getAdresse_2(): ?string
    {
        return $this->adresse_2;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function getCp(): string
    {
        return $this->cp;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}