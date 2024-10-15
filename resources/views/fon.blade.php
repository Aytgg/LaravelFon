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
                    <?php
setlocale(LC_TIME, 'turkish');
                    ?>
                    <div class="text-foreground-03 text-sm  " style="color: #e3dedeb3">
                        {{ strftime('%e %B %Y', strtotime($time)) }}
                    </div>
                    <div class="text-2xl font-semibold text-white">
                        <span class="inline-flex items-center tabular-nums">
                            {{ $fonPrice }}
                        </span>
                    </div>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Messages -->
            <li class="nav-item  mx-1 show">
                <div class="text-foreground-03 text-sm text-white">1 Aylık Getiri</div>
                <div class="text-2xl font-semibold " style="color: #e3dedeb3">
                    <span class="inline-flex items-center tabular-nums">%{{ $fonPriceDiffs['1Month'] }}</span>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <div class="text-foreground-03 text-sm text-white">3 Aylık Getiri</div>
                <div class="text-2xl font-semibold" style="color: #e3dedeb3">
                    <span class="inline-flex items-center tabular-nums">%{{ $fonPriceDiffs['3Month'] }}</span>
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

    <!-- AREA CHART & FONINFO -->
    <div class="row m-2">
        <div class="col-9">
            @include('widgets.areaChart')
        </div>
        <div class="col-3">
            @include('widgets.foninfo')
        </div>
    </div>
    <!-- BAR CHARTS -->
    <div class="row m-2">
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Fon Toplam Değer</h6>
                </div>
                <div class="card-body">
                    <p>{{ number_format(
    floatval(str_replace(',', '.', $fonPrice)) * $fonPayAdet,
    2,
    '.',
    ','
) }} ₺</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yatırımcı Sayısı</h6>
                </div>
                <div class="card-body">
                    <p>{{ number_format($fonYatirimciSayisi, 0, '.', ',') }}</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dolaşımdaki Pay Adedi</h6>
                </div>
                <div class="card-body">
                    <p>{{ number_format($fonPayAdet, 0, '.', ',') }}</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hacim Bilgileri</h6>
                </div>
                <div class="card-body">
                    <div class="divide-y divide-stroke-01">
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">Toplam Adet</span>
                            <span class="float-right text-foreground-02 truncate">18,75 mr</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">Aktif Adet</span>
                            <span class="float-right text-foreground-02 truncate">7,68 mr</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">Doluluk Oranı</span>
                            <span class="float-right text-foreground-02 truncate">%40,96</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">Pazar Payı</span>
                            <span class="float-right text-foreground-02 truncate">%7,84</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- STATICS & GETİRİ BİLGİLERİ -->
    <div class="row m-2">
        <div class="col-3">
            <div class="card rounded-lg overflow-hidden mb-4 md:mb-0 bg-background-adaptive-01 border border-stroke-01">
                <div class="card-header text-primary font-weight-bold mb-3 font-bold py-3 px-4 text-foreground-01">En
                    Büyük Pozisyonlar</div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/ALARK">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Alarko Holding A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/alarko_icon.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">ALARK</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:09:43</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">83,20</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-success-solid-01">0,60</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/YKBNK">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Yapı ve Kredi Bankası A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/ykbnk_icon.jpg">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">YKBNK</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:09:42</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">25,34</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-0,39</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/SAHOL">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Hacı Ömer Sabancı Holding A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/sahol_icon.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">SAHOL</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:09:39</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">86,85</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-0,57</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card rounded-lg overflow-hidden mb-4 md:mb-0 bg-background-adaptive-01 border border-stroke-01">
                <div class="card-header text-primary font-weight-bold mb-3 font-bold py-3 px-4 text-foreground-01">Yakın
                    Zamanda Artırılanlar</div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/AKBNK">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Akbank T.A.Ş. Şirket Logosu" data-state="closed"
                                        loading="lazy" width="28" height="28" decoding="async" data-nimg="1"
                                        class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/akbnk_icon.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">AKBNK</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:12</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">53,20</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-1,30</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/YKBNK">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Yapı ve Kredi Bankası A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/ykbnk_icon.jpg">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">YKBNK</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:11</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">25,32</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-0,47</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/ALARK">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img alt="Alarko Holding A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/alarko_icon.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">ALARK</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:04</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">83,30</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-success-solid-01">0,73</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card rounded-lg overflow-hidden mb-4 md:mb-0 bg-background-adaptive-01 border border-stroke-01">
                <div class="card-header text-primary font-weight-bold mb-3 font-bold py-3 px-4 text-foreground-01">Yakın
                    Zamanda Azaltılanlar</div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/BTCIM">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img
                                        alt="Batıçim Batı Anadolu Çimento Sanayii A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/BTCIM.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">BTCIM</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:37</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">148,90</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-success-solid-01">0,88</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/BSOKE">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img
                                        alt="Batısöke Söke Çimento Sanayii T.A.Ş. Şirket Logosu" data-state="closed"
                                        loading="lazy" width="28" height="28" decoding="async" data-nimg="1"
                                        class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/BSOKE.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">BSOKE</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:33</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">50,50</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-0,20</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="h-[51px] block relative text-foreground-01 hover:bg-background-disabled"
                        href="/sirketler/AEFES">
                        <div class="py-1.5 px-4 flex justify-between items-center">
                            <div class="w-28">
                                <div class="flex space-x-1.5"><img
                                        alt="Anadolu Efes Biracılık ve Malt Sanayii A.Ş. Şirket Logosu"
                                        data-state="closed" loading="lazy" width="28" height="28" decoding="async"
                                        data-nimg="1" class="rounded sheadow-lg" style="color:transparent"
                                        src="https://storage.fintables.com/media/uploads/company-logos/AEFES.png">
                                    <div class="h-[28px]">
                                        <div class="text-foreground-01 text-sm mt-[-3px]">AEFES</div>
                                        <div class="text-foreground-03 text-[10px] -mt-0.5">11:12:36</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm tabular-nums flex flex-col items-end">
                                <div><span class="inline-flex items-center tabular-nums">182,40</span></div>
                                <div class="ml-2 w-11 text-[12px] -mt-0.5 text-right"><span
                                        class="inline-flex items-center tabular-nums"><span
                                            class="text-xs text-foreground-03 mr-1">%</span><span
                                            class="text-shared-danger-solid-01">-0,87</span></span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Getiri Bilgileri</h6>
                </div>
                <div class="card-body">
                    <div class="divide-y divide-stroke-01">
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">1 Ay</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['1Month'] }}</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">3 Ay</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['3Month'] }}</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">6 Ay</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['6Month'] }}</span>
                        </div>
                        <!-- <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">YTD</span>
                            <span class="float-right text-foreground-02 truncate">%???</span>
                        </div> -->
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">1 Yıl</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['1Year'] }}</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">3 Yıl</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['3Year'] }}</span>
                        </div>
                        <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                            <span class="text-foreground-03">5 Yıl</span>
                            <span class="float-right text-foreground-02 truncate">%{{ $fonPriceDiffs['5Year'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection