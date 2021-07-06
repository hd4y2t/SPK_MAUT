<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
  
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <img src="<?php echo base_url('assets');?>/logoku.JPG" class="profile-user-img img-responsive " alt="User Image">          
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <?php if($this->session->userdata('unit_pegawai') == "Admin"  ):?>
      <?php if($judulhalaman == "Dashboard"):?>
        <li class= "active">
          <a href=<?php echo base_url('index.php/dashboard') ?>>
            <div class="btn btn-block btn-social  "><i class=" fa fa-home text-green"> </i> <span >Home</span></div>
          </a>
        </li>     
      <?php else:?>
        <li>
          <a href=<?php echo base_url('index.php/dashboard') ?>>
            <div class="btn btn-block btn-social   "><i class=" fa fa-home"> </i><span > Home</span></div> 
          </a>
        </li>     
      <?php endif; endif;?>
            
            
            <?php if($this->session->userdata('unit_pegawai') == "Admin"  ):?>
              <?php if($judulhalaman == "Pegawai"):?>
                  <li class= "active">
                        <a href="<?php echo base_url('index.php/Pegawai') ?>">
                          <div class="btn btn-block btn-social  "><i class=" fa fa-users  "></i> <span>Pegawai</span></div> 
                        </a>
                  </li>
              <?php else:?>
                  <li>
                        <a href="<?php echo base_url('index.php/Pegawai') ?>">
                          <div class="btn btn-block btn-social  "><i class=" fa fa-users  "></i> <span>Pegawai</span></div> 
                        </a>
                  </li>
            <?php endif;
              endif;?> 

      <?php if($this->session->userdata('unit_pegawai') == "Admin"  ):?>
        <?php if($judulhalaman == "Jurusan"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Jurusan') ?>">
              <div class="btn btn-block btn-social  "><i class=" ion-person text-green "></i> <span>Jurusan</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Jurusan') ?>">
              <div class="btn btn-block btn-social  "><i class=" ion-person  "></i> <span>Jurusan</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?>  

      <?php if($this->session->userdata('unit_pegawai') == "Admin"  ):?>
        <?php if($judulhalaman == "Universitas"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Universitas') ?>">
              <div class="btn btn-block btn-social  "><i class=" ion-ios-bookmarks text-green"></i> <span>Universitas</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Universitas') ?>">
              <div class="btn btn-block btn-social  "><i class=" ion-ios-bookmarks "></i> <span>Universitas</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?> 

      <?php if($this->session->userdata('unit_pegawai') == "Admin" || $this->session->userdata('unit_pegawai') == "Siswa"  ):?>
        <?php if($judulhalaman == "Kriteria"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Kriteria') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-plus  text-green"></i> <span>Kriteria</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Kriteria') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-plus  "></i> <span>Kriteria</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?>   
      
<!-- 
      <?php if($this->session->userdata('unit_pegawai') == "Admin" || $this->session->userdata('unit_pegawai') == "Wakil Kepsek" ):?>
        <?php if($judulhalaman == "Sub kriteria"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Sub_kiteria') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-plus text-green "></i> <span>Sub Kriteria</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Sub_kiteria') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-plus  "></i> <span>Sub Kriteria</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?>      -->    
              
      <?php if(  $this->session->userdata('unit_pegawai') == "Admin"):?>
        <?php if($judulhalaman == "Penilaian Jurusan"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Peserta') ?>">
              <div class="btn btn-block btn-social  "><i class=" glyphicon glyphicon-user text-green "></i> <span>Penilaian Jurusan</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Peserta') ?>">
              <div class="btn btn-block btn-social  "><i class=" glyphicon glyphicon-user  "></i> <span>Penilaian Jurusan</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?> 
      
            <?php if($this->session->userdata('unit_pegawai') == "Admin"  ):?>
              <?php if($judulhalaman == "Akademik"):?>
                  <li class= "active">
                        <a href="<?php echo base_url('index.php/Akademik') ?>">
                          <div class="btn btn-block btn-social  "><i class=" ion-ios-book text-green "></i> <span>Akademik</span></div> 
                        </a>
                  </li>
              <?php else:?>
                  <li>
                        <a href="<?php echo base_url('index.php/Akademik') ?>">
                          <div class="btn btn-block btn-social  "><i class=" ion-ios-book  "></i> <span>Akademik</span></div> 
                        </a>
                  </li>
            <?php endif;
              endif;?> 
<!-- 
      <?php if(  $this->session->userdata('unit_pegawai') == "Admin" || $this->session->userdata('unit_pegawai') == "Wakil Kepsek"):?>
        <?php if($judulhalaman == "Nilai"):?>
          <li class= "active">
            <a href="<?php echo base_url('index.php/Peserta/akademik') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-file-text  text-green"></i> <span>Nilai</span></div> 
            </a>
          </li>
        <?php else:?>
          <li>
            <a href="<?php echo base_url('index.php/Peserta/akademik') ?>">
              <div class="btn btn-block btn-social  "><i class=" fa fa-file-text  "></i> <span>Nilai</span></div> 
            </a>
          </li>
        <?php endif;
      endif;?>
 -->

      <?php if(  $this->session->userdata('unit_pegawai') == "Admin" || $this->session->userdata('unit_pegawai') == "Siswa") {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/Laporan/pegawai') ?>"><i class="fa fa-circle-o"></i>Laporan Pegawai</a></li>
            <li><a href="<?php echo base_url('index.php/Laporan/jurusan') ?>"><i class="fa fa-circle-o"></i> Laporan Jurusan</a></li>
            <li><a href="<?php echo base_url('index.php/Laporan/universitas') ?>"><i class="fa fa-circle-o"></i> Laporan Universitas</a></li>
            <li><a href="<?php echo base_url('index.php/Laporan/kriteria') ?>"><i class="fa fa-circle-o"></i> Laporan Kriteria</a></li>
            <li><a href="<?php echo base_url('index.php/Peserta/akademik') ?>"><i class="fa fa-circle-o"></i>Laporan Nilai</a></li>
          </ul>
          </ul>
        </li>
     <?php }?> 

    </ul>
  </section>
<!-- /.sidebar -->
</aside>