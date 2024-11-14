@extends('layouts.master')

@section('content')

    <!-- SIDEBAR -->

    @include('widgets.sidedock')
    {{-- @include('widgets.sidebarOLD') --}}

    <!-- END OF SIDEBAR -->


    <!-- TOPBAR -->
    @include('widgets.menubar')

    <!-- BREADCRUMB -->
    {{-- <style>
        .breadcrumb-item-white {
            color: white !important;
        }
        </style>
    @include('widgets.breadcrumb') --}}
    <!-- END OF BREADCRUMB -->

    {{--
        @include('widgets.idk')
        --}}

    <!-- END OF TOPBAR -->


    @include('widgets.menuTabs')


<!-- Page level custom scripts -->
@endsection
