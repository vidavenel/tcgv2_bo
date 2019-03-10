<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:53
 */

namespace Tcgv2\Bo\Presenters;


use Tcgv2\Bo\Interfaces\CommandeInterface;

class CommandeLightPresenter
{
    public $id;
    public $numero;
    public $client;
    public $demarche;
    public $montant;
    public $paiement;
    public $date;
    public $accessoires;

    public function __construct(CommandeInterface $commande)
    {
        $this->id = $commande->id;
        $this->numero = $commande->reference;
        $this->client = $commande->client->prenom . " " . $commande->client->prenom;
        $this->montant = $commande->montant;
        $this->paiement = $commande->moyenPaiement;
        $this->demarche = [
            'nom' => $commande->demarcheItem->nom,
            'class' => $commande->demarcheItem->statut->nom,
            'statut' => $commande->demarcheItem->statut->class,
        ];
        $this->date = $commande->date->format('d/m/Y');
        $this->accessoires = '';
    }
}