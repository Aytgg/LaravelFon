@extends('layouts.master')

@section('content')

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mt-4 text-info">Görüntülenmek İstenen Fonu Seçin</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        @foreach ($fon_codes as $fon_code)

        <a href="/tr/fons/{{ $fon_code }}">
            <button class="btn btn-primary mx-3"><strong>{{ $fon_code }}</strong>  (TR)</button>
        </a>
            {{-- <div class="col-xl-6 col-md-12 mb-8">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $fon_code }}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $fon_code }} Fonunu Görüntülemek İçin Tıklayınız!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        @endforeach
    </div>
</div>

@endsection