$(document).ready(function () {
    //pie charts
    createPie("#pi-one .legend", "#pi-one .pie");
    createPie(".pie2.legend", ".pie2.pie");
    createPie(".pie3.legend", ".pie3.pie");
    //End pie charts
    // chart 4
    var ctx = document.getElementById("ch1").getContext('2d');
    var ch1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["M", "T", "W", "T"],
            datasets: [{
                label: 'apples',
                data: [12, 19, 3, 17],
                backgroundColor: "rgb(89, 106, 6)"
            }, {
                label: 'oranges',
                data: [30, 29, 5, 5],
                backgroundColor: "rgb(158, 148, 221)"
            }]
        }
    });
    // chart 5
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            datasets: [{
                data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                label: "Asia",
                backgroundColor: "rgb(89, 106, 6)",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'World population per region (in millions)'
            }
        }
    });
    //chart 6
    /*=========================================
User Acquisition
===========================================*/
    var acquisition = document.getElementById('acquisition');
    const options = {
        plugins: {
            legend: {
                display: false
            }
        }
    };
    var acChart = new Chart(acquisition, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ["4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],
            datasets: [
                {
                    label: "Referral",
                    backgroundColor: '#596a06',
                    borderColor: 'rgba(254, 196, 0,0)',
                    data: [78, 88, 68, 74, 50, 55, 25],
                    lineTension: 0.3,
                    pointBackgroundColor: 'rgba(254, 196, 0,0)',
                    pointHoverBackgroundColor: '#596a06',
                    pointHoverRadius: 3,
                    pointHitRadius: 30,
                    pointBorderWidth: 2,
                    pointStyle: 'rectRounded'
                },
                {
                    label: "Direct",
                    backgroundColor: '#c5c4c4',
                    borderColor: 'rgba(254, 196, 0,0)',
                    data: [88, 108, 78, 95, 65, 73, 42],
                    lineTension: 0.3,
                    pointBackgroundColor: 'rgba(254, 196, 0,0)',
                    pointHoverBackgroundColor: '#c5c4c4',
                    pointHoverRadius: 3,
                    pointHitRadius: 30,
                    pointBorderWidth: 2,
                    pointStyle: 'rectRounded'
                },
                {
                    label: "Social",
                    backgroundColor: '#9e94dd',
                    borderColor: 'rgba(41, 204, 151,0)',
                    data: [103, 125, 95, 110, 79, 92, 58],
                    lineTension: 0.3,
                    pointBackgroundColor: 'rgba(41, 204, 151,0)',
                    pointHoverBackgroundColor: '#9e94dd',
                    pointHoverRadius: 3,
                    pointHitRadius: 30,
                    pointBorderWidth: 2,
                    pointStyle: 'rectRounded'
                }
            ]
        },

        // Configuration options go here
        options: {
            legend: {
                display: true
            },

            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true
                    },
                    ticks: {
                        beginAtZero: true,
                    },
                }]
            },
            tooltips: {}
        }
    });
    document.getElementById('customLegend').innerHTML = acChart.generateLegend();
    $('.statistics-holder .collapse-btn').on('click',function (){
        $(this).parent().find('.collapse-body').fadeToggle(100);
    });

    //chart 7
    new Chart(document.getElementById("application_submitted_1"), {
        type: 'bar',
        data: {
            labels: ['Student', 'Tourist', 'Visitor'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#9e94dd9e',
                    '#c5c4c494',
                    '#596a06ad',
                ],
                borderColor: [
                    '#9e94dd',
                    '#c5c4c4',
                    '#596a06',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: false,
                },
            },
            responsive: true,
            scales: {
                x: {
                    type: 'linear',
                    stacked: false,
                },
                y: {
                    type: 'linear',
                    stacked: false
                }
            }
        }
    });

    //chart 8
    new Chart(document.getElementById("application_submitted_2"), {
        type: 'bar',
        data: {
            labels: ['Apply', 'Reject'],
            datasets: [{
                label: ['Apply'],
                data: [18, 16],
                backgroundColor: [
                    '#9e94dd9e',
                    '#c5c4c494',
                ],
                borderColor: [
                    '#9e94dd',
                    '#c5c4c4',
                ],
                borderWidth: 1
            },{
                label: ['Reject'],
                data: [15],
                backgroundColor: [
                    '#c5c4c494',
                ],
                borderColor: [
                    '#c5c4c4',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: false,
                },
            },
            responsive: true,
            scales: {
                x: {
                    type: 'linear',
                    stacked: false,
                },
                y: {
                    type: 'linear',
                    stacked: false
                }
            }
        }
    });

    //chart 9
    new Chart(document.getElementById("Most_Popular_Pathways"), {
        type: 'horizontalBar',
        data: {
            labels: ['Apply', 'Reject'],
            datasets: [{
                label: ['Apply'],
                data: [18, 16],
                backgroundColor: [
                    '#9e94dd9e',
                    '#c5c4c494',
                ],
                borderColor: [
                    '#9e94dd',
                    '#c5c4c4',
                ],
                borderWidth: 1
            },{
                label: ['Reject'],
                data: [15],
                backgroundColor: [
                    '#c5c4c494',
                ],
                borderColor: [
                    '#c5c4c4',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: false,
                },
            },
            responsive: true,
            scales: {
                x: {
                    type: 'linear',
                    stacked: false,
                },
                y: {
                    type: 'linear',
                    stacked: false
                }
            }
        }
    });


})

//pie charts
function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
}

function addSlice(sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append("<div class='slice " + sliceID + "'><span></span></div>");
    var offset = offset - 1;
    var sizeRotation = -180 + sliceSize;
    $(pieElement + " ." + sliceID).css({
        "transform": "rotate(" + offset + "deg) translate3d(0,0,0)"
    });
    $(pieElement + " ." + sliceID + " span").css({
        "transform": "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
        "background-color": color
    });
}

function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var sliceID = "s" + dataCount + "-" + sliceCount;
    var maxSize = 179;
    if (sliceSize <= maxSize) {
        addSlice(sliceSize, pieElement, offset, sliceID, color);
    } else {
        addSlice(maxSize, pieElement, offset, sliceID, color);
        iterateSlices(sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
    }
}

function createPie(dataElement, pieElement) {
    var listData = [];
    $(dataElement + " span").each(function () {
        listData.push(Number($(this).html()));
    });
    var listTotal = 0;
    for (var i = 0; i < listData.length; i++) {
        listTotal += listData[i];
    }
    var offset = 0;
    var color = [
        "#596a06",
        "#9e94dd",
        "#c5c4c4",
        "#839a0f",
        "#c1bbe9",
    ];
    for (var i = 0; i < listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(size, pieElement, offset, i, 0, color[i]);
        $(dataElement + " li:nth-child(" + (i + 1) + ")").css("border-color", color[i]);
        offset += size;
    }
}

//End pie charts



