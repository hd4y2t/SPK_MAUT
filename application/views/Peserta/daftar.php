<!--Content Wrapper-->
<div class="content-wrapper">

  <!--Content Header-->
  <section class="content-header">
    <h1><?php echo $judulhalaman ?></h1>
  </section>

  <!--Main content-->
  <section class="content">
    <div class='box box-danger'>

      <!--untuk admin-->
      <div class='box-header'>

        <label> Nama Siswa : <?= $pegawai['nama_pegawai']; ?></label>
      </div>
      <div class="col-md-5">

      </div>

      <div class="box-body">
        <?php if ($this->session->flashdata('berhasil')) : ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Sukses!</h4>
            <?php echo $this->session->flashdata('berhasil'); ?>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('gagal')) : ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Gagal!</h4>
            <?php echo $this->session->flashdata('gagal'); ?>
          </div>
        <?php endif; ?>

        <table class="table table-bordered text-center " id="persediaan_keluar">
          <thead>
            <tr>
              <th>No</th>
              <th>Universitas</th>
              <th>Jurusan</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody class="">
            <?php $i = 0;
            if ($pengguna != 0) {
              // foreach ($pengguna as $out) {
              //   echo
              //   "<tr>" .
              //     "<td>" . ($i + 1) . "</td>" .
              //     "<td>" . $out->nama_universitas . "</td>" .
              //     "<td>" . $out->jurusan . "</td>";
              //   echo '<td class="col-md-2">
              //       <center>
              //       <a class="btn btn-social-icon btn-danger" href="' . base_url("index.php/Peserta/delete/" . $out->id_nilai_akhir) . '"><i class="fa fa-remove"></i></a>  
              //       <a class="btn btn-social-icon btn-facebook" href="' . base_url("index.php/Peserta/edit/" . $out->id_nilai_akhir) . '"><i class="fa fa-pencil"></i></a> 
              //       <a class="btn btn-social-icon btn-warning" href="' . base_url("index.php/Peserta/view/" . $out->id_nilai_akhir) . '"><i class="fa fa-eye"></i></a>  ';
              //   echo '</center>
              //       </td>';
              //   echo "</tr>";
              //   $i++;
              if ($this->session->userdata('unit_pegawai') == "Admin") {

                foreach ($pengguna as $out) {
                  echo
                  "<tr>" .
                    "<td>" . ($i + 1) . "</td>" .
                    "<td>" . $out->nama_universitas . "</td>" .
                    "<td>" . $out->jurusan . "</td>";
                  echo '<td class="col-md-2">
                    <center>
                    <a class="btn btn-social-icon btn-danger" href="' . base_url("index.php/Peserta/delete/" . $out->id_nilai_akhir) . '"><i class="fa fa-remove"></i></a>  
                    <a class="btn btn-social-icon btn-facebook" href="' . base_url("index.php/Peserta/edit/" . $out->id_nilai_akhir) . '"><i class="fa fa-pencil"></i></a> 
                    <a class="btn btn-social-icon btn-warning" href="' . base_url("index.php/Peserta/view/" . $out->id_nilai_akhir) . '"><i class="fa fa-eye"></i></a>  ';
                  echo '</center>
                    </td>';
                  echo "</tr>";
                  $i++;
                }
              } else {
                foreach ($pengguna as $out) {
                  echo
                  "<tr>" .
                    "<td>" . ($i + 1) . "</td>" .
                    "<td>" . $out->nama_universitas . "</td>" .
                    "<td>" . $out->jurusan . "</td>";
                  echo '<td class="col-md-2">
                    <center>
                  <a class="btn btn-social-icon btn-warning" href="' . base_url("index.php/Peserta/view/" . $out->id_nilai_akhir) . '"><i class="fa fa-eye"></i></a>  ';
                  echo '</center>
                    </td>';
                  echo "</tr>";
                  $i++;
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
  </section>
</div>