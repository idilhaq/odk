<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Open Data Kesehatan | Dashboard</title>
    <link href="<?php echo base_url('assets/css/metro.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/metro-schemes.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/metro.js'); ?>"></script>
    <link href="<?php echo base_url('assets/css/metro-icons.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/highmaps/highmaps.js'); ?>"></script>
    <script src="<?php echo base_url('assets/highmaps/exporting.js'); ?>"></script>
    <script src="<?php echo base_url('assets/highmaps/id-all.js'); ?>"></script>
    <script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>
</head>
<body>
    <script type="text/javascript">
        var options = {
            chart: {
                renderTo: 'grafik',
                type: 'column'
            },
            title: {
                text: 'Grafik Kasus Penyakit',
            x: -20 //center
        },
        subtitle: {
            text: 'Kasus Penyakit per-Provinsi',
            x: -20
        },
        xAxis: {
            categories: [],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: []
    }
    series: []

    $.getJSON("<?php echo base_url(); ?>index.php/Home/grafik", function (json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
</script>
<script type="text/javascript">

    $(function () {

    // Prepare demo data
    var data;

    $.getJSON("<?php echo base_url(); ?>index.php/Home/grafikKasusPenyakit", function (data) {
        // Initiate the chart
        $('#container').highcharts('Map', {

            title : {
                text : 'Peta Persebaran Kasus Penyakit'
            },

            subtitle : {
                text : 'Source : http://data.go.id'
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            colorAxis: {
                minColor: '#00FF00',
                maxColor: '#FF0000',
                stops: [
                [0, '#00FF00'],
                [0.5, '#FFFF00'],
                [1, '#FF0000']
                ]
            },

            series : [{
                data : data,
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
                name: 'Data',
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }]
        });
});



});

</script>

<div class="app-bar orange" data-role="appbar">
    <a class="app-bar-element branding">Open Data Kesehatan</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li data-flexorderorigin="0" data-flexorder="1"><a href="">Home</a></li>
        <li data-flexorderorigin="1" data-flexorder="2">
            <a href="" class="dropdown-toggle">Data Kesehatan</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">Cakupan Imunisasi</a></li>
                <li><a href="">Kasus Penyakit</a></li>
                <li><a href="">Sarana Kesehatan</a></li>
                <li><a href="">SDM Kesehatan</a></li>
                <li class="divider"></li>
                <li><a href="" class="dropdown-toggle">Lain-lain</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Pengaruh Penggunaan Air Bersih</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li data-flexorderorigin="2" data-flexorder="3">
            <a href="" class="dropdown-toggle">Linked Data</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">Skema Linked Data</a></li>
                <li><a href="">Vocabulary</a></li>
                <li>
                    <a href="" class="dropdown-toggle">Download</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Data 1</a></li>
                        <li><a href="">Data 2</a></li>
                        <li><a href="">Data 3</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li data-flexorderorigin="3" data-flexorder="4"><a href="">Bantuan</a></li>
        <li data-flexorderorigin="4" data-flexorder="5"><a href="">Tentang Kami</a></li>
    </ul>
    <div class="app-bar-element place-right">
        <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Enter</a>
        <div class="app-bar-drop-container place-right" data-role="dropdown" data-no-close="true">
            <div class="padding20">
                <form>
                    <h4 class="text-light">Login to service...</h4>
                    <div class="input-control text">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text">
                    </div>
                    <div class="input-control text">
                        <span class="mif-lock prepend-icon"></span>
                        <input type="password">
                    </div>
                    <label class="input-control checkbox small-check">
                        <input type="checkbox">
                        <span class="check"></span>
                        <span class="caption">Remember me</span>
                    </label>
                    <div class="form-actions">
                        <button class="button primary">Login</button>
                        <button class="button link fg-grayLighter">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="app-bar-pullbutton automatic" style="display: none;"></div>
    <div class="clearfix" style="width: 0;"></div>
    <nav class="app-bar-pullmenu hidden flexstyle-app-bar-menu" style="display: none;">
        <ul class="app-bar-pullmenubar hidden app-bar-menu"></ul>
    </nav>
</div>
<div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
        <div class="row" style="height: 100%">
            <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                <ul class="sidebar2 dark">
                    <li class="active"><a href="#"><span class="mif-home icon"></span>Dashboard</a></li>
                    <li class="stick bg-green">
                        <a class="dropdown-toggle" href="#"><span class="mif-tree icon"></span>Cakupan Imunisasi</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href=""><span class="mif-stethoscope icon"></span> Imunisasi BCG</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Hepatitis</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> DPT/HB</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Polio</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Campak</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Imunisasi Dasar Lengkap pada Bayi</a></li>
                        </ul>
                    </li>
                    <li class="stick bg-green">
                        <a class="dropdown-toggle" href="#"><span class="mif-tree icon"></span>Kasus Penyakit</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href=""><span class="mif-stethoscope icon"></span> Polio</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Malaria</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Kusta</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Filariasis</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Difteri</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Pertusis</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tetanus</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Campak</a></li>
                        </ul>
                    </li>
                    <li class="stick bg-green">
                        <a class="dropdown-toggle" href="#"><span class="mif-tree icon"></span>Sarana Kesehatan</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href=""><span class="mif-stethoscope icon"></span> Polindes</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Posyandu</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Puskesmas</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Pustu</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Rumah Sakit</a></li>
                        </ul>
                    </li>
                    <li class="stick bg-green">
                        <a class="dropdown-toggle" href="#"><span class="mif-tree icon"></span>SDM Kesehatan</a>
                        <ul class="d-menu" data-role="dropdown" style="display: none;">
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tenaga Medis</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Perawat dan Bidan</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tenaga Farmasi</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tenaga Gizi</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tenaga Sanitasi</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Tenaga Kesmas</a></li>
                            <li><a href=""><span class="mif-stethoscope icon"></span> Dokter Gigi</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="cell padding5 size-x700 bg-white" id="container">
            </div>
            <div class="cell padding5 size-x400 bg-white" id="cell-content">
                <div id="grafik" style="position: relative; width:100%; height: 400px;"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>