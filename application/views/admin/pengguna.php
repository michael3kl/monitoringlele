

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Pengguna</small>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengguna Aplikasi</h3>
             
              
            </div>
            <div class="box-header">
            
            <a type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah data</a> <a href="" class="btn btn-danger btn-flat tombol-hapus" data-nama="semua data pengguna ?"><i class="fa fa-trash"></i> Hapus semua</a> <a class="btn btn-primary btn-flat pull-right" data-toggle="modal" href='#modal-import'><i class="fa fa-upload"></i> Import pengguna</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Level</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($pengguna as $pengguna ) {
                        ?>
                            <tr>
                                <td><?=$no++; ?></td>
                                <td><?=$pengguna->nama; ?></td>
                                <td><?=$pengguna->nip; ?></td>
                                <td><?=$pengguna->email; ?></td>
                                <td>
                                    <a href="<?=base_url();?>admin/ubahstatus/<?=$pengguna->id_p;?>" class="btn btn-flat btn-xs <?php if($pengguna->status == '1') {echo 'btn-success';} else {echo 'btn-warning';} ?>">
                                    <?php 
                                        if ($pengguna->status == '1') {
                                            echo 'Aktif';
                                        } else {
                                            echo 'Non Aktif';
                                        }
                                    ?>
                                    </a>
                                </td>
                                <td>
                                        <?php if ($pengguna->level == '1') {echo 'Administrator';} elseif ($pengguna->level == '2') {echo 'Kepala Sekolah';} elseif ($pengguna->level == '3') {echo 'farmer';} ?>
                                </td>
                                <td>
                                        <a href="<?=base_url();?>admin/hapuspengguna/<?=$pengguna->id_p;?>" class="btn btn-danger btn-flat btn-xs tombol-hapus" data-nama="<?=$pengguna->nama;?>"><i class="fa fa-trash"></i></a> | <a type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target='#modal-id<?=$pengguna->id_p?>'><i class="fa fa-edit"></i></a> | <a href="<?=base_url();?>admin/genpass/<?=$pengguna->id_p;?>" class="btn btn-warning btn-flat btn-xs"><i class="fa fa-key"></i></a>
                                </td>
                            </tr>



<div class="modal fade" id="modal-id<?=$pengguna->id_p?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ubah data pengguna</h4>
            </div>
            <form action="<?=base_url();?>admin/ubahpengguna" method="post" class="form-horizontal">
            <input type="hidden" name="qq" id="qq" value="<?php echo $pengguna->id_p; ?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?=$pengguna->nama?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="email" id="email" class="form-control" value="<?=$pengguna->email?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nip">NIP</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nip" id="nip" class="form-control" value="<?=$pengguna->nip?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="hp">HP</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="hp" id="hp" class="form-control" value="<?=$pengguna->hp?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="wa">WA</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="wa" id="wa" class="form-control" value="<?=$pengguna->wa?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="alamat" id="alamat" class="form-control" rows="3"><?=$pengguna->alamat?></textarea>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="kode_mapel">Mapel Utama</label>
                    </div>
                    <div class="col-md-8">
                        <select name="kode_mapel" id="kode_mapel" class="form-control">
                            <option value="<?=$pengguna->kode_mapel?>"><?=$pengguna->mapel?></option>
                            <option value="" disabled>-- Pilih mapel --</option>
                           <?php 
                           foreach ($mapel as $key ) {
                               ?>
<option value="<?=$key->kode_mapel;?>"><?=$key->mapel;?></option>
                               <?php
                           }
                           ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="level">Level</label>
                    </div>
                    <div class="col-md-8">
                        <select name="level" id="level" class="form-control">
                            <?php 
                                if ($pengguna->level == '1') {
                                    echo '<option value="'.$pengguna->level.'">Administrator</option><option value="2">Kepala Sekolah</option><option value="3">farmer</option>';
                                } elseif ($pengguna->level == '2') {
                                    echo '<option value="'.$pengguna->level.'">Kepala Sekolah</option><option value="1">Administrator</option><option value="3">farmer</option>';
                                } elseif ($pengguna->level == '3') {
                                    echo '<option value="'.$pengguna->level.'">farmer</option><option value="1">Administrator</option><option value="2">Kepala Sekolah</option>';
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
                <h4 class="modal-title">Ubah data pengguna</h4>
            </div>
            <form action="<?=base_url();?>admin/tambahpengguna" method="post" class="form-horizontal">
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan nama pengguna">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Masukkan email login">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="nip">NIP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP / Identitas lain">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="hp">HP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="hp" id="hp" class="form-control" required placeholder="Nomor HP">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="wa">WA</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="wa" id="wa" class="form-control" required placeholder="Nomor Whatsapp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required placeholder="Masukkan alamat rumah"></textarea>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="kode_mapel">Mapel Utama</label>
                    </div>
                    <div class="col-md-9">
                        <select name="kode_mapel" id="kode_mapel" class="form-control" required>
                            
                            <option value="" readonly>-- Pilih mapel --</option>
                           <?php 
                           foreach ($mapel as $key ) {
                               ?>
<option value="<?=$key->kode_mapel;?>"><?=$key->mapel;?></option>
                               <?php
                           }
                           ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="level">Level</label>
                    </div>
                    <div class="col-md-9">
                        <select name="level" id="level" class="form-control" required>
                        <option value="" readonly>-- Pilih level --</option>
                            <option value="1">Administrator</option>
                            <option value="2">Kepala Sekolah</option>
                            <option value="3">farmer</option>
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
