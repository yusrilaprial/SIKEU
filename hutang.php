<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kelola Hutang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require 'sidebar.php';

  $pendapatan = mysqli_query($koneksi, "SELECT id_pemasukan FROM pemasukan");
  $pendapatan = mysqli_num_rows($pendapatan);

  $pengeluaran = mysqli_query($koneksi, "SELECT id_pengeluaran FROM pengeluaran");
  $pengeluaran = mysqli_num_rows($pengeluaran);

  $hutang = mysqli_query($koneksi, "SELECT id_hutang FROM hutang");
  $hutang = mysqli_num_rows($hutang);

  $year = date('Y');

  $des1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-12-01' AND '$year-12-31'");
  while ($des2 = mysqli_fetch_array($des1)){
    $des3[] = $des2['jumlah'];
  }
  if($des3>0){
    $des = array_sum($des3);
  }else{
  $des = NULL;
  }

  $nov1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-11-01' AND '$year-11-30'");
  while ($nov2 = mysqli_fetch_array($nov1)){
    $nov3[] = $nov2['jumlah'];
  }
  if($nov3>0){
    $nov = array_sum($nov3);
  }else{
  $nov = NULL;
  }

  $okt1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-10-01' AND '$year-10-31'");
  while ($okt2 = mysqli_fetch_array($okt1)){
    $okt3[] = $okt2['jumlah'];
  }
  if($okt3>0){
    $okt = array_sum($okt3);
  }else{
  $okt = NULL;
  }

  $sep1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-09-01' AND '$year-09-30'");
  while ($sep2 = mysqli_fetch_array($sep1)){
    $sep3[] = $sep2['jumlah'];
  }
  if($sep3>0){
    $sep = array_sum($sep3);
  }else{
  $sep = NULL;
  }

  $ags1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-08-01' AND '$year-08-31'");
  while ($ags2 = mysqli_fetch_array($ags1)){
    $ags3[] = $ags2['jumlah'];
  }
  if($ags3>0){
    $ags = array_sum($ags3);
  }else{
  $ags = NULL;
  }

  $jul1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-07-01' AND '$year-07-31'");
  while ($jul2 = mysqli_fetch_array($jul1)){
    $jul3[] = $jul2['jumlah'];
  }
  if($jul3>0){
    $jul = array_sum($jul3);
  }else{
  $jul = NULL;
  }

  $jun1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-06-01' AND '$year-06-30'");
  while ($jun2 = mysqli_fetch_array($jun1)){
    $jun3[] = $jun2['jumlah'];
  }
  if($jun3>0){
    $jun = array_sum($jun3);
  }else{
  $jun = NULL;
  }

  $mei1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-05-01' AND '$year-05-31'");
  while ($mei2 = mysqli_fetch_array($mei1)){
    $mei3[] = $mei2['jumlah'];
  }
  if($mei3>0){
    $mei = array_sum($mei3);
  }else{
  $mei = NULL;
  }

  $apr1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-04-01' AND '$year-04-30'");
  while ($apr2 = mysqli_fetch_array($apr1)){
    $apr3[] = $apr2['jumlah'];
  }
  if($apr3>0){
    $apr = array_sum($apr3);
  }else{
  $apr = NULL;
  }

  $mar1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-03-01' AND '$year-03-31'");
  while ($mar2 = mysqli_fetch_array($mar1)){
    $mar3[] = $mar2['jumlah'];
  }
  if($mar3>0){
    $mar = array_sum($mar3);
  }else{
  $mar = NULL;
  }

  $feb1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-02-01' AND '$year-02-28'");
  while ($feb2 = mysqli_fetch_array($feb1)){
    $feb3[] = $feb2['jumlah'];
  }
  if($feb3>0){
    $feb = array_sum($feb3);
  }else{
  $feb = NULL;
  }

  $jan1 = mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang BETWEEN '$year-01-01' AND '$year-01-31'");
  while ($jan2 = mysqli_fetch_array($jan1)){
    $jan3[] = $jan2['jumlah'];
  }
  if($jan3>0){
    $jan = array_sum($jan3);
  }else{
  $jan = NULL;
  }

  ?>

  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Content Row -->
      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Hutang Tahun <?= $year ?> </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myBarChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Pendapatan
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-danger"></i> Pengeluaran
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-info"></i> Hutang
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Page Heading -->
      <?php if ($_SESSION['id'] != 2) { ?>
      <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Hutang</i></button><br>
      <?php } ?>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Hutang</h6>
        </div>
        <div class="card-body">
          <div style="float: right;">
            <!-- form filter data berdasarkan range tanggal  -->
            <form action="hutang.php" method="get">
              <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <input type="date" class="form-control" name="dari" required>
                </div>
                <div class="col-auto">
                  -
                </div>
                <div class="col-auto">
                  <input type="date" class="form-control" name="ke" required>
                </div>
                <div class="col-auto">
                  <button class="fas fa-eye btn btn-success" type="submit"></button>
                </div>
              </div>
            </form>
            <br>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No. Urut</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Kreditur</th>
                  <th>Alasan</th>
                  <?php if ($_SESSION['id'] != 2) { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No. Urut</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Kreditur</th>
                  <th>Alasan</th>
                  <?php if ($_SESSION['id'] != 2) { ?>
                  <th>Aksi</th>
                  <?php } ?>
                </tr>
              </tfoot>
              <tbody>
                <?php
                //jika tanggal dari dan tanggal ke ada maka
                if (isset($_GET['dari']) && isset($_GET['ke'])) {
                  // tampilkan data yang sesuai dengan range tanggal yang dicari
                  $query = mysqli_query($koneksi, "SELECT * FROM hutang WHERE tgl_hutang BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
                } else {
                  $query = mysqli_query($koneksi, "SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
                }
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['tgl_hutang'] ?></td>
                    <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                    <td><?= $data['penghutang'] ?></td>
                    <td><?= $data['alasan'] ?></td>
                    <?php if ($_SESSION['id'] != 2) { ?>
                    <td>
                      <!-- Button untuk modal -->
                      <a href="#" type="button" class=" fa fa-edit btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a>
                    </td>
                    <?php } ?>
                  </tr>
                  <!-- Modal Edit Mahasiswa-->
                  <div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Data Hutang</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="proses-edit-hutang.php" method="get">

                            <?php
                            $id = $data['id_hutang'];
                            $query_edit = mysqli_query($koneksi, "SELECT * FROM hutang WHERE id_hutang='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {
                            ?>


                              <input type="hidden" name="id_hutang" value="<?php echo $row['id_hutang']; ?>">

                              <div class="form-group">
                                <label>Id</label>
                                <input type="text" name="id_hutang" class="form-control" value="<?php echo $row['id_hutang']; ?>" disabled>
                              </div>

                              <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tgl_hutang" class="form-control" value="<?php echo $row['tgl_hutang']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Kreditur</label>
                                <input type="text" name="penghutang" class="form-control" value="<?php echo $row['penghutang']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Alasan</label>
                                <input type="text" name="alasan" class="form-control" value="<?php echo $row['alasan']; ?>">
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Ubah</button>
                                <a href="hapus-hutang.php?id_hutang=<?= $row['id_hutang']; ?>" Onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                              </div>
                            <?php
                            }
                            //mysql_close($host);
                            ?>

                          </form>
                        </div>
                      </div>

                    </div>
                  </div>



                  <!-- Modal -->
                  <div id="myModalTambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- konten modal-->
                      <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Hutang</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="tambah-hutang.php" method="get">
                          <div class="modal-body">
                            Tanggal :
                            <input type="date" class="form-control" name="tgl_hutang" required>
                            Jumlah :
                            <input type="number" class="form-control" name="jumlah" required>
                            Kreditur :
                            <input type="text" class="form-control" name="penghutang" required>
                            Alasan :
                            <input type="text" class="form-control" name="alasan" required>
                          </div>
                          <!-- footer modal -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                      </div>
                    </div>

                  </div>
          </div>


        <?php
                }
        ?>
        </tbody>
        </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php require 'footer.php' ?>

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require 'logout-modal.php'; ?>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Page level custom scripts -->

  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des" ],
        datasets: [{
          label: "Hutang",
          backgroundColor: "#36b9cc",
          hoverBackgroundColor: "#2c9faf",
          borderColor: "#4e73df",
          data: [<?php echo $jan ?>, <?php echo $feb ?>, <?php echo $mar ?>, <?php echo $apr ?>, <?php echo $mei ?>, <?php echo $jun ?>, <?php echo $jul ?>, <?php echo $ags ?>, <?php echo $sep ?>, <?php echo $okt ?>, <?php echo $nov ?>, <?php echo $des ?>],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 12
            },
            maxBarThickness: 25,
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        },
      }
    });

  </script>

  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pendapatan", "Pengeluaran", "Hutang"],
        datasets: [{
          data: [<?php echo $pendapatan ?>, <?php echo $pengeluaran ?>, <?php echo $hutang ?>],
          backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>

</body>

</html>