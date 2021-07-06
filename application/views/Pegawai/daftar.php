
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo $judulhalaman ?></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active"><?php echo $judulhalaman ?></li>
          </ol>
        </section>  

        <!-- Main content -->
        <section class="content">
          <div class='box box-primary'>
            <div class='box-header'> 
            <a href="<?php echo base_url('index.php/Pegawai/form') ?>">
                <button type="button" class="btn btn-danger"><i class="fa fa-plus"> Add Pegawai</i></button>
            </a>             
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
                    <th>Action</th>
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
                        "<td>".$out->no_telp."</td>".
                        '<td class="col-md-2">
                            <center>
                                <a class="btn btn-social-icon btn-danger" href="'.base_url("index.php/Pegawai/delete/".$out->id_pegawai).'"><i class="fa fa-remove"></i></a> 
                                <a class="btn btn-social-icon btn-facebook" href="'.base_url("index.php/Pegawai/data_edit/".$out->id_pegawai).'"><i class="fa fa-pencil"></i></a>  
                                
                            </center>
                        </td>';       
                                              
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

