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

// Bar Chart Example

let myBarChart1, myBarChart2, myBarChart3;

let scales1 = {
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
};

let scales2 = {
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
};

let scales3 = {
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
};

var ctx1 = document.getElementById("ftdBarChart");
var ctx2 = document.getElementById("ysBarChart");
var ctx3 = document.getElementById("dpaBarChart");

setTimeout(() => {
    newChart(myBarChart1, ftdData, scales1, ctx1);
    newChart(myBarChart2, ysData, scales2, ctx2);
    newChart(myBarChart3, dpaData, scales3, ctx3);
}, 100);

async function newChart(chart, ftdData, scales, ctx) {
    chart = await new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["1", "2", "3", "4", "5", "6"],
            datasets: [
                {
                    label: "FTD",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: ftdData,
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
                            number_format(tooltipItem.yLabel) +
                            "₺"
                        );
                    },
                },
            },
        },
    });
}
