
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data
            <small>Instansi</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Data</a>
            </li>
            <li class="active">Instansi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="flashdata_error" data-flashdata="<?=$this->session->flashdata('pesan_error');?>">
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('pesan');?>">

            <div class="row" >
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Instansi</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                            <div class="col-md-8">

            <form class="form-horizontal" action="<?=base_url();?>admin/ubahinstansi" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="npsn" class="col-sm-3 control-label">NPSN</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="npsn" id="npsn" placeholder="NPSN" value="<?= $instansi['npsn'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_instansi" class="col-sm-3 control-label">Nama Instansi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" placeholder="Nama Instansi" value="<?= $instansi['nama_instansi'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_instansi" class="col-sm-3 control-label">Nama Instansi</label>

                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" id="alamat"><?= $instansi['alamat'] ?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>

           
      
        </div>
        <div class="col-md-4" style="text-align:center">
                <img src="<?= base_url('');?>img/<?= $instansi['logo'];?>" width="100px" alt="Logo Instansi">
                <?php echo form_open_multipart('admin/upload_logo');?> <hr>
               <div class="col-sm-6">
               <input type="file" name="userfile" size="20" />
               </div>
               <div class="col-sm-6">
               <button type="submit" class="btn btn-info pull-right">Simpan</button>
               </div>
                
                
                
                
                
                
</form>
            </div>
            
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->

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
    