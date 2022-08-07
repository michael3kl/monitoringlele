<div class="content">
    <div class="container-fluid">
        <form action="<?= base_url(); ?>farmer/prosesinputagenda" method="post">
            <input type="hidden" name="hari" value="<?= $data['hari']; ?>">
            <input type="hidden" name="tg" value="<?= $data['tg']; ?>">
            <input type="hidden" name="bl" value="<?= $data['bl']; ?>">
            <input type="hidden" name="th" value="<?= $data['th']; ?>">
            <input type="hidden" name="bibit" value="<?= $data['bibit']; ?>">
            <input type="hidden" name="kode_bibit" value="<?= $data['kode_bibit']; ?>">
            <input type="hidden" name="nama_customer" value="<?= $data['nama_customer']; ?>">
            <input type="hidden" name="kode_customer" value="<?= $data['kode_customer']; ?>">
            <input type="hidden" name="tgl" value="<?= $data['tgl']; ?>">
            <input type="hidden" name="jam_mulai" value="<?= $data['jam_mulai']; ?>">
            <input type="hidden" name="kode_kolam" value="<?= $data['kode_kolam']; ?>">
            <input type="hidden" name="nama_kolam" value="<?= $data['nama_kolam']; ?>">
            <input type="hidden" name="jumlah_pakan" value="<?= $data['jumlah_pakan']; ?>">
            <input type="hidden" name="tinggi_air" value="<?= $data['tinggi_air']; ?>">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Input Agenda</h4>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Hari</th>
                                    <td style="padding-left:20px; padding-right:10px">:</td>
                                    <td><?= $data['hari']; ?></td>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <td style="padding-left:20px; padding-right:10px">:</td>
                                    <td><?= $data['nama_customer']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bibit</th>
                                    <td style="padding-left:20px; padding-right:10px">:</td>
                                    <td><?= $data['bibit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kolam</th>
                                    <td style="padding-left:20px; padding-right:10px">:</td>
                                    <td><?= $data['nama_kolam'] . " (kode kolam " . $data['kode_kolam'] . ")"; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td style="padding-left:20px; padding-right:10px">:</td>
                                    <td><?= $data['tanggal']; ?></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sakit">Ikan Mati &nbsp&nbsp&nbsp</label>
                                        <input required type="text" name="status_mati" id="status_mati"> ekor
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sakit">Jumlah pakan yang diberikan &nbsp&nbsp&nbsp</label>
                                        <input required type="text" name="jumlah_pakan" id="jumlah_pakan"> kg
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sakit">Tinggi Air Kolam &nbsp&nbsp&nbsp</label>
                                        <input required type="text" name="tinggi_air" id="tinggi_air"> cm
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sakit">Diberi Antibiotik (Ya/Tidak) &nbsp&nbsp&nbsp</label>
                                        <!-- <input type="radio" name="antibiotik" id="antibiotik1" value="0" required>Ya &ensp;
                                        <input type="radio" name="antibiotik" id="antibiotik2" value="1" required>Tidak -->
                                        <input required type="text" name="antibiotik" id="antibiotik">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan Lain</label>
                                        <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
<div id="tampil"></div>

<script src="<?= base_url(); ?>template/admin/assets/js/jquery-3.3.1.js"></script>