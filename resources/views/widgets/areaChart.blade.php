<?php
use Illuminate\Support\Facades\DB;

$fonprices = array();

DB::table('fonprices')->where('fon_id', $fon->id)
    ->orderBy('date', 'desc')
    ->get()->each(function ($item) use (&$fonprices) {
        array_push($fonprices, $item);
    });

$dataforchart = json_encode($fonprices);
echo "<script>var dataforchart = $dataforchart;</script>";
?>

<!-- Area Chart -->
<div class="card shadow mb-4">
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
</div>