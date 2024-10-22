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

var ctxLine1_1 = document.getElementById("priceArea7G");
var ctxLine1_2 = document.getElementById("priceArea1A");
var ctxLine1_3 = document.getElementById("priceArea3A");
var ctxLine1_4 = document.getElementById("priceArea1Y");
var ctxLine1_5 = document.getElementById("priceArea3Y");
var ctxLine2 = document.getElementById("volatilityAreaChart");
var ctxBar1 = document.getElementById("ftdBarChart");
var ctxBar2 = document.getElementById("ysBarChart");
var ctxBar3 = document.getElementById("dpaBarChart");
var ctxBar4 = document.getElementById("wh1000BarChart");

var myLineChart1_1,
    myLineChart1_2,
    myLineChart1_3,
    myLineChart1_4,
    myLineChart1_5,
    myLineChart2;
var myBarChart1, myBarChart2, myBarChart3, myBarChart4;

let scalesLine = [
    {
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
    },
    {
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
                    min: Math.min(...dataforvolatility),
                    max: Math.max(...dataforvolatility),
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
    },
];

let scalesBar = [
    {
        xAxes: [
            {
                time: {
                    unit: "month",
                },
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 6,
                },
                // maxBarThickness: 25,
            },
        ],
        yAxes: [
            {
                ticks: {
                    min: 200000000000,
                    max: 400000000000,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    // callback: function (value, index, values) {
                    //     return /*"$" + */number_format(value) + "₺";
                    // },
                    callback: function (value, index, values) {
                        return;
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
    },
    {
        xAxes: [
            {
                time: {
                    unit: "month",
                },
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 6,
                },
                // maxBarThickness: 25,
            },
        ],
        yAxes: [
            {
                ticks: {
                    min: 40000,
                    max: 100000,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    // callback: function (value, index, values) {
                    //     return /*"$" + */number_format(value) + "₺";
                    // },
                    callback: function (value, index, values) {
                        return;
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
    },
    {
        xAxes: [
            {
                time: {
                    unit: "month",
                },
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 6,
                },
                // maxBarThickness: 25,
            },
        ],
        yAxes: [
            {
                ticks: {
                    min: 400000000,
                    max: 1000000000,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    // callback: function (value, index, values) {
                    //     return /*"$" + */number_format(value) + "₺";
                    // },
                    callback: function (value, index, values) {
                        return;
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
    },
    // wh1000 Chart
    {
        xAxes: [
            {
                time: {
                    unit: "month",
                },
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 5,
                },
                // maxBarThickness: 25,
            },
        ],
        yAxes: [
            {
                ticks: {
                    // MIN-MAX DEĞİŞKEN DEĞİL
                    min: Math.min(...wh1000Data["3Month"]) - 1000,
                    max: Math.max(...wh1000Data["6Month"]) - 1000,
                    // maxTicksLimit: 17,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    // callback: function (value, index, values) {
                    //     return /*"$" + */number_format(value) + "₺";
                    // },
                    callback: function (value, index, values) {
                        return number_format(value + 1000) + "₺";
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
    },
];

var labelsLine = [
    Array.from({ length: 7 }, (_, i) => i + 1),
    Array.from({ length: 30 }, (_, i) => i + 1),
    Array.from({ length: 30 * 3 }, (_, i) => i + 1),
    Array.from({ length: 365 }, (_, i) => i + 1),
    Array.from({ length: 365 * 3 }, (_, i) => i + 1),
    Array.from({ length: dataforvolatility.length }, (_, i) => i + 1),
];
var labelsBar = [
    ["1", "2", "3", "4", "5", "6"],
    ["1", "2", "3", "4", "5"],
];

// wh1000 period selector & more
whPeriod = "1Month";
{
    document.getElementsByName("options").forEach(function (radio) {
        let period;
        radio.addEventListener("click", function () {
            period = parseInt(radio.id.slice(-1));
            switch (period) {
                case 9:
                    whPeriod = "1Month";
                    break;
                case 8:
                    whPeriod = "3Month";
                    break;
                case 7:
                    whPeriod = "6Month";
                    break;
                default:
                    console.log("Invalid period of (radio.id) :" + radio.id);
            }

            // if (myLineChart1) myLineChart1.destroy();
            // if (ctxLine1) ctxLine1.destroy();

            if (period > 6)
                newBarChart(
                    myBarChart4,
                    wh1000Data[whPeriod],
                    scalesBar[3],
                    labelsBar[1],
                    ctxBar4
                );
        });
    });

    for (let i = 0; i < 6; i++)
        ["1Month", "3Month", "6Month"].forEach((period) => {
            wh1000Data[period][i] -= 1000;
        });
}

// Call newChart functions
{
    // Price Charts
    {
        {
            // 7G
            newLineChart(
                myLineChart1_1,
                dataforprice['7G'],
                labelsLine[0],
                scalesLine[0],
                ctxLine1_1
            );
            // 1A
            newLineChart(
                myLineChart1_2,
                dataforprice['1A'],
                labelsLine[1],
                scalesLine[0],
                ctxLine1_2
            );
            // 3A
            newLineChart(
                myLineChart1_3,
                dataforprice['3A'],
                labelsLine[2],
                scalesLine[0],
                ctxLine1_3
            );
            // 1Y
            newLineChart(
                myLineChart1_4,
                dataforprice['1Y'],
                labelsLine[3],
                scalesLine[0],
                ctxLine1_4
            );
            // 3Y
            newLineChart(
                myLineChart1_5,
                dataforprice['3Y'],
                labelsLine[4],
                scalesLine[0],
                ctxLine1_5
            );
        }
        // Volatility Chart
        newLineChart(
            myLineChart2,
            dataforvolatility,
            labelsLine[5],
            scalesLine[1],
            ctxLine2
        );
    }

    // Bar Charts
    {
        // Triple Bar Charts
        newBarChart(myBarChart1, ftdData, scalesBar[0], labelsBar[0], ctxBar1);
        newBarChart(myBarChart2, ysData, scalesBar[1], labelsBar[0], ctxBar2);
        newBarChart(myBarChart3, dpaData, scalesBar[2], labelsBar[0], ctxBar3);
        // Wh1000 Chart
        newBarChart(
            myBarChart4,
            wh1000Data[whPeriod],
            scalesBar[3],
            labelsBar[1],
            ctxBar4
        );
    }
}

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

function newBarChart(chartVar, data, scales, labels, ctx) {
    chartVar = new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    // label: "FTD",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
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
                titleMarginBottom: 10,
                titleFontColor: "#6e707e",
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel =
                            chart.datasets[tooltipItem.datasetIndex].label ||
                            "";
                        return (
                            datasetLabel +
                            ": " +
                            number_format(tooltipItem.yLabel + 1000) +
                            "₺"
                        );
                    },
                },
            },
        },
    });
}
