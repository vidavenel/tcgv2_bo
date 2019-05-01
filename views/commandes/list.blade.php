@extends('bo::layouts.app')

@section('content')
    @include('bo::layouts.breadcumb', ['title' => 'Liste commandes', 'subtitle' => 'Commandes validées'])
    <!-- Main content -->
    <section class="content container-fluid">
        @include('bo::layouts.errors-and-messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box box-body">
                        <table class="table table-bordered table-hover" id="datatable" style="width: 100%">
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
                                    <select class="form-control" style="width: 100%">
                                        <option>Changement de propriétaire</option>
                                        <option>Changement de domicile</option>
                                        <option>Changement de nom</option>
                                        <option>Certificat provisoire</option>
                                        <option>Vehicule étranger + certificat provisoire</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" style="width: 100%">
                                        <option><span class="label label-warning">Documents non envoyés</span></option>
                                        <option><span class="label label-danger">Dossier incomplet</span></option>
                                        <option><span class="label label-success">Dossier complet</span></option>
                                    </select>
                                </td>
                                <td></td>
                                <td>
                                    <select class="form-control" style="width: 100%">
                                        <option>monetico</option>
                                        <option>monetico_4x</option>
                                        <option>payplug</option>
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
                            <tbody>
                            @foreach($commandes as $commande)
                                <tr data-href="{{ route('admin.commande.show', $commande->id) }}" style="cursor: pointer">
                                    <td>{{ $commande->numero }}</td>
                                    <td>@if($commande->date_relance)<span class="badge bg-green"><i class="fa fa-phone"></i></span> @endif{{ $commande->client }}</td>
                                    <td>{{ $commande->demarche['nom'] }}</td>
                                    <td><span class="label label-{{ $commande->demarche['class'] }}">{{ $commande->demarche['statut'] }}</span>
                                    </td>
                                    <td>{{ $commande->montant }}@if($commande->discount)&nbsp;<span class="badge bg-light-blue"><i class="fa fa-tag"></i></span> @endif</td>
                                    <td>{{ $commande->paiement }}</td>
                                    <td>{{ $commande->date }}</td>
                                    <td>{{ $commande->accessoires }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $commandes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
