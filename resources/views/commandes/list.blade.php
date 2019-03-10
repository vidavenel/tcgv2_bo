@extends('bo::layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('bo::layouts.errors-and-messages')
        <div class="box">
            <div class="box-body">
                <h2>Commandes</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Client</td>
                        <td colspan="2">Démarche</td>
                        <td>Montant</td>
                        <td>Paiement</td>
                        <td>Date</td>
                        <td>Accessoires</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commandes as $commande)
                        <tr data-href="#">
                        <td>{{ $commande->numero }}</td>
                        <td>{{ $commande->client }}</td>
                        <td>{{ $commande->demarche['nom'] }}</td>
                            <td><span
                                    class="label label-{{ $commande->demarche['class'] }}">{{ $commande->demarche['statut'] }}</span>
                            </td>
                        <td>{{ $commande->montant }}</td>
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
    </section>
    <!-- /.content -->
@endsection
