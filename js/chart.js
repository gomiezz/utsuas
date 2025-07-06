

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
                text: 'Performa Kunjungan Website Bulanan',
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
                        return ': ' + context.raw + 'x dikunjungi';
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
                        return value + 'x';
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