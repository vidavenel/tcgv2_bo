@extends('bo::layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('bo::layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Demarches</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Nom</td>
                            <td class="col-md-3">Friendly_url</td>
                            <td class="col-md-2">Prix</td>
                            <td class="col-md-2">Status</td>
                            <td class="col-md-1"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($demarches as $demarche)
                            <tr style="cursor: pointer;" data-href="{{ route('admin.parametre.demarche_edit', $demarche->id) }}">
                                <td>{{ $demarche->id }}</td>
                                <td>{{ $demarche->nom }}</td>
                                <td>{{ $demarche->friendlyUrl }}</td>
                                <td>{{ $demarche->prix }}</td>
                                <td>
                                    <span class="badge bg-{{ $demarche->statut->class }}">{{ $demarche->statut->nom }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal_demarche" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form href="#">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="">×</span></button>
                        <h4 class="modal-title">Modification démarche</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nom_demarche">Nom</label>
                            <input class="form-control" id="nom_demarche" type="text">
                        </div>
                        <div class="form-group">
                            <label for="prix_demarche">Prix</label>
                            <input class="form-control" id="prix_demarche" type="number" step="0.01">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
