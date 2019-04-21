@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Client #{{ $client->id }}
                        — {{ $client->civilite }} {{ $client->nom }} {{ $client->prenom }}</h3>
                </div>
                <div class="box-body">
                    <h4></h4>
                    <dl class="dl-horizontal">
                        <dt>Adresse</dt>
                        <dd>{{ $client->adresse_1 }}</dd>
                        @if($client->adresse_2)
                            <dd>{{ $client->adresse_2 }}</dd>@endif
                        <dt>Téléphone</dt>
                        <dd>{{ $client->telephone }}</dd>
                        <dt>Email</dt>
                        <dd>{{ $client->client->email }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Paiements — {{ $commande->total_paiement }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            @foreach($paiements as $paiement)
                                {{ $paiement->type }} — {{ $paiement->montant }}<br>
                            @endforeach
                            Taxes {{ $demarcheItem->info['taxes']['total'] }} <br>
                            TOTAL TTC {{ $commande->total_paiement }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('admin.commande.facture', $commande->id) }}" target="_blank" type="button"
                               class="btn btn-primary">
                                <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Facture
                            </a>
                            <button class="btn btn-danger pull-right" type="button">
                                <i class="fa fa-trash"></i>&nbsp;&nbsp;Annuler la commande
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Email envoyés</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            @if($notifications->isNotEmpty())
                                @foreach($notifications as $k => $notification)
                                    <button data-toggle="modal" data-target="#a{{ substr($notification->id, 0, 6) }}"
                                            type="button" class="btn btn-default btn-xs"><i class="fa fa-eye"></i>
                                    </button> {{ $notification->created_at }} — {{ $notification->type }}<br>

                                    <div class="modal fade" id="a{{substr($notification->id, 0, 6)}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Default Modal</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @isset($notification->email)
                                                                @include($notification->email->view, $notification->email->viewData)
                                                            @endisset
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">CG - {{ $demarcheItem->demarche->nom }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <dl class="dl-horizontal">
                                @if(array_key_exists('vehicule', $demarcheItem->info))

                                    @foreach($demarcheItem->info['vehicule'] as $k => $info)
                                        <dt>{{ $k }}</dt>
                                        <dd>{{ $info }}</dd>
                                    @endforeach
                                @endif
                                <dt>Taxe</dt>
                                <dd>{{ $demarcheItem->info['taxes']['total'] }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{ route('admin.commande.incomplet', $commande->id) }}" type="button"
                               class="btn btn-danger"><i class="fa fa-check"></i>Dossier reçu
                                INCOMPLET</a>
                            <btn data-toggle="modal" data-target="#modal-default" type="button"
                                 class="btn btn-success pull-right"><i class="fa fa-check"></i>Dossier
                                reçu COMPLET
                            </btn>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <form action="{{ route('admin.commande.complet', $commande->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                                   checked>
                                            Accusé d'enregistrement
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"
                                                   disabled>
                                            CPI
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"
                                                   disabled>
                                            Mettre la commande en attente
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Pièce jointe</label>
                                    <input type="file" id="exampleInputFile" name="fichier">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
