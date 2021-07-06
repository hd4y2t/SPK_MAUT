 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!-- <h1>
            <?php echo $judulhalaman ?>
            
          </h1> -->
         
        </section>

        <!-- Main content -->
        <section class="content">
         
              
          <!-- Main row -->
        <div class="row">
           <div class="col-md-7">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title ">Pendaftaran Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "<?php echo base_url('index.php/Pegawai/insert');?>/" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Nama User</label>

                  <div class="col-sm-7">
                    <input type="input" class="form-control" name="nama" placeholder="Nama User" required/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="identitas" class="col-sm-3 control-label">No Induk Pegawai</label>
                  <div class="col-sm-7">
                    <input type="input" class="form-control" name="nip" placeholder="NIP" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label for="JK" class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="unit_pegawai">
                        <option  value="Admin">Admin</option>
                        <option  value="Siswa">Siswa</option>
                     </select>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="" class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Wanita">Wanita</option>
                     </select>
                  </div>
              </div>


                <div class="form-group"> 
                  <label for="Tempat" class="col-sm-3 control-label fa fa-calendar"> Tanggal Lahir</label>
                      <div class="date col-sm-7">
                      <input type="text" class="form-control pull-right" id="jadwalPemakaian0" name="tgl_lahir" required/>
                    </div>
                </div>
<!-- 
                <div class="form-group">
                  <label for="identitas" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div> -->


                <div class="form-group">
                  <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="alamat" required/></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="HP" class="col-sm-3 control-label">No HP</label>
                  <div class="col-sm-7">
                    <input type="input" class="form-control" name="no_hp" placeholder="No HP" required/>
                  </div>
                       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                 <a href="<?php echo base_url('index.php/Pegawai') ?>">
                    <button type="button" class="btn "><i class="fa fa-reply"> Back</i></button>
                </a>
                <button type="submit" class="btn btn-info pull-right">Daftar</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
         
        

            </section><!-- right col -->

          </div><!-- /.row (main row) -->


