@extends('bo::layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <!-- total-->
            <div class="col-md-4" id="print_totaux">
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-default daterange" type="button" data-ajax="{{ $totaux_url }}"><span><i class="fa fa-calendar"></i></span> <i class="fa fa-caret-down"></i></button>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-xs-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>??</h3>
                                <p>Commandes validées</p>
                            </div>
                            <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                        </div>
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>??</h3>
                                <p>Commandes abandonnées</p>
                            </div>
                            <div class="icon"><i class="fa fa-trash"></i></div>
                        </div>
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>??</h3>
                                <p>Commptes créés</p>
                            </div>
                            <div class="icon"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- evolution-->
            <div class="col-md-8" id="commande_evolution">
                <button class="btn btn-default daterange" type="button" data-ajax="{{ $commande_evolution }}"><span><i class="fa fa-calendar"></i></span> <i class="fa fa-caret-down"></i></button>
                <canvas id="commande_client"></canvas>
            </div>
        </div>
        <div class="row">
            <!-- repartition_compte-->
            <div class="col-md-4" id="repartition" data-ajax="{{ $repartition }}">
                <canvas id="pie_chart"></canvas>
            </div>
            <!-- distrution_horaire-->
            <div class="col-md-8">
                <button class="btn btn-default daterange" type="button"><span><i class="fa fa-calendar"></i></span> <i class="fa fa-caret-down"></i></button>
                <canvas id="commande_horaire"></canvas>
            </div>
        </div>
    </section>
@endsection