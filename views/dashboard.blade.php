@extends('bo::layouts.app')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-8">
            <button class="btn btn-default daterange" type="button" id="daterange"><span><i class="fa fa-calendar"></i></span><i class="fa fa-caret-down"></i></button>
            <canvas id="commande_client"></canvas>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-default daterange" type="button"><span><i class="fa fa-calendar"></i></span><i class="fa fa-caret-down"></i></button>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-xs-12"><div class="small-box bg-green">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Commandes validées</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>53</h3>

                            <p>Commandes abandonnées</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Commptes créés</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <canvas id="pie_chart"></canvas>
        </div>
        <div class="col-md-8">
            <button class="btn btn-default daterange" type="button"><span><i class="fa fa-calendar"></i></span><i class="fa fa-caret-down"></i></button>
            <canvas id="commande_horaire"></canvas>
        </div>
    </div>
</section>
@endsection