@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Bootstrap WYSIHTML5
                            <small>Simple and fast</small>
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('admin.commande.incomplet', $commande->id) }}">
                    @csrf
                    <!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea class="textarea" placeholder="Place some text here" name="mail"
                                      style="width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                @include('admin.commandes.mail_dossier_incomplet')

                            </textarea>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('bootstrap-wysihml/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('bootstrap-wysihml/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
