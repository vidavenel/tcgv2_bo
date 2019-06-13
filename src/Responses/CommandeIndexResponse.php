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
    private $filter;
    private $demarches;
    private $statuts;
    private $paiements;

    /**
     * CommandeIndexResponse constructor.
     * @param Collection|null $demarche
     * @param Collection|null $statuts
     * @param Collection|null $paiements
     * @param string $filter
     */
    public function __construct(Collection $demarche = null, Collection $statuts= null, Collection $paiements= null, $filter = null)
    {
        $this->demarches = $demarche ?: collect();
        $this->statuts = $statuts ?: collect();
        $this->paiements = $paiements ?: collect();
        $this->filter = $filter;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param $request
     * @return Response
     */
    public function toResponse($request)
    {
        $params = [
            'demarches' => $this->demarches,
            'statuts' => $this->statuts,
            'paiements' => $this->paiements
        ];

        if ($this->filter === 'with_accessories') {
            return view('bo::commandes.list_with_accesories', $params);
        }
        return view('bo::commandes.list', $params);
    }
}