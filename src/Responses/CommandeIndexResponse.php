<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:53
 */

namespace Tcgv2\Bo\Response;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Presenters\CommandePresenter;

class CommandeIndexResponse implements Responsable
{
    private $commandes;

    public function __construct(Paginator $commandes)
    {
        $commandes->getCollection()->transform(function (CommandeInterface $commande) {
            return new CommandePresenter($commande);
        });
        $this->commandes = $commandes;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param $request
     * @return Response
     */
    public function toResponse($request)
    {
        return view('bo::commandes.list', ['commandes' => $this->commandes]);
    }
}