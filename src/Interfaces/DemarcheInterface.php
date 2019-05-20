<?php


namespace Tcgv2\Bo\Interfaces;


interface DemarcheInterface extends BaseInterface
{
    function getId(): int;

    function getNom(): string;

    function getFriendlyUrl(): string;

    function getPrix(): float;

    function getStatut(): StatutInterface;

    function getReferenceAnts(): string;

    function getDescription(): string;

    function getIconPath(): string;
}