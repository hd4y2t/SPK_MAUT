<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header text-center">
          <h1>
          <strong>
            User Profile
            </strong>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          

            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h4 class="box-title">Profil Pegawai</h4>
                  <br><br>
                </div>

                    <form class="form-horizontal" action="<?php echo base_url('index.php/Profil');?>/update" method="post">
                      <div class="box-body">

                          <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label" >Nama</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nama" value="<?php echo $pengguna->nama_pegawai;?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Nomor Induk Pegawai</label>
                            <div class="col-sm-5">
                              <input type="input" class="form-control" name="nik" value="<?php echo $pengguna->nik;?>">
                            </div>
                          </div>
                          <!-- 
                          <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">jabatan</label>
                          <div class="col-sm-8">
                            <label for="inputName" class=" control-label"><?php echo $pengguna->jabatan;?></label>
                          </div>
                          </div>

                          <div class="form-group"> 
                            <label for="Tempat" class="col-sm-3 control-label fa fa-calendar"> Tanggal Lahir</label>
                              <div class="date col-sm-7">
                                  <input type="text" class="form-control pull-right" id="jadwalPemakaian0" name="tgl_lahir" value="<?php echo $pengguna->tgl_lahir; ?>">
                              </div>
                          </div>

                          <div class="form-group">
                             <label for="JK" class="col-sm-3 control-label">Jenis Kelamin</label>
                              <div class="col-sm-7">
                                <select class="form-control" name="jenis_kelamin">
                                    <?php 
                                        if($pengguna->jenis_kelamin =="Wanita")
                                        {
                                             echo '<option name="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>';
                                             echo '<option name="jenis_kelamin" value="Wanita" selected>Wanita</option>';
                                        }
                                        else
                                        {
                                           echo '<option name="jenis_kelamin" value="Laki-Laki" selected>Laki-Laki</option>';
                                           echo '<option name="jenis_kelamin" value="Wanita">Wanita</option>';
                                        }  
                                         
                                    ?>
                                 </select>
                              </div>
                          </div>

                          <div class="form-group">
                            <label for="inputSkills" class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="no_hp" placeholder="Skills" value="<?php echo $pengguna->no_telp;?>">
                            </div>
                            </div>
                          
                          <div class="form-group">
                              <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                              <div class="col-sm-7">
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $pengguna->alamat; ?></textarea>
                              </div>
                          </div>
                           -->
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Simpan</button>

                            </div>
                          </div>
                          <br>
                      </div>   
                    </form>
                   </div>

                  <!-- akhir profil -->

            </div><!-- /.col -->
  <!-- Ubah Password -->
  <div class="row">
            <div class="col-md-3">
        <div class="box box-primary">
         <div class="box-body box-profile">
                <form action="<?php echo base_url('index.php/Profil');?>/ubah_password" method="post">
                <div class="box-body">
                  <div class="form-group">
                        <p class="text-muted text-center">Password</p>
                        <div class="">
                          <input type="password" class="form-control text-center " id="password1" name="password1" placeholder="password lama">
                        </div>
                        <div class="">
                        <hr>
                          <input type="password" class="form-control text-center" id="password" name="password" placeholder="password baru">
                        </div>
                        <br>
                         <button type="submit" class="btn btn-primary btn-block"><b>Ubah</b></button>
                  </div>

                </div>
                </form>
                

          </div>
        </div>

                <!-- pembertihuaan -->
                     <?php if($this->session->flashdata('berhasil')): ?>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4>  <i class="icon fa fa-check"></i> Sukses!</h4>
                      <?php echo $this->session->flashdata('berhasil');?>
                    </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('gagal')): ?>
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4>  <i class="icon fa fa-check"></i> Gagal!</h4>
                      <?php echo $this->session->flashdata('gagal');?>
                    </div>
                  <?php endif; ?> 
                  <!--akhir pembertihuaan -->
                
        </div>
        </div>

                <!--/// Ubah Password -->
          

 
        </section><!-- /.content -->

      </div>

 