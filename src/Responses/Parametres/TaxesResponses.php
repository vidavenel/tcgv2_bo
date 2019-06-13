<?php


namespace Tcgv2\Bo\Responses\Parametres;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;

class TaxesResponses implements Responsable
{
    private $regions;

    public function __construct(Collection $regions)
    {
        $this->regions = $regions;
    }


    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return view('bo::parametres.taxes.show', [
            'regions' => $this->regions
        ]);
    }
}