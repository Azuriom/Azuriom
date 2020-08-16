function createLineChart(elementId, data, labelName) {
    Chart.defaults.global.defaultFontFamily = 'Nunito';
    Chart.defaults.global.defaultFontColor = '#858796';

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
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    },
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2],
                    },
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
            }
        }
    });
}

function createPieChart(elementId, data) {
    Chart.defaults.global.defaultFontFamily = 'Nunito';
    Chart.defaults.global.defaultFontColor = '#858796';

    new Chart(document.getElementById('activeUsersChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e9aa0b'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)',
            }],
        },
        options: {
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
                display: false,
            },
            cutoutPercentage: 60,
        },
    });
}
