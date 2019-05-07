@extends('bo::layouts.app')

@section('content')
    @include('bo::layouts.breadcumb', ['title' => 'Liste commandes', 'subtitle' => 'Accessoire à envoyer'])
    <!-- Main content -->
    <section class="content container-fluid">
        @include('bo::layouts.errors-and-messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box box-body">
                        <table class="table table-bordered table-hover" id="datatable" style="width: 100%" data-ajax="{{ route('admin.commande.index', ['filter' => 'with_accessories']) }}">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Démarche</th>
                                <th></th>
                                <th>Montant</th>
                                <th>Paiement</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <select class="form-control" style="width: 100%" data-column="2">
                                        <option value="-1">--- tous ---</option>
                                        @forelse($demarches as $demarche)
                                            <option>{{ $demarche }}</option>
                                        @empty
                                            <option>Changement de propriétaire</option>
                                            <option>Changement de domicile</option>
                                            <option>Changement de nom</option>
                                            <option>Certificat provisoire</option>
                                            <option>Vehicule étranger + certificat provisoire</option>
                                        @endforelse
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" style="width: 100%" data-column="3">
                                        <option value="-1">--- tous ---</option>
                                        @forelse($statuts as $statut)
                                            <option>{{ $statut }}</option>
                                        @empty
                                            <option><span class="label label-warning">Documents non envoyés</span></option>
                                            <option><span class="label label-danger">Dossier incomplet</span></option>
                                            <option><span class="label label-success">Dossier complet</span></option>
                                        @endforelse
                                    </select>
                                </td>
                                <td></td>
                                <td>
                                    <select class="form-control" style="width: 100%" data-column="5">
                                        <option value="-1">--- tous ---</option>
                                        @forelse($paiements as $paiement)
                                            <option>{{ $paiement }}</option>
                                        @empty
                                            <option>monetico</option>
                                            <option>monetico_4x</option>
                                            <option>payplug</option>
                                        @endforelse
                                    </select>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <button class="btn btn-default pull-right" type="button" id="daterange"><span><i
                                                        class="fa fa-calendar"></i></span><i
                                                    class="fa fa-caret-down"></i></button>
                                    </div>
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
