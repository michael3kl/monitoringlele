<?php
    $menu = $this->uri->segment(1);
    $sub_menu = $this->uri->segment(2);
    $sub_menu1 = $this->uri->segment(3);
?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="<?=base_url();?>template/admin/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Monitoring Ikan Lele
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  <?php if($menu == "farmer" & $sub_menu == "") {echo "active";} ?>">
            <a class="nav-link" href="<?=base_url();?>farmer">
              <i class="fa fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu == "farmer" & $sub_menu == "profil") {echo "active";} ?>">
            <a class="nav-link" href="<?=base_url();?>farmer/profil">
              <i class="fa fa-user"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu == "farmer" & $sub_menu == "jadwal") {echo "active";} ?> ">
            <a class="nav-link" href="<?=base_url();?>farmer/jadwal">
              <i class="fa fa-list"></i>
              <p>Jadwal Monitoring Lele</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu == "farmer" & $sub_menu == "agenda") {echo "active";} ?> ">
            <a class="nav-link" href="<?=base_url();?>farmer/agenda">
              <i class="fa fa-upload"></i>
              <p>Agenda Monitoring</p>
            </a>
          </li>
      
          <li class="nav-item <?php if($menu == "farmer" & $sub_menu == "cetakagenda") {echo "active";} ?> ">
            <a class="nav-link" target="_blank" href="<?=base_url();?>farmer/cetakagenda">
              <i class="fa fa-print"></i>
              <p>Cetak Agenda</p>
            </a>
          </li>
  
          <li class="nav-item">
            <a href="<?=base_url();?>farmer/logout" class="nav-link">
              <i class="fa fa-sign-out"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>