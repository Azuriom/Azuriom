function createLineChart(elementId, data, labelName) {
    new Chart(document.getElementById(elementId), {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: labelName,
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
                data: Object.values(data),
            }],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [{
                    reverse: true,
                    gridLines: {
                        color: "rgba(0,0,0,0.0)"
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 1000
                    },
                    display: true,
                    borderDash: [3, 3],
                    gridLines: {
                        color: "rgba(0,0,0,0.0)",
                        fontColor: "#fff"
                    }
                }]
            }
        }
    });
}

function createPieChart(elementId, data) {
    new Chart(document.getElementById(elementId), {
        type: 'doughnut',
        data: {
            labels: Object.keys(data),
            datasets: [{
                borderWidth: 5,
                borderColor: '#fff',
                data: Object.values(data),
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e9aa0b'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)',
            }],
        },
        options: {
            responsive: !window.MSInputMethodContext,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: '#fff',
                bodyFontColor: '#858796',
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 70
        }
    });
}
