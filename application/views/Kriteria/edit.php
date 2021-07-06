<!--Content wrapper-->
<div class="content-wrapper">
  
  <!-- Content header-->
  <section class="content-header">
    <h1><?php echo $judulhalaman ?></h1>
  </section>

  <!-- =Main content-->
  <section class="content">
         
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">

        <!--Box-->
        <div class="box box-danger">
          <div class="box-header ">
            <form class="form-horizontal" action = "<?php echo base_url('index.php/Kriteria/edit/'.$pengguna->id_kriteria);?>/" method="post">                
              
              <div class="form-group">
                <label for="inputnama" class="col-sm-6">Nama Kriteria</label>
                  <div class="col-sm-6">
                    <input type="input" class="form-control" name="nama_kriteria" placeholder="Kriteria" value="<?php echo $pengguna->nama_kriteria; ?>" required/>
                  </div>
              </div>
                
              <div class="form-group">
                <label for="identitas" class="col-sm-6">Bobot</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control" name="bobot" placeholder="bobot" value="<?php echo $pengguna->bobot; ?>" required/>
                  </div>
              </div>

              <button type="submit" class="btn btn-danger pull-right">Simpan</button>
            </form>
          </div>
        </div>
      </div> 
    </div>                     
  </section>
</div>


