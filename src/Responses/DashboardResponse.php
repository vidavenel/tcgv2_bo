<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 03:50
 */

namespace Tcgv2\Bo\Responses;

use Illuminate\Contracts\Support\Responsable;
use Tcgv2\Bo\Presenters\UserPresenter;

class DashboardResponse implements Responsable
{
    private $totaux_url;
    private $commande_evolution;
    private $repartition;
    private $distribution;

    public function __construct($totaux_url, $commande_evolution, $distribution)
    {
        $this->totaux_url = $totaux_url;
        $this->commande_evolution = $commande_evolution;
        $this->distribution = $distribution;
        //$this->repartition = $repartition;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $data = [
            'admin' => new UserPresenter(),
            'totaux_url' => $this->totaux_url,
            'commande_evolution' => $this->commande_evolution,
            'repartition' => $this->repartition,
            'distribution' => $this->distribution
        ];
        return view('bo::dashboard', $data);
    }
}