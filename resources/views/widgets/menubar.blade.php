{{-- <style>
    .hidden-nav {
        height: 66px;
    }

    @media (min-width: 1275px) {
        .hidden-nav {
            height: 66px;
        }
    }

    @media (min-width: 768px) {
        .hidden-nav {
            height: 90px;
        }
    }
</style> --}}

{{-- <nav class="navbar navbar-expand-md hidden-nav ">.</nav> --}}
{{-- **
    * To make Breadcrumb visible
    * --}}

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary pb-md-0">

    {{-- HAMBURGER MENU ON MOBILE --}}
    <a class="flex space-x-1.5 items-center flex-grow outline-none" href="/">
        <img alt="Fintables Logo" loading="lazy" width="42" height="42" decoding="async" data-nimg="1"
            style="color:transparent" src="{{ asset('/img/logo.jpg') }}">
    </a>
    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="main-nav" class="collapse navbar-collapse justify-content-center">

        <ul class="nav w-100">
            {{-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li> --}}
            <li class="nav-item dropdown w-10 border border-bottom-0 rounded-top mx-1 ml-4 d-flex justify-content-center"
                @if (Request::Segment(1) == 'fons') style="background-color: rgba(133, 135, 150, 0.5)!important;" @endif>
                <a href="#"
                    class="nav-tabs nav-link text-white  d-flex justify-content-center flex-column align-items-center"
                    data-toggle="dropdown" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                    </svg>
                    <span class="font-weight-bold">
                        Günlük
                    </span>
                    {{-- FIND SVG ICONS FROM GETBOOTSTRAP NOT SVGREPO --}}
                </a>
                <ul class="dropdown-menu dropdown-menu-center">
                    <li>
                        <a href="{{ route('routeMe2', ['seg1' => Request::segment(1), 'seg2' => 'IPB']) }}" class="dropdown-item">
                            IPB
                        </a>    
                    </li>
                    <li>
                        <a href="{{ route('routeMe2', ['seg1' => Request::segment(1), 'seg2' => 'IIH']) }}" class="dropdown-item">
                            IIH
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Fon 1.3
                        </a>
                    </li>
                    {{-- <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Separated link
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item dropdown w-10 border border-bottom-0 rounded-top mx-1 d-flex justify-content-center">
                <a href="#"
                    class="nav-tabs nav-link text-white  d-flex justify-content-center flex-column align-items-center
                                    @if (Request::Segment(2) == 'newMenu') active @endif"
                    data-toggle="dropdown" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <span class="font-weight-bold">
                        Analiz
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-center">
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 2.1
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 2.2
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 2.3
                        </a>
                    </li>
                    {{-- <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Separated link
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item dropdown w-10 border border-bottom-0 rounded-top mx-1 d-flex justify-content-center">
                <a href="#"
                    class="nav-tabs nav-link text-white  d-flex justify-content-center flex-column align-items-center
                                    @if (Request::Segment(2) == 'newMenu') active @endif"
                    data-toggle="dropdown" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                    </svg>
                    <span class="font-weight-bold">
                        Kıyas
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-center">
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 3.1
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 3.2
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Sekme 3.3
                        </a>
                    </li>
                    {{-- <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item">
                            Separated link
                        </a>
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
        </ul>

        {{-- <ul class="navbar-nav justify-content-start w-100">
            <li class="dropdown border w-10 text-center rounded-top
                        @if (Request::Segment(2) == 'fons') active bg-secondary @endif
                        ">
                <a href="#" class="nav-item nav-link" data-toggle="dropdown">
                    Günlük
                </a>
                <div class="dropdown-menu hover-dropdown hover-dropdown">
                    <a href="#" class="dropdown-item">
                        Dropdown Item 1
                    </a>
                    <a href="#" class="dropdown-item">
                        Dropdown Item 2
                    </a>
                    <a href="#" class="dropdown-item">
                        Dropdown Item 3
                    </a>
                </div>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    Ana Sayfa
                </a>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    Hakkımızda
                </a>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    İletişim
                </a>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    Bilmem Ne
                </a>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    Aynen Bu
                </a>
            </li>
            <li class="w-10 mx-2 text-center">
                <a href="#" class="nav-item nav-link border rounded-top">
                    Smt Else
                </a>
            </li>
        </ul> --}}
    </div>
</nav>
