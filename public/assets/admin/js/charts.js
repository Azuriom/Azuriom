function createLineChart(elementId, data, labelName) {
    new Chart(document.getElementById(elementId), {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: labelName,
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverRadius: 3,
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: Object.values(data),
            }],
        },
        options: {
            maintainAspectRatio: false,
            hover: {
                intersect: true,
            },
            plugins: {
                filler: {
                    propagate: false,
                },
                legend: {
                    display: false,
                },
                tooltip: {
                    intersect: false,
                },
            },
            scales: {
                x: {
                    reverse: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0)'
                    },
                },
                y: {
                    ticks: {
                        stepSize: 1000
                    },
                    display: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0)',
                    },
                }
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
                borderWidth: 0,
                data: Object.values(data),
                backgroundColor: ['#3b7ddd', '#1cbb8c', '#17a2b8', '#fcb92c'],
                hoverBackgroundColor: ['#2f64b1', '#158a67', '#117686', '#b08220'],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            cutout: '70%',
        }
    });
}
