<?php


namespace Tcgv2\Bo\Responses\Parametres;


use Illuminate\Contracts\Support\Responsable;
use Tcgv2\Bo\Interfaces\DemarcheInterface;

class DemarcheEditResponse implements Responsable
{
    private $demarche;

    public function __construct(DemarcheInterface $demarche)
    {
        $this->demarche = $demarche;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return view('bo::demarches.edit', [
            'demarche' => $this->demarche
        ]);
    }
}