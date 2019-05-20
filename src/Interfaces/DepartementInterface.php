<?php


namespace Tcgv2\Bo\Interfaces;


interface DepartementInterface
{
    function getId(): int;

    function getNom(): string;

    function getCode(): string;
}