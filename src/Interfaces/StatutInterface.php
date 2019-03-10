<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 05:10
 */

namespace Tcgv2\Bo\Interfaces;

/**
 * Interface StatutInterface
 * @package Tcgv2\Bo\Interfaces
 * @property string $nom
 * @property string $class
 */
interface StatutInterface extends BaseInterface
{
    public function getNom(): string;

    public function getClass(): string;
}