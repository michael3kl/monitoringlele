<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <?php 
            if ($this->session->flashdata('pesan')) {
                ?>
                    
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $this->session->flashdata('pesan') ;?>
                    </div>
                    
                <?php
            }
            ?>
        </div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Profil lengkap User</p>
                    </div>
                    <div class="card-body">
                    
                        <form action="<?=base_url();?>farmer/ubahprofil" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama User</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="nama"
                                            value="<?=$profil['nama'];?>">
                                            <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            value="<?=$profil['email'];?>"
                                            readonly>
                                            <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">NIP</label>
                                        <input type="text" class="form-control" name="nip" value="<?=$profil['nip'];?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Adress</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="alamat"
                                            value="<?=$profil['alamat'];?>">
                                            <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">HP</label>
                                        <input type="text" class="form-control" name="hp" value="<?=$profil['hp'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">WA</label>
                                        <input type="text" class="form-control" name="wa" value="<?=$profil['wa'];?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="<?=base_url();?>img/<?=$profil['foto'];?>"/>
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Monitoring Lele</h6>
                        <h4 class="card-title"><?=$profil['kode_bibit']?></h4>
                        <p class="card-description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi accusamus
                            nesciunt similique illo nulla amet provident numquam qui laborum itaque!
                            Facilis, distinctio. Earum ipsam, placeat pariatur repudiandae at ratione
                            similique?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <?php 
            if ($this->session->flashdata('pesan1')) {
                ?>
                    
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $this->session->flashdata('pesan1') ;?>
                    </div>
                    
                <?php
            }
            ?>
        </div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title">Edit Password</h4>
                        <p class="card-category">Ubah password User</p>
                    </div>
                    <form action="<?= base_url()?>farmer/ubahpasswordfarmer" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password Lama</label>
                                        <input type="password" class="form-control" name="password_lama">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password Baru</label>
                                        <input type="password" class="form-control" name="password_baru">
                                        <small class="text-danger"><?= form_error('password_baru');?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="konfirm_password_baru">
                                        <small class="text-danger"><?= form_error('konfirm_password_baru');?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger pull-right">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>