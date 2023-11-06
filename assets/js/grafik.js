var filtering = {}
        $(document).ready(function() {
            $('.filter_nama').select2({
                placeholder: "Pilih Nama",
                allowClear: true,
                theme: "classic"
            });
            filter()
            init()

        })

        function filter() {
            $('.filter_nama').change(function() {
                filtering['filter_nama'] = $(this).val();
                init()
            })
        }


        function init() {
            $(".init-loading").html("<i class='fa fa-spin fa-refresh'></i> &nbsp;&nbsp;&nbsp;Memuat Data ...");
            grafik()
            grafik_dealer()
            grafik_stacked()
        }

        function groupBy(arr, key){
            const initialValue = {}
            const res = arr.reduce((acc, cval) => {
                const myAttribute = cval[key]
                let test = acc
                acc[myAttribute] = [...(acc[myAttribute] || []), cval]
                for (let i = 0; i < acc[myAttribute].length; i++) {
                    if (test[myAttribute][i].status_training == 'Trained') {
                        test[myAttribute][0].trained = acc[myAttribute][i].data;
                    }else{
                        test[myAttribute][0].untrained = acc[myAttribute][i].data;

                    }
                        delete test[myAttribute][i].status_training
                        delete test[myAttribute][i].data
                }
                        delete test[myAttribute][1]
                return test
            }, initialValue)
            return res
        }

        function persentase() {
            
        }

        function grafik() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>peopledev/data_grafik",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    groupBy(data, 'wajib_training')
                    barChart(data, "grafik");
                }
            })
        }

        function grafik_dealer() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>peopledev/data_grafik_dealer",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    groupBy(data, 'wajib_training')
                    barChart(data, "grafik_dealer");
                }
            })
        }

        function grafik_stacked() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?>peopledev/data_grafik_stack",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    var app = []
                    $.each(data, function(i, el) {
                        $.each(el, function(i, ol) {
                            app.push(ol);
                        })
                    })
                    barChartStacked(app, "grafik_stacked");
                }
            })
        }

        function barChart(data, chartdiv) {
            am4core.useTheme(am4themes_animated);
            am4core.useTheme(am4themes_kelly);
            var chart = am4core.create(chartdiv, am4charts.XYChart);

            chart.data = data;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "wajib_training";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;


            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 160;
            // label.truncate = true;
            label.tooltipText = "{category}";

            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -90;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "trained";
            series1.dataFields.categoryX = "wajib_training";
            series1.name = "Training";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}";
            chart.cursor = new am4charts.XYCursor();

            var labelBullet = series1.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.html = `
                <div style='background:bg-transparent;color:black;padding:0px 20px;text-align:center;'>{data}</div>
                `;
            labelBullet.label.dy = -20;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "untrained";
            series1.dataFields.categoryX = "wajib_training";
            series1.name = "Untraining";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}";


            chart.cursor = new am4charts.XYCursor();

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";
        }

        function barChartStacked(data, chartdiv) {
            var chart = am4core.create(chartdiv, am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.data = data;
            chart.paddingRight = 0;
            chart.paddingLeft = 0;
            chart.paddingTop = 0;
            chart.paddingBottom = 0;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "status_training";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 160;
            // label.truncate = true;
            label.tooltipText = "{category}";

            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -90;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_bengkalis";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Bengkalis";
            series1.fill = "green";
            series1.stroke = "green";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_kampar";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kampar";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_inhil";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Indragiri Hilir";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_inhu";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Indragiri Hulu";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_kuansing";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kuantan Singingi";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kampar";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_kampar";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kampar";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_kampar";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kampar";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_kampar";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "Kampar";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(series1);
            chart.scrollbarX.parent = chart.bottomAxesContainer;


            var series1 = chart.series.push(new am4charts.LineSeries());
            series1.dataFields.valueY = "total";
            series1.dataFields.categoryX = "status_training";
            series1.yAxis = valueAxis1;
            series1.name = "TOTAL DATA";
            series1.fill = "#125192";
            series1.stroke = "#125192";
            series1.strokeWidth = 0;
            series1.yAxis = valueAxis1;
            series1.tooltipText = "{valueY.value}";
            series1.minBulletDistance = 35;

            var bullet4 = series1.bullets.push(new am4charts.CircleBullet());
            bullet4.circle.radius = 3;
            bullet4.circle.strokeWidth = 2;
            bullet4.circle.fill = am4core.color("black");


            // Add label
            var labelBullet = series1.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.html = `
                <div style='background:#125192;color:white;padding:0px 20px;text-align:center;'>{total}</div>
                <div style='background:red;color:white;padding:0px 20px;text-align:center;'>{data_maulana}</div>
                <div style='background:green;color:white;padding:0px 20px;text-align:center;'>{data_heru}</div>
                `;
            labelBullet.label.dy = -40;

            chart.cursor = new am4charts.XYCursor();

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";
        }