// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + "").replace(",", "").replace(" ", "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
}

// GET DATA FROM PHP AND USE IT

var ctxLine1 = document.getElementById("priceAreaChart");
var ctxLine2 = document.getElementById("volatilityAreaChart");
var myLineChart1, myLineChart2;

// Price Chart Part
var period = 0;

var normalData = dataforprice.slice(0, 7);
var dataArr = [];
var labels = Array.from({ length: 7 }, (_, i) => i + 1);

function reverseData(normalData) {
    dataArr = [];
    normalData.forEach((data) => {
        dataArr.push(data);
    });

    dataArr.reverse();

    return dataArr;
}

document.getElementsByName("options").forEach(function (radio) {
    radio.addEventListener("click", function () {
        period = parseInt(radio.id.slice(-1));
        switch (period) {
            case 0:
                normalData = dataforprice.slice(0, 7);
                labels = Array.from({ length: 7 }, (_, i) => i + 1);
                break;
            case 1:
                normalData = dataforprice.slice(0, 30);
                labels = Array.from({ length: 30 }, (_, i) => i + 1);
                break;
            case 2:
                normalData = dataforprice.slice(0, 30 * 3);
                labels = Array.from({ length: 30 * 3 }, (_, i) => i + 1);
                break;
            case 3:
                normalData = dataforprice.slice(0, 365);
                labels = Array.from({ length: 365 }, (_, i) => i + 1);
                break;
            case 4:
                normalData = dataforprice.slice(0, 365 * 3);
                labels = Array.from({ length: 365 * 3 }, (_, i) => i + 1);

                break;
            default:
                normalData = dataforprice.slice(0, 7);
                labels = Array.from({ length: 7 }, (_, i) => i + 1);
                break;
        }

        if (myLineChart1) myLineChart1.destroy();
        // if (ctxLine1) ctxLine1.destroy();

        setTimeout(() => {
            newLineChart(
                myLineChart1,
                reverseData(normalData),
                labels,
                scalesLine1,
                ctxLine1
            );
        }, 100);
    });
});
// Price Chart Part END

let scalesLine1 = {
    xAxes: [
        {
            time: {
                unit: "date",
            },
            gridLines: {
                display: false,
                drawBorder: false,
            },
            ticks: {
                maxTicksLimit: 30,
            },
        },
    ],
    yAxes: [
        {
            ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                    return number_format(value) + "₺";
                },
            },
            gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2],
            },
        },
    ],
};

let scalesLine2 = {
    xAxes: [
        {
            time: {
                unit: "date",
            },
            gridLines: {
                display: false,
                drawBorder: false,
            },
            ticks: {
                maxTicksLimit: 30,
            },
        },
    ],
    yAxes: [
        {
            ticks: {
                min: 20,
                max: 40,
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                    return number_format(value) + "₺";
                },
            },
            gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2],
            },
        },
    ],
};

// Area Chart Example

setTimeout(() => {
    newLineChart(
        myLineChart1,
        reverseData(normalData),
        labels,
        scalesLine1,
        ctxLine1
    );
    newLineChart(
        myLineChart2,
        reverseData(dataforvolatility),
        labels,
        scalesLine2,
        ctxLine2
    );
}, 100);

function newLineChart(chart, data, labels, scales, ctx) {
    if (chart) chart.destroy();
    chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Fiyat",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: data,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0,
                },
            },
            scales: scales,
            legend: {
                display: false,
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: "#6e707e",
                titleFontSize: 14,
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: "index",
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel =
                            chart.datasets[tooltipItem.datasetIndex].label ||
                            "";
                        return (
                            datasetLabel +
                            ": " +
                            number_format(tooltipItem.yLabel) +
                            "₺"
                        );
                    },
                },
            },
        },
    });
}
