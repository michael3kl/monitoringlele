<?php 
$menu = $this->uri->segment(1);
$sub_menu1 = $this->uri->segment(2);
$sub_menu2 = $this->uri->segment(3);

?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>template/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?php if ($menu == 'admin' && $sub_menu1 == '') {echo 'active';}?>">
          <a href="<?=base_url('admin');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview <?php if ($menu == 'admin' && $sub_menu1 == 'pengguna' | $sub_menu1 == 'kelas' | $sub_menu1 == 'siswa' | $sub_menu1 == 'mapel' | $sub_menu1 == 'instansi' ) {echo 'active';}?>">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Data</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?php if ($menu == 'admin' && $sub_menu1 == 'instansi') {echo 'active';}?>"><a href="<?=base_url('admin/instansi');?>"><i class="fa fa-circle-o"></i> Instansi</a></li>
            
          </ul>
        </li>
        <li class="<?php if ($menu == 'admin' && $sub_menu1 == 'cetak') {echo 'active';}?>">
          <a href="<?=base_url('admin/cetak');?>">
            <i class="fa fa-print"></i> <span>Cetak Agenda</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>