<div id="content-wrapper" class="d-flex flex-column" style="margin-top: 84px; margin-left: 77px;">
    <!-- Main Content -->
    <div id="content">
        <div id="menu-tabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="gunluk">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Günlük
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Günlük
                    @elseif (Request::segment(1) == 'fons')
                        FON > Günlük
                    @elseif(Request::segment(1) == 'cr')
                        CR > Günlük
                    @elseif(Request::segment(1) == 'stc')
                        STC > Günlük
                    @elseif(Request::segment(1) == null)
                        HOMEPAGE > Günlük
                    @else
                        {{ Str::upper(Request::path()) }} > Günlük
                    @endif
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="analiz">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Analiz
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Analiz
                    @elseif (Request::segment(1) == 'fon')
                        FON > Analiz
                        @include('fonAnaliz')
                        {{-- {{ ['App\Http\Controllers\FonController'::class, showFon()] }} --}}
                        {{-- {{ to_route('fon', ['fon_code' => 'IPB']) }} --}}
                        {{-- @include('fon', ['fon_code' => 'IPB']) --}}
                        {{-- {{ App\Http\Controllers\FonController::showFon('IPB') }} --}}
                    @elseif(Request::segment(1) == 'cr')
                        CR > Analiz
                    @elseif(Request::segment(1) == 'stc')
                        STC > Analiz
                    @elseif(Request::segment(1) == null)
                        HOMEPAGE > Analiz
                    @else
                        {{ Str::upper(Request::path()) }} > Analiz
                    @endif
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kiyas">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Kıyas
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Kıyas
                    @elseif (Request::segment(1) == 'fons')
                        FON > Kıyas
                    @elseif(Request::segment(1) == 'cr')
                        CR > Kıyas
                    @elseif(Request::segment(1) == 'stc')
                        STC > Kıyas
                    @elseif(Request::segment(1) == null)
                        HOMEPAGE > Kıyas
                    @else
                        {{ Str::upper(Request::path()) }} > Kıyas
                    @endif
                </div>
            </div>
        </div>
