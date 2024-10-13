@extends('layouts.master', ['fc' => $fon->code])

@section('content')

<div class="content">
    <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
        <div class="d-sm-flex align-items-center  mb-4">
            <img class="mr-2" width="55"
                src="https://storage.fintables.com/media/uploads/fund-management-logos/istanbul_portfoy.png">
            <div>
                <h1 class="h2 mb-0 text-white">{{$fon->code}}</h1>
                <h2 class="h4 mb-1 " style="color: #e3dedeb3">{{$fon->name}}</h2>
                <div class="container mx-auto px-4 md:px-0 overflow-x-auto overflow-y-hidden">
                </div>
            </div>
        </div>
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item  no-arrow mx-1">
                <div>
                    <div class="text-foreground-03 text-sm  " style="color: #e3dedeb3">10 Ekim 2024</div>
                    <div class="text-2xl font-semibold text-white">
                        <span class="inline-flex items-center tabular-nums">0,567620</span>
                    </div>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Messages -->
            <li class="nav-item  mx-1 show">
                <div class="text-foreground-03 text-sm text-white">1 Aylık Getiri</div>
                <div class="text-2xl font-semibold " style="color: #e3dedeb3">
                    <span class="inline-flex items-center tabular-nums">%-5,98</span>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <div class="text-foreground-03 text-sm text-white">3 Aylık Getiri</div>
                <div class="text-2xl font-semibold" style="color: #e3dedeb3">
                    <span class="inline-flex items-center tabular-nums">%-5,98</span>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="flex" aria-label="Tabs">
        <a class="text-black whitespace-nowrap text-foreground-02 hover:foreground-01 py-4 px-4 text-sm relative border-b-2 border-transparent hover:border-stroke-02 font-medium hover:text-foreground-01 flex items-center !text-foreground-01 !border-shared-brand-solid-01"
            href="/fon/{{$fon->code}}">Özet Rapor</a>
        <a class="text-black whitespace-nowrap text-foreground-02 hover:foreground-01 py-4 px-4 text-sm relative border-b-2 border-transparent hover:border-stroke-02 font-medium hover:text-foreground-01 flex items-center"
            href="/fon/{{$fon->code}}/portfoy">Hisse Portföyü</a>
        <a class="text-black whitespace-nowrap text-foreground-02 hover:foreground-01 py-4 px-4 text-sm relative border-b-2 border-transparent hover:border-stroke-02 font-medium hover:text-foreground-01 flex items-center"
            href="/fon/{{$fon->code}}/akis">Akış</a>
        <a class="text-black whitespace-nowrap text-foreground-02 hover:foreground-01 py-4 px-4 text-sm relative border-b-2 border-transparent hover:border-stroke-02 font-medium hover:text-foreground-01 flex items-center"
            href="/fon/{{$fon->code}}/rakip-analizi">Rakip Analizi</a>
    </nav>

    <div class="row ml-1 my-3">
        @include('fonPricePeriod', $fon)
    </div>

    <div class="row m-2">
        <div class="col-8">
            @include('widgets.chart')
        </div>
        <div class="col-4">
            @include('widgets.foninfo')
        </div>
    </div>
</div>



@endsection