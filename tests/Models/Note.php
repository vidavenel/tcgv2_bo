<?php


namespace Tcgv2\Bo\Test\Models;


use Carbon\Carbon;
use Tcgv2\Bo\Interfaces\NoteInterface;

class Note extends BaseModel implements NoteInterface
{
    private $id;
    private $texte;
    private $auteur;
    private $date;

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->faker->numberBetween();
        $this->texte = $this->faker->paragraph;
        $this->auteur = $this->faker->name;
        $this->date = Carbon::createFromFormat('Y-m-d', $this->faker->date());
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }
}