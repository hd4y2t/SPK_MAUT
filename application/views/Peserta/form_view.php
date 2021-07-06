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
        <div class="box box-danger">
          <div class="box-body">
            <form class="form-horizontal" action = "<?php echo base_url('index.php/peserta/insert_edit');?>/" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="HP" class="col-sm-6">Universitas</label>
                  <div class="col-sm-6"><?php echo $nilai_akhir->nama_universitas; ?>
                    <input type="hidden" name="id_nilai_akhir" value="<?php echo $nilai_akhir->id_nilai_akhir; ?>">
                  </div>
                </div>
        
                <div class="form-group">
                  <label for="HP" class="col-sm-6">Jurusan</label>
                  <div class="col-sm-6">
                    <?php echo $nilai_akhir->jurusan; ?>
                  </div>
                </div>

                  <center>
                  <div class="box box-danger ">
                    <div class='box-header with-border'> 
                          <button type="button" class="btn btn-danger" data-widget="collapse">Form Pertanyaan</i></button>
                    </div>
                      <?php 

                        foreach ($pengguna as $golongan)
                        {
                          $nilai_dosen=$this->Nilai_utility_model->get_data_kiteria($nilai_akhir->id_nilai_akhir,$golongan->id_kriteria);
                          if ($nilai_dosen->nilai_kriteria == 1) {
                            $nilai="D";
                          }
                          elseif ($nilai_dosen->nilai_kriteria == 2) {
                            $nilai="C";
                          }
                          elseif ($nilai_dosen->nilai_kriteria == 3) {
                            $nilai="B";
                          }
                          elseif ($nilai_dosen->nilai_kriteria == 4) {
                            $nilai="A";
                          }
                          echo '                    
                          <div class="box-body">
                            <label for="HP" class="col-md-6">'.$golongan->nama_kriteria.'</label>
                            <div class="col-sm-6">
                              '.$nilai.'
                            </div>
                          </div>';
                      }?>
                  </div>   

                <div class="box-footer">
                  <a href="<?php echo base_url('index.php/peserta') ?>">
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>                      
  </section>
</div>