<?php


namespace Tcgv2\Bo\Interfaces;


interface DiscountInterface extends BaseInterface
{
    public function getCode(): string;

    public function getValeur(): float;
}