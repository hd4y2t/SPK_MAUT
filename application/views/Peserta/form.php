<!-- Content Wrapper-->
<div class="content-wrapper">

  <!--Content header-->
  <section class="content-header">
    <h1><?php echo $judulhalaman ?></h1>
  </section>

  <!--Main content-->
  <section class="content">
  
    <!--Main row-->
    <div class="row">
      <div class="col-md-12">

        <!--Box-->
        <div class="box box-info">
          <?php if($this->session->flashdata('berhasil')): ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i>Sukses!</h4>
                <?php echo $this->session->flashdata('berhasil');?>
          </div>       
        <?php endif; ?>
        
        <?php if($this->session->flashdata('gagal')): ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i>Gagal!</h4>
                <?php echo $this->session->flashdata('gagal');?>
          </div>
        <?php endif; ?>
          <div class="box-body">
            <form class="form-horizontal" action = "<?php echo base_url('index.php/peserta/insert');?>/" method="post">

<!--               <div class="form-group">
                <label for="HP" class="col-sm-6">NIM Mahasiswa</label>
                <div class="col-sm-6">
                  <input type="input" class ="form-control" name="nim" placeholder="NIM Mahasiswa">
                </div>
              </div> -->

              <div class="form-group">
                <label for="HP" class="col-sm-6">Universitas</label>
                <div class="col-sm-6">
                  <select class ="form-control" name="id_universitas">
                    <?php 
                      foreach ($univ as $golongan)
                      {
                        echo '<option value='.$golongan->id_universitas.' >'.$golongan->nama_universitas;'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>

                <div class="form-group">
                  <label for="HP" class="col-sm-6">Jurusan</label>
                  <div class="col-sm-6 ">
                    <select class ="form-control" name="id_jurusan">
                        <?php 
                          foreach ($jurusan as $golongan) {
                               echo '<option value='.$golongan->id_jurusan.' >'.$golongan->jurusan;'</option>';
                          }
                        ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="HP" class="col-sm-6">Akademik</label>
                  <div class="col-sm-6 ">
                    <select class ="form-control" name="id_akademik">
                        <?php 
                          foreach ($akademik as $golongan) {
                               echo '<option value='.$golongan->id_akademik.' >'.$golongan->tahun;'</option>';
                          }
                        ?>
                      </select>
                  </div>
                </div>
            
       
              <center>
              <div class="box box-info ">
                <div class='box-header with-border'> 
                  <button type="button" class="btn btn-danger" class="btn btn-box-tool pull-right" data-widget="collapse">Form pertanyaan</button>
                </div>
                <?php 
                  foreach ($pengguna as $golongan)
                  {
                    echo '                    
                    <div class="box-body">
                      <label for="HP" class="col-md-6">'.$golongan->nama_kriteria.'</label>
                      <div class="col-sm-6">   
                          <select class="form-control" name="'.$golongan->id_kriteria.'">
                            <option value="4">A </option>
                            <option value="3">B</option>
                            <option value="2">C</option>
                            <option value="1">D</option>
                          </select>
                      </div>
                    </div>';
                  }?>
              </div> 
              <!--box-body-->
              <div class="box-footer">
                <a href="<?php echo base_url('index.php/peserta') ?>">
                </a>
                <button type="submit" class="btn btn-danger pull-right">Simpan</button>
              </div>
              <!--box-footer-->
            </div>
          </form>
        </div>
      </div>
    </div>                      
  </section>
</div>