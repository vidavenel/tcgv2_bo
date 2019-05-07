<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:53
 */

namespace Tcgv2\Bo\Responses;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Presenters\CommandePresenter;

class CommandeIndexResponse implements Responsable
{
    private $commandes;
    private $demarches;
    private $statuts;
    private $paiements;

    public function __construct(Paginator $commandes, Collection $demarche = null, Collection $statuts= null, Collection $paiements= null)
    {
        $commandes->getCollection()->transform(function (CommandeInterface $commande) {
            return new CommandePresenter($commande);
        });
        $this->commandes = $commandes;
        $this->demarches = $demarche ?: collect();
        $this->statuts = $statuts ?: collect();
        $this->paiements = $paiements ?: collect();
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param $request
     * @return Response
     */
    public function toResponse($request)
    {
        return view('bo::commandes.list', [
            'commandes' => $this->commandes,
            'demarches' => $this->demarches,
            'statuts' => $this->statuts,
            'paiements' => $this->paiements
        ]);
    }
}