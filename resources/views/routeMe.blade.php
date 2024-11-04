@extends('layouts.master')

@section('content')
    {{-- Uri: '/{{ Request::path() }}' --}}

    @if (Request::Segment(1) != null)
        Uri: /{{ Request::Segment(1) }}
        @if (Request::Segment(2) != null)
            /{{ Request::Segment(2) }}
            @if (Request::Segment(3) != null)
                /{{ Request::Segment(3) }}
            @endif
        @endif
    @else
        Uri: /
    @endif
@endsection
