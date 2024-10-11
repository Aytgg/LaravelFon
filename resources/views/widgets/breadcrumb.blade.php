<nav class="navbar navbar-dark bg-dark" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">
            <svg class="breadcrumb-item-white" width="17px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" aria-hidden="true" class="flex-shrink-0 h-4 w-4 text-foreground-02">
                <path
                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                </path>
                <path
                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                </path>
            </svg>
            <a class="text-white" href="/">Ana Sayfa</a>
        </li>
        @if ($ReqSeg1 = Request::segment(1))
            <li class="breadcrumb-item breadcrumb-item-white" aria-current="page">
                @if ($ReqSeg1 == 'fons')
                        Fonlar
                    </li>
                    @if ($ReqSeg2 = Request::segment(2))
                        <li class="breadcrumb-item breadcrumb-item-white">
                            <a href="./" class="text-white">
                                {{ $ReqSeg2 }}
                            </a>
                        </li>
                    @endif
                @endif
        @endif
    </ol>
</nav>