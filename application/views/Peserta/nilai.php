<script>
  function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

<!-- Content Wrapper-->
<div class="content-wrapper">

  <!--Content header-->
  <section class="content-header">
    <h1><?php echo $judulhalaman ?></h1>
  </section>

  <!--Main content-->
  <section class="content">
    <div class='box box-danger'>
      <ol class="breadcrumb">
        <center>
          <li><button class="btn btn-danger" target=_blank onclick="printContent('area')"><i class="fa fa-print text-white"> Cetak Laporan</i></button></li>
      </ol>
    </div>

    <div id="area">
      <div class='box box-danger'>
        <div class='box-header'>
          <button type="button" class="btn btn-danger" class="btn btn-box-tool pull-right" data-widget="collapse">Nilai Kriteria</button>
        </div>

        <div class="col-md-5">
        </div>

        <div class="box-body">
          <table class="table table-bordered text-center ">

            <thead>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <?php
                foreach ($pengguna as $out) {
                  echo "<th>" . $out->nama_kriteria . "</th>";
                }
                ?>
              </tr>
            </thead>

            <tbody class="">
              <?php $i = 0;
              if ($peringkat != 0) {
                foreach ($peringkat as $akhir) {
                  echo
                  "<tr>" .
                    "<td>" . $akhir->nama_universitas . "</td>" .
                    "<td>" . $akhir->jurusan . "</td>";

                  foreach ($pengguna as $out) {
                    $this->load->model('Nilai_utility_model');
                    $utility = $this->Nilai_utility_model->get_data_kiteria($akhir->id_nilai_akhir, $out->id_kriteria);
                    echo "<td>" . $utility->nilai_kriteria . "</td>";
                  }
                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>
          <br>
        </div>
      </div>

      <div class='box box-danger'>
        <div class='box-header'>
          <button type="button" class="btn btn-danger" class="btn btn-box-tool pull-left" data-widget="collapse">Nilai Utility</button>
        </div>

        <div class="col-md-5">
        </div>

        <div class="box-body">
          <table class="table table-bordered text-center ">
            <thead>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <?php
                foreach ($pengguna as $out) {
                  echo "<th>" . $out->nama_kriteria . "</th>";
                }
                ?>
              </tr>
            </thead>

            <tbody class="">
              <?php $i = 0;
              if ($peringkat != 0) {
                foreach ($peringkat as $akhir) {
                  echo
                  "<tr>" .
                    "<td>" . $akhir->nama_universitas . "</td>" .
                    "<td>" . $akhir->jurusan . "</td>";
                  foreach ($pengguna as $out) {
                    $this->load->model('Nilai_utility_model');
                    $utility = $this->Nilai_utility_model->get_data_kiteria($akhir->id_nilai_akhir, $out->id_kriteria);
                    echo "<td>" . $utility->nilai_utility . "</td>";
                  }
                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>

          <br>
        </div>
      </div>

      <div class='box box-danger box box-primary'>
        <div class='box-header'>
          <button type="button" class="btn btn-danger" class="btn btn-box-tool pull-left" data-widget="collapse">Nilai Akhir Penilaian</button>
        </div>

        <div class="col-md-5">
        </div>

        <div class="box-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Nilai</th>
              </tr>
            </thead>

            <tbody class="">
              <?php $i = 0;
              if ($peringkat != 0) {
                foreach ($peringkat as $out) {
                  echo
                  "<tr>" .
                    "<td>" . $out->nama_universitas . "</td>" .
                    "<td>" . $out->jurusan . "</td>" .
                    "<td class='col-md-1'>" . $out->nilai_akhir . "</td>";
                  echo "</tr>";
                  $i++;
                }
              }
              ?>
            </tbody>
          </table>

          <br>
        </div>
      </div>

      <div class='box box-danger box box-primary'>
        <div class='box-header'>
          <button type="button" class="btn btn-danger" class="btn btn-box-tool pull-left" data-widget="collapse">Ranking Jurusan yang diminati</button>
        </div>

        <div class="col-md-5">
        </div>

        <div class="box-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Peringkat</th>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Nilai</th>
              </tr>
            </thead>

            <tbody class="">
              <?php $i = 0;
              if ($peringkat1 != 0) {
                foreach ($peringkat1 as $out1) {
                  echo
                  "<tr>" .
                    "<td>" . ($i + 1) . "</td>" .
                    "<td>" . $out1->nama_universitas . "</td>" .
                    "<td>" . $out1->jurusan . "</td>" .
                    "<td class='col-md-1'>" . number_format($out1->nilai_akhir, 3) . "</td>";
                  echo "</tr>";
                  $i++;
                }
              }
              ?>
            </tbody>
          </table>
          <br>
        </div>
      </div>
    </div>
  </section>
</div>