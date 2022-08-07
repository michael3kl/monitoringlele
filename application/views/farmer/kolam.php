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
                        <h4 class="card-title ">Data Kolam </h4>
                        <p class="card-category">
                            Berikut ini adalah Data Kolam Ikan Lele Seluruhya</p>
                    </div>
                    <div class="card-body table-responsive">
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-tambah'>
                            <i class="fa fa-plus"></i>
                            Tambah </a>
                        <a href="<?= base_url(); ?>farmer/hapussemuajadwal" class="btn btn-danger tombol-hapus" data-nama="semua jadwal?">
                            <i class="fa fa-trash"></i>
                            Hapus semua jadwal
                        </a>

                        <!-- Modal tambah -->
                        <div class="modal fade" id="modal-tambah">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Data Kolam Ikan Lele</h4>
                                    </div>
                                    <form action="<?= base_url(); ?>farmer/tambahkolam" method="post" onsubmit="return konfir()">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_kolam">Nama Kolam</label>
                                                        <input type="text" class="form-control" name="nama_kolam">
                                                        <small class="text-danger"><?= form_error('nama_kolam') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_kolam">Jumlah Ikan</label>
                                                        <input type="text" class="form-control" name="Jumlah_ikan">
                                                        <small class="text-danger"><?= form_error('Jumlah_ikan') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_kolam">Jumlah Ikan Mati</label>
                                                        <input type="text" class="form-control" name="status_mati">
                                                        <small class="text-danger"><?= form_error('status_mati') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_kolam">Kode Kolam</label>
                                                        <input type="text" class="form-control" name="kode_kolam">
                                                        <small class="text-danger"><?= form_error('kode_kolam') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label id="label_kolam">Tanggal Masuk</label>
                                                        <input type="date" class="form-control" name="tgl_masuk">
                                                        <small class="text-danger"><?= form_error('tgl_masuk') ?></small>
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
                                <thead class="text-primary">
                                    <th>No</th>
                                    <th>Nama Kolam</th>
                                    <th>Jumlah Ikan</th>
                                    <th>Jumlah Ikan Mati</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Opsi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kolam as $item) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $item->nama_kolam; ?>
                                            </td>
                                            <td>
                                                <?= $item->Jumlah_ikan; ?>
                                            </td>
                                            <td>
                                                <?= $item->status_mati; ?>
                                            </td>
                                            <td>
                                                <?= $item->tgl_masuk; ?>
                                            </td>
                                            <!-- <td>
                                       <a rel="tooltip" href="" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                   </td> -->
                                            <td>
                                                <a rel="tooltip" title="Hapus" href="<?= base_url(); ?>farmer/hapuskolam/<?= $item->id_k; ?>" class="btn btn-danger btn-sm tombol-hapus" data-nama="item <?= $item->nama_kolam; ?> - <?= $item->Jumlah_ikan; ?> - <?= $item->status_mati; ?> - <?= $item->kode_kolam; ?> - <?= $item->tgl_masuk; ?>"><i class="fa fa-trash"></i></a> | <a rel="tooltip" title="Ubah" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $item->nama_kolam; ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $item->nama_kolam; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Data Kolam Lele</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url(); ?>farmer/ubahkolam" method="post">
                                                        <input type="hidden" name="nama_kolam" value="<?php echo $item->nama_kolam ?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label id="label_kolam">Nama Kolam</label>
                                                                        <input type="text" class="form-control" name="nama_kolam" value="<?php echo $item->nama_kolam ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label id="label_kolam">Jumlah Ikan</label>
                                                                        <input type="text" class="form-control" name="Jumlah_ikan" value="<?php echo $item->Jumlah_ikan ?>">

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label id="label_kolam">Jumlah Ikan Mati</label>
                                                                        <input type="text" class="form-control" name="status_mati" value="<?php echo $item->status_mati ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label id="label_kolam">Kode Kolam</label>
                                                                        <input type="text" class="form-control" name="kode_kolam" value="<?php echo $item->kode_kolam ?>">
                                                                        <small class="text-danger"><?= form_error('kode_kolam') ?></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label id="label_kolam">Tanggal Masuk</label>
                                                                        <input type="date" class="form-control" name="tgl_masuk" value="<?php echo date('d/m/Y') ?>">
                                                                        <small class="text-danger"> <?= form_error('tgl_masuk') ?></small>
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