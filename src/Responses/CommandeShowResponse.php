<?php


namespace Tcgv2\Bo\Responses;


use Illuminate\Contracts\Support\Responsable;
use Tcgv2\Bo\Interfaces\CommandeInterface;
use Tcgv2\Bo\Presenters\CommandePresenter;

class CommandeShowResponse implements Responsable
{
    /** @var CommandeInterface $commande */
    private $commande;
    private $notification;

    public function __construct(CommandeInterface $commande, $notification)
    {
        $this->commande = $commande;
        $this->notification = $notification;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $commande = new CommandePresenter($this->commande);
        return view('bo::commandes.show', [
            'commande' => $commande,
            'client' => $commande->client,
            'paiements' => $commande->paiements,
            'demarcheItem' => $commande->demarche,
            'notifications' => $this->notification
        ]);
    }
}