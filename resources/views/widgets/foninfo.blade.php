<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Fon Bilgileri</h6>
    </div>
    <div class="card-body">
        <?php
$fonDesc = json_encode($fon->description . "<br>[Kısalt]");
echo "<script>var fonDesc = $fonDesc;</script>";

use Illuminate\Support\Str;

$fonDescLess = json_encode(Str::limit($fon->description, 150, '<br>[Devamını gör]'));
echo "<script>var fonDescLess = $fonDescLess;</script>";
        ?>
        <p onclick="showMore(fonDesc, fonDescLess);" id="showMoreP">
            {!! Str::limit($fon->description, 150, '<br>[Devamını gör]') !!}
        </p>
        <script>
            function showMore(desc, shortDesc) {
                var showMoreP = document.getElementById('showMoreP');
                showMoreP.innerHTML = desc;

                showMoreP.setAttribute('onclick', 'showLess("' + shortDesc + '", "' + desc + '");');
            }
            function showLess(shortDesc, desc) {
                var showMoreP = document.getElementById('showMoreP');
                showMoreP.innerHTML = shortDesc;

                showMoreP.setAttribute('onclick', 'showMore("' + desc + '", "' + shortDesc + '");');
            }
        </script>
        <div class="divide-y divide-stroke-01">
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Fon Kodu
                </span>
                <span class="float-right text-foreground-02 truncate">
                    {{ $fon->code }}
                </span>
            </div>
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Kurucu
                </span>
                <span class="float-right text-foreground-02 truncate">
                    {{ $fon->author }}
                </span>
            </div>
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Yıllık Yönetim Ücreti
                </span>
                <span class="float-right text-foreground-02 truncate">
                    %2,10
                </span>
            </div>
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Risk Değeri
                </span>
                <span class="float-right text-foreground-02 truncate">
                    6
                </span>
            </div>
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Alış Valörü
                </span>
                <span class="float-right text-foreground-02 truncate">
                    1
                </span>
            </div>
            <div class="flex justify-between items-center h-9 space-x-4 text-sm">
                <span class="text-dark font-weight-bold text-foreground-03">
                    Satış Valörü
                </span>
                <span class="float-right text-foreground-02 truncate">
                    2
                </span>
            </div>

            <div class="flex py-4">
                <span
                    class="inline-flex items-center rounded-full font-medium mr-1 bg-shared-success-adaptive-02 text-foreground-01 px-2.5 py-1 text-sm">
                    @if ($fon->active == 1)
                        <svg width="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" class="mr-1 w-3.5 h-3.5">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-success font-weight-bold">
                            TEFAS'ta İşleme Açık
                        </span>
                    @else
                        <span class="text-danger font-weight-bold">
                            TEFAS'ta İşleme Kapalı
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>