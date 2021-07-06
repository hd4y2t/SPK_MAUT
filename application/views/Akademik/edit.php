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
              <h3 class="box-title ">Pendaftaran Akademik</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action = "<?php echo base_url('index.php/Akademik/edit/'.$pengguna->id_akademik);?>/" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Tahun</label>

                  <div class="col-sm-7">
                    <input type="input" class="form-control" name="tahun" placeholder="Nama Akademik" value="<?php echo $pengguna->tahun; ?>">
                  </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                 <a href="<?php echo base_url('index.php/Akademik') ?>">
                    <button type="button" class="btn btn-danger "><i class="fa fa-reply"></i></button>
                </a>
                <button type="submit" class="btn btn-info pull-right fa fa-save"></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>
        </div>                      
         
        

            </section><!-- right col -->

          </div><!-- /.row (main row) -->


