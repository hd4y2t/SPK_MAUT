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

      <div class="box-body">
        <?php if($this->session->flashdata('berhasil')): ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><div class="icon fa fa-check">Sukses!</h4>
                <?php echo $this->session->flashdata('berhasil');?>
          </div>
        <?php endif; ?>
          
        <?php if($this->session->flashdata('gagal')): ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4> <div class="icon fa fa-check">Gagal!</h4>
                <?php echo $this->session->flashdata('gagal');?>
          </div>
        <?php endif; ?>
          
        <table class="table table-bordered text-center" id="persediaan_keluar" >
          <thead>
            <tr>
              <th>No</th>
              <th>Universitas</th>
            </tr>
          </thead>

          <tbody class="">
            <?php $i=0; if($pengguna != 0)
              {                  
                foreach ($pengguna as $out)
                {
                  echo 
                  "<tr>".
                  "<td>".($i+1)."</td>".
                  "<td>".$out->nama_universitas."</td>";      
                                              
                   echo "</tr>";
                    $i++;
                }
              }                 
            ?>
          </tbody>              
        </table>
      </div>
    </div>
  </section>
</div>

