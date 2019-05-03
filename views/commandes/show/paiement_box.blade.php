<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Paiements — @prix($commande->total_paiement) € — {{ $commande->paiement }}</h3>
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt style="font-size: 1.5em;">Taxes</dt>
            <dd style="font-size: 1.5em; font-weight: bold">@prix($commande->total_taxes) €</dd>
            <br>

            <dt>Prestation</dt>
            <dd>@prix($commande->prestation) €</dd>

            @if($commande->frais_port)
            <dt>Frais de port</dt>
            <dd>@prix($commande->frais_port) €</dd>
            @endif

{{--
            <dt>Accessoire</dt>
            <dd>18.80 €</dd>
--}}

            @if($commande->discount)
            <dt><span class="badge bg-light-blue"><i class="fa fa-tag"></i></span> Code Promo</dt>
            <dd>5.00 € (TOP 5)</dd>
            @endif
            <br>
            <dt>TOTAL</dt>
            <dd>@prix($commande->montant) €</dd>
        </dl>
    </div>
    <div class="box-footer">
        <a href=" https://www.topcartegrise.fr/tcgadmin/commande/18334/facture " target="_blank" type="button" class="btn btn-primary">
            <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Facture
        </a>
        <button data-toggle="modal" data-target="#remboursement_modal" class="btn btn-danger pull-right" type="button">
            <i class="fa fa-trash"></i>&nbsp;&nbsp;Annuler la commande
        </button>
    </div>
</div>