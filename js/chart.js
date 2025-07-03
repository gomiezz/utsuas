
// Data untuk chart
const salesData = {
    labels: [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ],
    datasets: [{
        label: 'Processor',
        data: [65, 59, 80, 81, 56, 100, 70, 60, 75, 90, 85, 100],
        backgroundColor: 'rgba(30, 60, 114, 0.7)',
        borderColor: 'rgba(30, 60, 114, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true
    }, {
        label: 'VGA Card',
        data: [45, 39, 60, 71, 46, 45, 60, 50, 65, 80, 75, 90],
        backgroundColor: 'rgba(79, 195, 247, 0.7)',
        borderColor: 'rgba(79, 195, 247, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true
    }, {
        label: 'RAM',
        data: [35, 29, 40, 51, 36, 35, 50, 40, 55, 70, 65, 80],
        backgroundColor: 'rgba(76, 175, 80, 0.7)',
        borderColor: 'rgba(76, 175, 80, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true
    }, {
        label: 'Storage',
        data: [25, 19, 30, 41, 26, 25, 40, 30, 45, 60, 55, 70],
        backgroundColor: 'rgba(255, 152, 0, 0.7)',
        borderColor: 'rgba(255, 152, 0, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true
    }]
};

// Konfigurasi chart
const config = {
    type: 'line',
    data: salesData,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    font: {
                        size: 14,
                        family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                    },
                    padding: 20,
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            },
            title: {
                display: true,
                text: 'Performa Penjualan Bulanan per Kategori Produk',
                font: {
                    size: 18,
                    family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                },
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            tooltip: {
                backgroundColor: 'rgba(30, 60, 114, 0.9)',
                titleFont: {
                    size: 16,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 14
                },
                padding: 12,
                usePointStyle: true,
                callbacks: {
                    label: function (context) {
                        return context.dataset.label + ': ' + context.raw + ' unit';
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                    font: {
                        size: 12
                    },
                    callback: function (value) {
                        return value + ' unit';
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12
                    }
                }
            }
        },
        elements: {
            point: {
                radius: 5,
                hoverRadius: 7,
                backgroundColor: 'white',
                borderWidth: 2
            }
        },
        interaction: {
            intersect: false,
            mode: 'index'
        }
    }
};

// Membuat chart
const salesChart = new Chart(
    document.getElementById('salesChart'),
    config
);

// Simulasi filter
document.getElementById('apply-filter').addEventListener('click', function () {
    const year = document.getElementById('year-filter').value;
    const category = document.getElementById('category-filter').value;

    // Ini hanya simulasi, pada implementasi nyata akan ada request data ke server
    alert(`Filter diterapkan: Tahun ${year}, Kategori ${category}`);

    // Untuk demo, kita akan mengubah judul chart
    salesChart.options.plugins.title.text = `Performa Penjualan ${year} - ${category === 'all' ? 'Semua Produk' : document.getElementById('category-filter').options[document.getElementById('category-filter').selectedIndex].text}`;
    salesChart.update();
});