<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:53
 */

namespace Tcgv2\Bo\Presenters;


use Tcgv2\Bo\Interfaces\CommandeInterface;

class CommandePresenter
{
    public $id;
    public $numero;
    public $client;
    public $demarche;
    public $montant;
    public $paiement;
    public $date;
    public $accessoires;
    public $discount;
    public $total_paiement;
    public $paiements;

    public function __construct(CommandeInterface $commande)
    {
        $this->id = $commande->id;
        $this->numero = $commande->reference;
        $this->client = $commande->client;
        $this->montant = $commande->montant;
        $this->paiement = $commande->moyenPaiement;
        $this->total_paiement = $commande->getTotalPaiement();
        $this->demarche = [
            'nom' => $commande->demarcheItem->nom,
            'class' => $commande->demarcheItem->statut->class,
            'statut' => $commande->demarcheItem->statut->nom,
            'info' => $commande->demarcheItem->info
        ];
        $this->date = $commande->date->format('d/m/Y');
        $this->discount = $commande->getDiscount();
        $this->date_relance = $commande->getDateRelance();
        $this->accessoires = '';
        $this->paiements = $commande->getPaiements();
    }
}