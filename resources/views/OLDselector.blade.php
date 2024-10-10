@extends('layouts.master')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h5 class="card-category">Fon Seçici</h5>
                            <h2 class="card-title">Lütfen aşağıdaki 2 fondan görüntülemek istediğinizi seçiniz</h2>
                            <hr>
                            <!-- CONTROLLER İLE FON COUNT ET DİNAMİKLEŞTİR -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <!-- make a button  -->
                            <a href="{{ route('fon', $fon_code='IBP') }}" class="btn btn-primary">IBP</a>
                        </div>
                        <div class="col-sm-3">
                            <!-- make a button  -->
                            <a href="{{ route('fon', $fon_code='IIH') }}" class="btn btn-primary">IIH</a>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection