@extends('bo::layouts.app')

@section('content')
    <section class="content">
        <form action="{{ route('admin.parametre.taxes_update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box box-info">
                <div class="box-body">
                    <h2>Taxes</h2>
                    <table class="table-hover table">
                        <thead>
                        <tr>
                            <th>Region</th>
                            <th>Département</th>
                            <th>Taxe</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr>
                                <td>{{ $region->nom }}</td>
                                <td>
                                    @foreach($region->departements as $k => $dep)
                                        @if($k != 0) - @endif {{ $dep->nom . "(" . $dep->code . ")" }}
                                    @endforeach
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="region[{{$region->id}}]" value="{{ $region->taxes }}">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="text-align: right">
                    <a href="{{ back() }}" class="btn btn-default">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </section>
@endsection