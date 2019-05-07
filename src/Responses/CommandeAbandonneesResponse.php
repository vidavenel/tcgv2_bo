<?php


namespace Tcgv2\Bo\Responses;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Presenters\CommandePresenter;

class CommandeAbandonneesResponse implements Responsable
{
    private $commandes;
    private $demarches;
    private $statuts;
    private $paiements;

    public function __construct(Collection $demarche = null, Collection $statuts= null, Collection $paiements= null)
    {
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
        return view('bo::commandes.list_abandonnees', [
            'demarches' => $this->demarches,
            'statuts' => $this->statuts,
            'paiements' => $this->paiements
        ]);
    }
}