@extends('bo::layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content-header">
        <h1>Commandes #{{ $commande->id }}<small>payé le {{ $commande->date_facturation->format('d/m/Y') }} à  {{ $commande->date_facturation->format('H:i') }}</small></h1>
    </section>
    <section class="content container-fluid">
        @include('bo::layouts.errors-and-messages')
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Client #{{ $client->id }}
                        — {{ $client->civilite }} {{ $client->nom }} {{ $client->prenom }}</h3>
                    @if($commande->date_relance)
                    <span class="badge bg-green pull-right"><i class="fa fa-phone"></i></span>
                    @endif
                </div>
                <div class="box-body">
                    <h4></h4>
                    <dl class="dl-horizontal">
                        <dt>Adresse</dt>
                        <dd>{{ $client->adresse_1 }}</dd>
                        @if($client->adresse_2)<dd>{{ $client->adresse_2 }}</dd>@endif
                        <dd>{{ "$client->cp $client->ville" }}</dd>
                        <dt>Téléphone</dt>
                        <dd>{{ $client->telephone }}</dd>
                        <dt>Email</dt>
                        <dd><a href="mailto:{{ $client->email }}" style="font-weight: bold">{{ $client->email }}</a></dd>
                    </dl>
                </div>
                <div class="box-footer">
                    <a target="_blank" href="{{ route('admin.client.compte', $client->id) }}" class="btn btn-info pull-right" type="button">
                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Acceder au compte du client
                    </a>
                </div>
            </div>

            @if($commande->notes->isNotEmpty())
                @include('bo::commandes.show.notes_box', ['notes' => $commande->notes, 'create_url' => $commande->url['create_note']])
            @endif
        </div>
        <div class="col-md-4">

            @include('bo::commandes.show.paiement_box')

            <div class="box box-info">
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

        @include('bo::commandes.show.demarche_box')

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
