<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 05:07
 */

namespace Tcgv2\Bo\Interfaces;

/**
 * Interface DemarcheItemInterface
 * @package Tcgv2\Bo\Interfaces
 * @property string $nom
 * @property StatutInterface $statut
 */
interface DemarcheItemInterface extends BaseInterface
{
    public function getNom(): string;

    public function getStatut(): StatutInterface;
}