<link rel="stylesheet" href="<?= base_url(); ?>template/admin/assets/css/jquery.dataTables.min.css">
<style></style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">

                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Jadwal Monitoring Ikan Lele</h4>
                        <p class="card-category">
                            Berikut ini adalah jadwal Monitoring Ikan Lele untuk satu pekan</p>
                    </div>
                    <div class="card-body table-responsive">
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-tambah'>
                            <i class="fa fa-plus"></i>
                            Tambah Jadwal</a>
                        <a href="<?= base_url(); ?>farmer/hapussemuajadwal" class="btn btn-danger tombol-hapus" data-nama="semua jadwal?">
                            <i class="fa fa-trash"></i>
                            Hapus semua jadwal
                        </a>

                        <!-- Modal tambah -->
                        <div class="modal fade" id="modal-tambah">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Jadwal Monitoring Ikan Lele</h4>
                                    </div>
                                    <form action="<?= base_url(); ?>farmer/tambahjadwal" method="post" onsubmit="return konfir()">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_hari" for="hari">Pilih Hari Monitoring</label>
                                                        <select name="hari" id="hari" class="form-control">
                                                            <option value="">-- Pilih Hari --</option>
                                                            <option value="Senin">Senin</option>
                                                            <option value="Selasa">Selasa</option>
                                                            <option value="Rabu">Rabu</option>
                                                            <option value="Kamis">Kamis</option>
                                                            <option value="Jumat">Jumat</option>
                                                            <option value="Sabtu">Sabtu</option>
                                                            <option value="Minggu">Minggu</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                                                    <div class="form-group">
                                                        <label id="label_jam_mulai" for="jam_mulai">Pilih Jam Mulai</label>
                                                        <select name="jam_mulai" id="jam_mulai" class="form-control">
                                                            <option disabled value="">-- Pilih Jam --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="jam_selesai" id="label_jam_selesai">Pilih Jam Berakhir</label>
                                                        <select name="jam_selesai" id="jam_selesai" class="form-control">
                                                            <option value="">-- Pilih Jam --</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="kode_kolam" id="label_kode_kolam">Nama Kolam</label>
                                                        <select name="kode_kolam" id="kode_kolam" class="form-control">
                                                            <option value="">-- Nama Kolam --</option>
                                                            <?php
                                                            foreach ($kolam as $kolam_tambah) {
                                                            ?>
                                                                <option value="<?= $kolam_tambah->kode_kolam; ?>"><?= $kolam_tambah->nama_kolam; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="kode_bibit" id="label_kode_bibit">Bibit yang Diberikan</label>
                                                        <select name="kode_bibit" id="kode_bibit" class="form-control">
                                                            <option value="">-- Pilih Bibit --</option>
                                                            <?php
                                                            foreach ($bibit as $bibit_tambah) {
                                                            ?>
                                                                <option value="<?= $bibit_tambah->kode_bibit; ?>"><?= $bibit_tambah->bibit; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="kode_customer" id="label_kode_customer">Customer</label>
                                                        <select name="kode_customer" id="kode_customer" class="form-control">
                                                            <option value="">-- Pilih Customer --</option>
                                                            <?php
                                                            foreach ($customer as $customer_tambah) {
                                                            ?>
                                                                <option value="<?= $customer_tambah->kode_customer; ?>"><?= $customer_tambah->nama_customer; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="table-responsivea">
                            <table class="display" id="myTable">
                                <thead class=" text-primary">
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Kolam</th>
                                    <th>Jam ke</th>
                                    <th>Pukul</th>
                                    <th>Customer</th>
                                    <th>Bibit yang diberikan</th>
                                    <th>Opsi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($jadwal as $jadwal) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $jadwal->hari; ?>
                                            </td>
                                            <td>
                                                <?= $jadwal->nama_kolam; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($jadwal->jam_mulai != $jadwal->jam_selesai) {
                                                    echo $jadwal->jam_mulai . " - " . $jadwal->jam_selesai;
                                                } else {
                                                    echo $jadwal->jam_mulai;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $jadwal->pukul_mulai . " - " . $jadwal->pukul_selesai; ?>
                                            </td>
                                            <td>
                                                <?= $jadwal->kode_customer; ?>
                                            </td>
                                            <td>
                                                <?= $jadwal->bibit; ?>
                                            </td>
                                            <td>
                                                <a rel="tooltip" title="Hapus" href="<?= base_url(); ?>farmer/hapusjadwal/<?= $jadwal->id_j; ?>" class="btn btn-danger btn-sm tombol-hapus" data-nama="Jadwal <?= $jadwal->hari; ?> - <?= $jadwal->kode_customer; ?> - <?= $jadwal->bibit; ?>"><i class="fa fa-trash"></i></a> | <a rel="tooltip" title="Ubah" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $jadwal->id_j; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $jadwal->id_j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Jadwal Monitoring Ikan Lele</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url(); ?>farmer/ubahjadwal" method="post">
                                                        <input type="hidden" name="id_j" value="<?php echo $jadwal->id_j ?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label id="label_hari" for="hari">Ubah Hari</label>
                                                                        <select class="form-control" name="hari" id="hari">
                                                                            <option value="<?php echo $jadwal->hari ?>"><?php echo $jadwal->hari ?></option>
                                                                            <option value="Senin">Senin</option>
                                                                            <option value="Selasa">Selasa</option>
                                                                            <option value="Rabu">Rabu</option>
                                                                            <option value="Kamis">Kamis</option>
                                                                            <option value="Jumat">Jumat</option>
                                                                            <option value="Sabtu">Sabtu</option>
                                                                            <option value="Minggu">Minggu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label id="label_jam_mulai" for="jam_mulai">Ubah Jam Mulai</label>
                                                                        <select class="form-control" name="jam_mulai" id="jam_mulai">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label id="label_jam_selesai" for="jam_selesai">Ubah Jam Selesai</label>
                                                                        <select class="form-control" name="jam_selesai" id="jam_selesai">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="kode_kolam" id="label_kode_kolam">Nama Kolam</label>
                                                                        <select name="kode_kolam" id="kode_kolam" class="form-control">
                                                                            <option value="<?= $jadwal->kode_kolam; ?>"><?= $jadwal->nama_kolam; ?></option>
                                                                            <?php
                                                                            foreach ($kolam  as $kolam_edit) {
                                                                            ?>
                                                                                <option value="<?= $kolam_edit->kode_kolam; ?>"><?= $kolam_edit->nama_kolam; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="kode_bibit" id="label_kode_bibit">Bibit</label>
                                                                        <select name="kode_bibit" id="kode_bibit" class="form-control">
                                                                            <option value="<?= $jadwal->kode_bibit; ?>"><?= $jadwal->bibit; ?></option>
                                                                            <?php
                                                                            foreach ($bibit as $bibit_edit) {
                                                                            ?>
                                                                                <option value="<?= $bibit_edit->kode_bibit; ?>"><?= $bibit_edit->bibit; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="kode_customer" id="label_kode_customer">Customer</label>
                                                                        <select name="kode_customer" id="kode_customer" class="form-control">
                                                                            <option value="<?= $jadwal->kode_customer; ?>"><?= $jadwal->nama_customer; ?></option>
                                                                            <?php
                                                                            foreach ($customer as $customer_edit) {
                                                                            ?>
                                                                                <option value="<?= $customer_edit->kode_customer; ?>"><?= $customer_edit->nama_customer; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                        </div>
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
</div>


<script src="<?= base_url(); ?>template/admin/assets/js/jquery-3.3.1.js"></script>
<script src="<?= base_url(); ?>template/admin/assets/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    function konfir() {
        var hari = document.getElementById('hari');
        var jam_mulai = document.getElementById('jam_mulai');
        var jam_selesai = document.getElementById('jam_selesai');
        var kode_bibit = document.getElementById('kode_bibit');
        var label_hari = document.getElementById('label_hari');
        var label_jam_mulai = document.getElementById('label_jam_mulai');
        var label_jam_selesai = document.getElementById('label_jam_selesai');
        var label_kode_bibit = document.getElementById('label_kode_bibit');

        if (hari.value == '') {
            alert('Pilih Hari');
            label_hari.style.color = 'red';
            return false;
        } else if (hari.value != '') {
            label_hari.style.color = 'black';
        }

        if (jam_mulai.value == '') {
            alert('Pilih jam mulai monitoring');
            label_jam_mulai.style.color = 'red';
            return false;
        } else if (jam_mulai.value != '') {
            label_jam_mulai.style.color = 'black';
        }

        if (jam_selesai.value == '') {
            alert('Pilih jam selesai monitoring');
            label_jam_selesai.style.color = 'red';
            return false;
        } else if (jam_selesai.value != '') {
            label_jam_selesai.style.color = 'black';
        }

        if (kode_bibit.value == '') {
            alert('Pilih Bibit');
            label_kode_bibit.style.color = 'red';
            return false;
        } else if (kode_bibit.value != '') {
            label_kode_bibit.style.color = 'black';
        }

        if (kode_customer.value == '') {
            alert('Pilih kelas');
            label_kode_customer.style.color = 'red';
            return false;
        } else if (kode_customer.value != '') {
            label_kode_customer.style.color = 'black';
        }

        if (jam_mulai.value > jam_selesai.value) {
            alert('Kesalahan input jam Monitoring');
            return false;
        }
    }
</script>