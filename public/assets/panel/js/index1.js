"use strict";

// 🎯 تابع کمکی برای تبدیل رنگ hex به rgba
function hexToRgba(hex, opacity) {
    var c;
    if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
        c = hex.substring(1).split('');
        if(c.length == 3){
            c= [c[0], c[0], c[1], c[1], c[2], c[2]];
        }
        c = '0x'+c.join('');
        return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+opacity+')';
    }
    return hex;
}

// 🎨 رنگ‌های پیش‌فرض
var myVarVal  = '#6c5ffc';
var myVarVal1 = '#05c3fb';

// 📊 داده‌های نمونه (جلوگیری از ReferenceError)
var data = [[0, 10], [1, 20], [2, 15], [3, 25]];
var options = {
    series: { lines: { show: true }, shadowSize: 0 },
    xaxis: { show: true },
    yaxis: { show: true },
    grid: { borderWidth: 0, hoverable: true }
};
var dashData10 = [[0, 10], [10, 20], [20, 30], [30, 25]];

// 📌 شروع
(function($) {
    "use strict";

    // 🔹 flotback-chart
    if ($("#flotback-chart").length) {
        try {
            $.plot("#flotback-chart", [data], options);
        } catch (e) {
            console.error("Error plotting flotback-chart:", e);
        }
    }

    // 🔹 saleschart
    if ($('#saleschart').length) {
        var ctx = document.getElementById('saleschart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [{
                    label: 'فروش',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: hexToRgba(myVarVal, 0.2),
                    borderColor: myVarVal,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 5 } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // 🔹 transactions
    if ($('#transactions').length) {
        var ctx2 = document.getElementById('transactions').getContext('2d');
        var transChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
                datasets: [{
                    label: 'تراکنش‌ها',
                    data: [8, 10, 12, 6, 14, 8, 10],
                    backgroundColor: hexToRgba(myVarVal1, 0.8),
                    borderColor: myVarVal1,
                    borderWidth: 2,
                    borderRadius: 10,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 2 } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // 🔹 dashData10 نمونه‌ای
    if ($("#flotChart10").length) {
        try {
            $.plot("#flotChart10", [dashData10], {
                series: { lines: { show: true, fill: true }, shadowSize: 0 },
                grid: { borderWidth: 0 },
                colors: [myVarVal]
            });
        } catch (e) {
            console.error("Error plotting flotChart10:", e);
        }
    }

})(jQuery);
