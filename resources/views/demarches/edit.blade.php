@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.demarches.update', $demarche) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="nom">Nom de la demarche <span class="text-danger">*</span></label>
                        <input type="text" name="nom" id="nom" placeholder="Nom de la demarche" class="form-control" value="{!! $demarche->nom ?: old('nom')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="friendly_url">Url</label>
                        <input type="text" name="friendly_url" id="friendly_url" placeholder="Url" class="form-control" value="{!! $demarche->friendly_url ?: old('friendly_url')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="reference_ants">Reference ANTS</label>
                        <input disabled type="number" name="reference_ants" id="reference_ants" placeholder="Reference ANTS" class="form-control" value="{!! $demarche->reference_ants ?: old('reference_ants')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="icon_path">Icon</label>
                        <input disabled type="text" name="icon_path" id="icon_path" placeholder="Icon" class="form-control" value="{!! $demarche->icon_path ?: old('icon_path')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="icon_path">Description</label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{!! $demarche->description ?: old('description') !!}</textarea>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
