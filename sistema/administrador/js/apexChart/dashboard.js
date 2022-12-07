// GRAFICO RADIAL - INDEX

// colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
// (dataColors = $("#dash-campaigns-chart").data("colors")) &&
//     (colors = dataColors.split(","));
// var options = {
//     chart: { height: 304, type: "radialBar" },
//     colors: colors,
//     series: [86, 36, 50],
//     labels: ["Total Sent", "Reached", "Opened"],
//     plotOptions: { radialBar: { track: { margin: 8 } } },
// };
// (chart = new ApexCharts(
//     document.querySelector("#dash-campaigns-chart"),
//     options
// )).render();

// GRAFICO RE - INDEX

// colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
// (dataColors = $("#dash-revenue-chart").data("colors")) &&
//     (colors = dataColors.split(","));
// var options = {
//     chart: { height: 321, type: "line", toolbar: { show: !1 } },
//     stroke: { curve: "smooth", width: 2 },
//     series: [
//         {
//             name: "Total Revenue",
//             type: "area",
//             data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33, 43],
//         },
//         {
//             name: "Total Pipeline",
//             type: "line",
//             data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43, 56],
//         },
//     ],
//     fill: { type: "solid", opacity: [0.35, 1] },
//     labels: [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "Jul",
//         "Aug",
//         "Sep",
//         "Oct",
//         "Nov",
//         "Dec",
//     ],
//     markers: { size: 0 },
//     colors: colors,
//     yaxis: [{ title: { text: "Revenue (USD)" }, min: 0 }],
//     tooltip: {
//         shared: !0,
//         intersect: !1,
//         y: {
//             formatter: function (o) {
//                 return void 0 !== o ? o.toFixed(0) + "k" : o;
//             },
//         },
//     },
//     grid: { borderColor: "#f1f3fa", padding: { bottom: 5 } },
//     legend: { fontSize: "14px", fontFamily: "14px", offsetY: 5 },
//     responsive: [
//         { breakpoint: 600, options: { yaxis: { show: !1 }, legend: { show: !1 } } },
//     ],
// };

// (chart = new ApexCharts(
//     document.querySelector("#dash-revenue-chart"),
//     options
// )).render();


// CONTENT RESUMEN

var spark1 = {
    chart: {
        id: 'spark1',
        group: '',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 2,
            opacity: 0.2,
        }
    },

    stroke: {
        curve: 'smooth'
    },
    markers: {
        size: 0
    },
    grid: {
        padding: {
            top: 20,
            bottom: 10,
            left: 80
        }
    },
    colors: ['#fff'],
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter(val) {
                    return '';
                }
            }
        }
    }
}

var spark2 = {
    chart: {
        id: 'spark2',
        group: '',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 2,
            opacity: 0.2,
        }
    },

    stroke: {
        curve: 'smooth'
    },
    grid: {
        padding: {
            top: 20,
            bottom: 10,
            left: 130
        }
    },
    markers: {
        size: 0
    },
    colors: ['#fff'],
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter(val) {
                    return '';
                }
            }
        }
    }
}

var spark3 = {
    chart: {
        id: 'spark3',
        group: '',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 2,
            opacity: 0.2,
        }
    },

    stroke: {
        curve: 'smooth'
    },
    markers: {
        size: 0
    },
    grid: {
        padding: {
            top: 20,
            bottom: 10,
            left: 104
        }
    },
    colors: ['#fff'],
    xaxis: {
        crosshairs: {
            width: 1
        },
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter(val) {
                    return '';
                }
            }
        }
    }
}

var spark4 = {
    chart: {
        id: 'spark4',
        // group: 'sparks',
        group: '',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 2,
            opacity: 0.2,
        }
    },

    stroke: {
        curve: 'smooth'
    },
    markers: {
        size: 0
    },
    grid: {
        padding: {
            top: 20,
            bottom: 10,
            left: 135
        }
    },
    colors: ['#fff'],
    xaxis: {
        crosshairs: {
            width: 1
        },
    },
    tooltip: {
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter(val) {
                    return '';
                }
            }
        }
    }
}

new ApexCharts(document.querySelector("#spark1"), spark1).render();
new ApexCharts(document.querySelector("#spark2"), spark2).render();
new ApexCharts(document.querySelector("#spark3"), spark3).render();
new ApexCharts(document.querySelector("#spark4"), spark4).render();