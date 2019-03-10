@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($demarches)
            <div class="box">
                <div class="box-body">
                    <h2>Demarches</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Nom</td>
                            <td class="col-md-3">Friendly_url</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-4">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($demarches as $demarche)
                            <tr>
                                <td>{{ $demarche->id }}</td>
                                <td>{{ $demarche->nom }}</td>
                                <td>{{ $demarche->friendly_url }}</td>
                                <td>@include('layouts.status', ['status' => $demarche->active])</td>
                                <td>
                                    <form action="{{ route('admin.demarches.destroy', $demarche->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.demarches.show', $demarche->id) }}" class="btn btn-default btn-sm" disabled="disabled"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{ route('admin.demarches.edit', $demarche->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm" disabled="disabled"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
