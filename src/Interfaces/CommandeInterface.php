<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 05:01
 */

namespace Tcgv2\Bo\Interfaces;


use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Interface CommandeInterface
 * @package Tcgv2\Bo\Interfaces
 * @property ClientInterface $client
 * @property int $id
 * @property string $reference
 * @property float $montant
 * @property string $moyenPaiement
 * @property DemarcheItemInterface $demarcheItem
 * @property Carbon $date
 */
interface CommandeInterface extends BaseInterface
{
    public function getId(): int;

    public function getReference(): string;

    public function getClient(): ClientInterface;

    public function getMontant(): float;

    public function getTotalPaiement(): float;

    public function getMoyenPaiement(): string;

    public function getDemarcheItem(): ?DemarcheItemInterface;

    public function getDate(): ?Carbon;

    public function getDateRelance(): ?Carbon;

    public function getDiscount(): ?DiscountInterface;

    public function getPaiements(): Collection;
}