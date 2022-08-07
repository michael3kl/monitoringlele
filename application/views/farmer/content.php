<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Today</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="">Hari</label>
                            </div>
                            <div class="col-sm-9">
                                <?= $hari; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="">Tanggal</label>
                            </div>
                            <div class="col-sm-9">
                                <?= date('d - m - Y'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        foreach ($kolam as $kolam) {
        ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><?= $kolam->nama_kolam; ?> </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="">Jumlah Ikan: </label>
                                    <?= $kolam->Jumlah_ikan ?>
                                </div>
                                <div class="col-sm-2">|

                                </div>
                                <div class="col-sm-5">
                                    <label for="">Status: </label>
                                    <?php
                                    if ($kolam->keterangan == NULL || $kolam->keterangan == "0") {
                                        echo "-";
                                    } else {
                                        echo $kolam->keterangan;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="">Usia: </label>
                                    <?php
                                    $now = new DateTime();
                                    $lahir = new DateTime($kolam->tgl_masuk);
                                    $beda_hari = $now->diff($lahir)->days;

                                    echo $beda_hari . " hari";
                                    ?>
                                </div>
                                <div class="col-sm-2">|

                                </div>
                                <div class="col-sm-5">
                                    <label for="">Banyak Pakan(Kg): </label>
                                    <?php
                                    if ($kolam->jumlah_pakan != Null) {
                                        echo $kolam->jumlah_pakan;
                                    } else {

                                        $pkn = $beda_hari / 30;
                                        if ($pkn <= 1) {
                                            echo 1;
                                        } elseif ($pkn <= 2) {
                                            echo 2;
                                        } elseif ($pkn <= 3) {
                                            echo 3;
                                        } elseif ($pkn <= 4) {
                                            echo 4;
                                        } else {
                                            echo 5;
                                        }
                                    }


                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php
        } ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Menu:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#jadwal" data-toggle="tab">
                                            <i class="fa fa-bugs"></i>
                                            Jadwal Monitoring Ikan Lele
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#materi" data-toggle="tab">
                                            <i class="fa fa-download"></i>
                                            Penaburan Bibit Terakhir
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="tab-content">
                            <div class="tab-pane active" id="jadwal">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kolam</th>
                                            <th>Jam ke</th>
                                            <th>Monitoring Pukul</th>
                                            <th>Pembibitan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1;
                                        foreach ($jadwal as $jadwal1) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no++; ?>
                                                </td>
                                                <td>
                                                    <?= $jadwal1->nama_kolam; ?>
                                                </td>
                                                <td>
                                                    <?php if ($jadwal1->jam_mulai == $jadwal1->jam_selesai) {
                                                        echo $jadwal1->jam_mulai;
                                                    } elseif ($jadwal1->jam_mulai < $jadwal1->jam_selesai) {
                                                        echo $jadwal1->jam_mulai . " - " . $jadwal1->jam_selesai;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php echo $jadwal1->pukul_mulai . " - " . $jadwal1->pukul_selesai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $jadwal1->bibit; ?>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane " id="materi">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Bibit</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no2 = 1;
                                        foreach ($agenda as $agenda1) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no2++; ?>
                                                </td>
                                                <td>
                                                    <?= $agenda1->tg . ' - ' . $agenda1->bl . ' - ' . $agenda1->th; ?>
                                                </td>
                                                <td>
                                                    <?= $agenda1->bibit; ?>
                                                </td>
                                                <td>
                                                    <?= $agenda1->keterangan; ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 shadow-sm rounded mt-2 bg-white p-3">
            <div id="chartLele"></div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartLele', {
            chart: {
                type: 'column'
            },
            title: {
                text: '<b>Data Statistik Jumlah Ikan Perkolam</b>'
            },
            xAxis: {
                categories: ['<a href="<?= base_url(); ?>farmer/kolam">Kolam A</a>', '<a href="<?= base_url(); ?>farmer/kolam">Kolam B</a>', '<a href="<?= base_url(); ?>farmer/kolam">Kolam C</a>', '<a href="<?= base_url(); ?>farmer/kolam">Kolam D</a>', '<a href="<?= base_url(); ?>farmer/kolam">Kolam E</a>', '<a href="<?= base_url(); ?>farmer/kolam">Kolam F</a>'],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<b>Jumlah Ikan</b>'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
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
            series: [{
                name: '<b>kolam</b>',
                data: [<?php echo json_encode($item); ?>, 5, 8, 9, 10, 10],
            }],
        });
    </script>