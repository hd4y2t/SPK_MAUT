<!--Content wrapper-->
<div class="content-wrapper">
  
  <!--Content header-->
  <section class="content-header"> 
          <button type="button" onclick="window.print()" class="btn btn-info fa fa-print"></button>   
  </section>  

  <!--Main content-->
  <section class="content">
   
    <!--Box-->
    <div class='box box-danger'>
      <div class='box-header text-center'> 
    <h1><?php echo $judulhalaman ?></h1>
         
      </div>
            <div class="col-md-5">
            
            </div> 
             <div class="box-body">
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
          
           <table  class="table table-bordered text-center "  id="persediaan_keluar" >
                <thead>
                  <tr>
                    <th> No</th>
                    <th>User</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th class="col-md-1">Jenis Kelamin</th>
                    <th class="col-md-1">Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                  </tr>
                </thead>
                
                <tbody class="">
                  <?php $i=0; if($pengguna != 0)
                  {                  
                    foreach ($pengguna as $out) {
                    echo 
                      "<tr>".
                       "<td>".($i+1)."</td>".
                        "<td>".$out->nama_pegawai."</td>".
                        "<td>".$out->nik."</td>".
                        "<td>".$out->jabatan."</td>".
                        "<td class='col-md-1'>".$out->jenis_kelamin."</td>".
                        "<td class='col-md-1'>".$out->tgl_lahir."</td>".
                        "<td>".$out->alamat."</td>".
                        "<td>".$out->no_telp."</td>";             
                      echo "</tr>";
                       $i++;
                    }
                   }
                 
                  ?>
                </tbody>
                </form>
                <tfoot>
                  <tr>
                    <th align="center" colspan="9" class="text-blue "> <strong>Daftar Pegawai</strong></th>
                                       
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

