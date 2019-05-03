<?php


namespace Tcgv2\Bo\Interfaces;


use Carbon\Carbon;

interface NoteInterface extends BaseInterface
{
    public function getId(): int;

    public function getTexte(): string;

    public function getAuteur(): string;

    public function getDate(): Carbon;
}