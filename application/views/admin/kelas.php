<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data
            <small>Kelas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Data</a></li>
            <li class="active">Kelas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="flashdata_error" data-flashdata="<?= $this->session->flashdata('pesan_error'); ?>">
            <div class="flashdata" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Kelas</h3>
                        </div>
                        <div class="box-header">

                            <a type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah data</a> <a href="<?= base_url(); ?>admin/hapussemuakelas" class="btn btn-danger btn-flat tombol-hapus" data-nama="semua data kelas ?"><i class="fa fa-trash"></i> Hapus semua kelas</a> <a class="btn btn-primary btn-flat pull-right" data-toggle="modal" href='#modal-import'><i class="fa fa-upload"></i> Import kelas</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Tingkat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kelas as $kelas) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kelas->kode_kelas; ?></td>
                                            <td><?= $kelas->nama_kelas; ?></td>
                                            <td><?= $kelas->jurusan; ?></td>
                                            <td><?= $kelas->tingkat; ?></td>

                                            <td>
                                                <a href="<?= base_url(); ?>admin/hapuskelas/<?= $kelas->id_k; ?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" data-nama="<?= $kelas->nama_kelas; ?>"><i class="fa fa-trash"></i></a> | <a type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target='#modal-id<?= $kelas->id_k ?>'><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="modal-id<?= $kelas->id_k ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Ubah data Kelas</h4>
                                                    </div>
                                                    <form action="<?= base_url(); ?>admin/ubahkelas" method="post" class="form-horizontal">
                                                        <input type="hidden" name="qq" id="qq" value="<?php echo $kelas->id_k; ?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="kode_kelas">Kode Kelas</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" value="<?= $kelas->kode_kelas ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="nama_kelas">Nama Kelas</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="<?= $kelas->nama_kelas ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="jurusan">jurusan</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $kelas->jurusan ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="tingkat">tingkat</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="tingkat" id="tingkat" class="form-control" value="<?= $kelas->tingkat ?>">
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-flat">Save changes</button>
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
                        <!-- /.box-body -->
                    </div>



                    <!-- /.box -->
                </div>

                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Jam Pelajaran</h3>
                        </div>
                        <div class="box-header">

                            <a type="button" data-toggle="modal" data-target="#modalTambahJam" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah data</a> <a href="<?= base_url(); ?>admin/hapussemuajampel" class="btn btn-danger btn-flat tombol-hapus" data-nama="semua data mata pelajaran ?"><i class="fa fa-trash"></i> Hapus semua</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jam ke</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jampel as $jampel) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $jampel->jam_ke; ?></td>
                                            <td><?php echo $jampel->pukul_mulai; ?></td>
                                            <td><?php echo $jampel->pukul_selesai; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>admin/hapusjampel/<?= $jampel->id_jp ?>" class="btn btn-flat btn-danger btn-xs tombol-hapus" data-nama="yakin akan menghapus data jam ke <?= $jampel->jam_ke; ?> ?"><i class="fa fa-trash"></i> </a> | <a class="btn btn-flat btn-primary btn-xs" data-toggle="modal" href='#modaleditjampel<?= $jampel->id_jp ?>'><i class="fa fa-edit"></i> </a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="modaleditjampel<?= $jampel->id_jp ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Ubah Jam pelajaran</h4>
                                                    </div>
                                                    <form action="<?= base_url(); ?>admin/ubahjampel" method="post">
                                                        <input type="hidden" name="q" value="<?= $jampel->id_jp ?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="jam_ke">Jam Ke</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" class="form-control" name="jam_ke" id="jam_ke" value="<?= $jampel->jam_ke; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="pukul_mulai">Jam Mulai</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="pukul_mulai" id="pukul_mulai" value="<?= $jampel->pukul_mulai; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="pukul_selesai">Jam Selesai</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="pukul_selesai" id="pukul_selesai" value="<?= $jampel->pukul_selesai; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-flat">Save changes</button>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah data kelas</h4>
            </div>
            <form action="<?= base_url(); ?>admin/tambahkelas" method="post" class="form-horizontal">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="kode_kelas">Kode Kelas</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" required placeholder="Masukkan kode kelas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama_kelas">Nama Kelas</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required placeholder="Masukkan nama kelas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="jurusan">Jurusan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="jurusan" id="jurusan" class="form-control" required placeholder="Masukkan nama jurusan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tingkat">Tingkat</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tingkat" id="tingkat" class="form-control" required placeholder="Masukkan tingkat">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalTambahJam">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <form action="<?= base_url(); ?>admin/tambahjampel" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Jam ke</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="jam_ke" id="jam_ke" placeholder="masukkan jam pelajaran" required class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Jam mulai</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="pukul_mulai" id="pukul_mulai" placeholder="masukkan mulai jam pelajaran" required class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Jam Selesai</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="pukul_selesai" id="pukul_selesai" placeholder="masukkan jam pelajaran" required class="form-control">
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