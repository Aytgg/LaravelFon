<div id="content-wrapper" class="d-flex flex-column" style="margin-top: 84px; margin-left: 77px;">
    <!-- Main Content -->
    <div id="content">
        <div id="menu-tabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane @if (request('tab') == 'Gunluk' || request('tab' == null)) active @endif" id="gunluk">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Günlük
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Günlük
                    @elseif (Request::segment(1) == 'fon')
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
            <div role="tabpanel" class="tab-pane @if (request('tab') == 'Analiz') active @endif" id="analiz">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Analiz
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Analiz
                    @elseif (Request::segment(1) == 'fon')
                        <label for="fon_code">Fon seçiniz:</label>
                        <select name="fon_code" id="fon_code"
                            onchange="window.location.href=this.options[this.selectedIndex].value;">
                            @foreach (App\Models\Fon::all() as $f)
                                <option @if (request('fon_code') == $f->code) selected @endif
                                    value="{{ route('fon', ['tab' => 'Analiz', 'fon_code' => $f->code]) }}">
                                    {{ $f->code }} : {{ $f->name }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        @include('fonAnaliz')
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
            <div role="tabpanel" class="tab-pane @if (request('tab') == 'Kiyas') active @endif" id="kiyas">
                <div>
                    @if (Request::segment(1) == 'etf')
                        ETF > Kıyas
                    @elseif (Request::segment(1) == 'byf')
                        BYF > Kıyas
                    @elseif (Request::segment(1) == 'fon')
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
