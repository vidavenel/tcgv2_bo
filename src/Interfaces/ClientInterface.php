<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 05:06
 */

namespace Tcgv2\Bo\Interfaces;

/**
 * Interface ClientInterface
 * @package Tcgv2\Bo\Interfaces
 * @property string $nom
 * @property string $prenom
 */
interface ClientInterface extends BaseInterface
{
    public function getNom(): string;

    public function getPrenom(): string;
}