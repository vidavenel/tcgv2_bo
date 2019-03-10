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
use Illuminate\Support\Collection;

class CommandeIndexResponse implements Responsable
{
    private $commandes;

    public function __construct(Paginator $commandes)
    {
        $this->commandes = $commandes;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return view('bo::commandes.list', ['commandes' => $this->commandes]);
    }
}