<?php


namespace Tcgv2\Bo\Responses\Parametres;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Tcgv2\Bo\Interfaces\DemarcheInterface;

class DemarcheResponse implements Responsable
{
    private $demarches;

    public function __construct(Collection $demarches = null)
    {
        $this->demarches = $demarches ?: collect();
        $demarches->each(function (DemarcheInterface $demarche) {return true;});
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return view('bo::demarches.list', [
            'demarches' => $this->demarches
        ]);
    }
}