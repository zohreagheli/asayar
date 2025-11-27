<div class="app-content">
    <div style="width: 100%; padding: 20px; background-color: rgba(255,255,255,0.85); border-radius: 10px;">
        <h4 class="mb-4" style="color:#000;">نمودار سرویس‌ها برحسب زمان</h4>
        <div id="appointmentsChart"></div>

        @push('scripts')
        <script>
            // تابع تبدیل اعداد لاتین به فارسی
            function toFarsiNumber(n) {
                const farsiDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
                return n.toString().split('').map(x => farsiDigits[x] ?? x).join('');
            }

            document.addEventListener("livewire:navigated", renderChart);
            document.addEventListener("DOMContentLoaded", renderChart);

            function renderChart() {
                let chartEl = document.querySelector("#appointmentsChart");
                if (!chartEl) return;

                chartEl.innerHTML = ""; // پاک کردن نمودار قبلی

                var options = {
                    chart: {
                        type: 'bar',
                        height: 400,
                        toolbar: { show: false },
                        foreColor: '#000'
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 5,
                            horizontal: false,
                            columnWidth: '50%'
                        }
                    },
                    dataLabels: { enabled: false },
                    series: [{
                        name: "تعداد سرویس‌ها",
                        data: @json($totals)
                    }],
                    xaxis: {
                        categories: @json($dates),
                        title: { text: "تاریخ", style: { color: '#000' } },
                        labels: {
                            style: { colors: '#000' },
                            formatter: function(val) {
                                return toFarsiNumber(val); // 👈 تاریخ‌ها هم فارسی می‌شن
                            }
                        }
                    },
                    yaxis: {
                        title: { text: "تعداد سرویس‌ها", style: { color: '#000' } },
                        labels: {
                            style: { colors: '#000' },
                            formatter: function(val) { return toFarsiNumber(val); }
                        }
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: function(val) { return toFarsiNumber(val); }
                        },
                        x: {
                            formatter: function(val) { return toFarsiNumber(val); }
                        }
                    },
                    colors: ["#0d6efd"],
                    grid: {
                        borderColor: '#ddd',
                        row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
                    },
                    responsive: [{
                        breakpoint: 768,
                        options: {
                            plotOptions: { bar: { columnWidth: '70%' } }
                        }
                    }]
                };

                var chart = new ApexCharts(chartEl, options);
                chart.render();
            }
        </script>
        @endpush
    </div>
</div>
