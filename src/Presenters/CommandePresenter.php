<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:53
 */

namespace Tcgv2\Bo\Presenters;


use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Interfaces\DemarcheItemInterface;

class CommandePresenter
{
    public $id;
    public $numero;
    public $client;
    public $demarche;
    public $montant;
    public $paiement;
    public $date_facturation;
    public $accessoires;
    public $discount;
    public $total_paiement;
    public $paiements;
    public $total_taxes;
    public $notes;
    public $prestation;
    public $date_relance;
    public $frais_port;

    public $url;

    public function __construct(CommandeInterface $commande)
    {
        $this->id = $commande->id;
        $this->numero = $commande->reference;
        $this->montant = $commande->montant;
        $this->paiement = $commande->moyenPaiement;
        $this->total_paiement = $commande->getTotalPaiement();
        $this->date_facturation = $commande->dateFacturation;
        $this->discount = $commande->getDiscount();
        $this->total_taxes = $commande->demarcheItem->getTotalTaxes();
        $this->prestation = $commande->demarcheItem->getPrestation();
        $this->frais_port = $commande->getFraisPort();

        $this->client = $commande->client;
        $this->date_relance = $commande->getDateRelance();

        $this->demarche = $commande->demarcheItem;

        $this->accessoires = '';

        $this->paiements = $commande->getPaiements();

        $this->notes = $commande->notes;

        $this->url = [
            'create_note' => url('tcgadmin/commande/'.$this->id.'/note'),
            'show_facture' => url('tcgadmin/commande/'.$this->id.'/facture')
        ];
    }
}