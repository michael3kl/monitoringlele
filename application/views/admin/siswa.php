

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Siswa dan mata pelajaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cogs"></i> Data</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="flashdata_error" data-flashdata="<?=$this->session->flashdata('pesan_error');?>">
    <div class="flashdata" data-flashdata="<?=$this->session->flashdata('pesan');?>">
    </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Peserta Didik</h3>
             
              
            </div>
            <div class="box-header">
            
            <a type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah data</a> <a href="<?=base_url();?>admin/hapussemuasiswa" class="btn btn-flat btn-danger tombol-hapus" data-nama="semua data siswa"><i class="fa fa-trash"></i> Hapus semua siswa</a> <a class="btn btn-info btn-flat pull-right" data-toggle="modal" href='#modal-import'><i class="fa fa-upload"></i> Import Siswa</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Kode Kelas</th>
                  <th>Jurusan</th>
                  <th>Tingkat</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                
                    foreach ($data as $siswa ) {
                        ?>
                            <tr>
                               
                                <td><?=$siswa->nisn; ?></td>
                                <td><?=$siswa->nama_siswa; ?></td>
                                <td><?=$siswa->nama_kelas; ?></td>
                                <td><?=$siswa->tingkat; ?></td>
                                <td><?=$siswa->jurusan; ?></td>
                                
                                <td>
                                        <a href="<?=base_url();?>admin/hapussiswa/<?=$siswa->id_s;?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" data-nama="<?=$siswa->nama_siswa;?>"><i class="fa fa-trash"></i></a> | <a type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target='#modal-id<?=$siswa->id_s?>'><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>



<div class="modal fade" id="modal-id<?=$siswa->id_s;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ubah data siswa</h4>
            </div>
            <form action="<?=base_url();?>admin/ubahsiswa" method="post" class="form-horizontal">
            <input type="hidden" name="qq" id="qq" value="<?php echo $siswa->id_s; ?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nisn">NISN</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nisn" id="nisn" class="form-control" value="<?=$siswa->nisn?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama_siswa">Nama Siswa</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?=$siswa->nama_siswa?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="kode_kelas">Nama Kelas</label>
                    </div>
                    <div class="col-md-8">
                        <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                            <option value="<?=$siswa->kode_kelas?>"><?=$siswa->nama_kelas?></option>
                            <option value="">-- Pilih Kelas --</option>
                            <?php 
                                foreach ($datakelas as $kelas ) {
                                   ?>
                                    <option value="<?=$kelas->kode_kelas?>"><?=$kelas->nama_kelas?></option>
                                   <?php
                                }
                            ?>
                        </select>
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
        <!-- /.col -->

        <div class="col-xs-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mata Pelajaran</h3>
             
              
            </div>
            <div class="box-header">
            
            <a type="button" data-toggle="modal" data-target="#modaltambahmapel" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah data</a> <a href="<?=base_url();?>admin/hapussemuasiswa" class="btn btn-flat btn-danger tombol-hapus" data-nama="semua data siswa"><i class="fa fa-trash"></i> Hapus semua siswa</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
            
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Mapel</th>
                  <th>Mapel</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $noa=1;
                    foreach ($mapel as $mapel ) {
                        ?>
                            <tr>
                                <td><?php echo $noa++; ?></td>
                                <td><?php echo $mapel->kode_mapel ?></td>
                                <td><?php echo $mapel->mapel ?></td>
                                <td>
                                    <a href="<?=base_url()?>admin/hapussatumapel/<?=$mapel->id_m;?>" class="btn btn-xs btn-danger btn-flat tombol-hapus" data-nama="yakin akan menghapus <?=$mapel->mapel;?> ?"><i class="fa fa-trash"></i></a> | <a class="btn btn-primary btn-flat btn-xs" data-toggle="modal" href='#modal-ubahmapel<?php echo $mapel->id_m ?>'><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
<div class="modal fade" id="modal-ubahmapel<?php echo $mapel->id_m ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ubah data mata pelajaran</h4>
            </div>
            <form action="<?=base_url();?>admin/ubahmapel" method="post">
            <input type="hidden" name="q" id="q" value="<?=$mapel->id_m?>">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="kode_mapel">Kode Mapel</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" placeholder="Masukkan kode mapel" value="<?=$mapel->kode_mapel;?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="mapel">Nama Mapel</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="mapel" id="mapel" placeholder="Masukkan kode mapel" value="<?=$mapel->mapel;?>">
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
                <h4 class="modal-title">Tambah data siswa</h4>
            </div>
            <form action="<?=base_url();?>admin/tambahsiswa" method="post" class="form-horizontal">
            
            <div class="modal-body">
            <div class="row">
                    <div class="col-md-4">
                        <label for="nisn">NISN</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama_siswa">Nama Siswa</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="kode_kelas">Nama Kelas</label>
                    </div>
                    <div class="col-md-8">
                        <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                            <?php 
                                foreach ($datakelas as $kelas ) {
                                   ?>
                                    <option value="<?=$kelas->kode_kelas?>"><?=$kelas->nama_kelas?></option>
                                   <?php
                                }
                            ?>
                        </select>
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





<div class="modal fade" id="modaltambahmapel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah data mata pelajaran</h4>
            </div>
            <form action="<?=base_url();?>admin/tambahmapel" method=POST>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="kode_mapel">Kode Mapel</label>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="text"
                            name="kode_mapel"
                            id="kode_mapel"
                            placeholder="Masukkan kode mapel"
                            class="form-control">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="mapel">Nama Mapel</label>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="text"
                            name="mapel"
                            id="mapel"
                            placeholder="Masukkan nama mapel"
                            class="form-control">
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


