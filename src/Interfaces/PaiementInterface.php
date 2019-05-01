<?php


namespace Tcgv2\Bo\Interfaces;


interface PaiementInterface extends BaseInterface
{
    public function getId(): int;

    public function getType(): string;

    public function getMontant(): float;
}