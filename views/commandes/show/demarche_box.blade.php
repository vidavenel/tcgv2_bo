<div class="col-md-4">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">CG - {{ $demarche->nom }} — <span style="font-weight: bold">{{ $demarche->immatriculation }}</span></h3>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">

                @if(array_key_exists('vehicule', $demarche->info))

                    @foreach($demarche->info['vehicule'] as $k => $info)
                        <dt>{{ $k }}</dt>
                        <dd>{{ $info }}</dd>
                    @endforeach
                @endif

                    @if(array_key_exists('departement', $demarche->info) && array_key_exists('code', $demarche->info['departement']))
                        <dt>Département</dt>
                        <dd>{{ $demarcheItem->info['departement']['code'] }}
                            — {{ $demarcheItem->info['departement']['nom'] }}</dd>
                    @endif
            </dl>
        </div>
        <div class="box-footer">
            <a href="#" type="button" class="btn btn-danger"><i class="fa fa-check"></i>Dossier reçu
                INCOMPLET</a>
            <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i>Dossier
                reçu COMPLET
            </button>
        </div>
    </div>
</div>