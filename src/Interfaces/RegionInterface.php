<?php


namespace Tcgv2\Bo\Interfaces;


use Illuminate\Support\Collection;

interface RegionInterface extends BaseInterface
{
    function getId(): int;

    function getNom(): string;

    function getDepartements(): Collection;

    function getTaxes(): float;

    function getExoneration(): int;
}