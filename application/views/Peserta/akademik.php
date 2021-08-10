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
      </div>
      <div class="col-md-5">

      </div>

      <table class="table table-bordered text-center " id="persediaan_keluar">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <!-- <th>Angkatan</th> -->
            <th>Action</th>
          </tr>
        </thead>

        <tbody class="">
          <?php $i = 0;
          if ($pengguna != 1) {
            foreach ($pengguna as $out) {
              echo
              "<tr>" .
                "<td>" . ($i + 1) . "</td>" .
                "<td>" . $out->nik   . "</td>" .
                "<td>" . $out->nama_pegawai . "</td>" .
                // "<td>" . $out->angkatan . "</td>" .
                '<td class="col-md-2">
                            <center>
                                <a class="btn btn-social-icon" href="' . base_url("index.php/Peserta/nilai/" . $out->id_pegawai) . '"><i class="fa fa-eye text-green"></i></a> 
                                
                            </center>
                        </td>';

              echo "</tr>";
              $i++;
            }
          }

          ?>
        </tbody>
        <tfoot>
          <tr>
            <th align="center" colspan="3" class="text-blue "> <strong></strong></th>

          </tr>
        </tfoot>
      </table>
    </div>
</div>