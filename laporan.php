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

  <title>Laporan Keuangan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require 'sidebar.php'; ?>

  <!-- Main Content -->
  <div id="content">

    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Jumlah Transaksi </th>
                  <th>Jumlah Total Uang</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <?php
                $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan");
                while ($masuk = mysqli_fetch_array($pemasukan)) {
                  $arraymasuk[] = $masuk['jumlah'];
                }
                $jumlahmasuk = array_sum($arraymasuk);

                $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
                while ($keluar = mysqli_fetch_array($pengeluaran)) {
                  $arraykeluar[] = $keluar['jumlah'];
                }
                $jumlahkeluar = array_sum($arraykeluar);

                $menghutang = mysqli_query($koneksi, "SELECT * FROM hutang");
                while ($hutang = mysqli_fetch_array($menghutang)) {
                  $arrayhutang[] = $hutang['jumlah'];
                }
                $jumlahhutang = array_sum($arrayhutang);

                $query1 = mysqli_query($koneksi, "SELECT id_pemasukan FROM pemasukan");
                $query1 = mysqli_num_rows($query1);

                $query2 = mysqli_query($koneksi, "SELECT id_pengeluaran FROM pengeluaran");
                $query2 = mysqli_num_rows($query2);

                $query3 = mysqli_query($koneksi, "SELECT id_hutang FROM hutang");
                $query3 = mysqli_num_rows($query3);
                $no = 1;
                ?>
                <tr>
                  <td>Pemasukan</td>
                  <td><?= $query1 ?></td>
                  <td>Rp. <?= number_format($jumlahmasuk, 2, ',', '.'); ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a href="export-pemasukan.php?id=1" type="button" class="btn btn-warning btn-md" target="blank"><i class="fas fa-eye"></i></a>
                    <a href="#" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalpendapatan"><i class="fa fa-filter"></i></a>
                    <a href="export-pemasukan.php" type="button" class="btn btn-success btn-md"><i class="fa fa-download"></i></a>
                  </td>
                </tr>

                <tr>
                  <td>Pengeluaran</td>
                  <td><?= $query2 ?></td>
                  <td>Rp. <?= number_format($jumlahkeluar, 2, ',', '.'); ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a href="export-pengeluaran.php?id=1" type="button" class="btn btn-warning btn-md" target="blank"><i class="fas fa-eye"></i></a>
                    <a href="#" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalpengeluaran"><i class="fa fa-filter"></i></a>
                    <a href="export-pengeluaran.php" type="button" class="btn btn-success btn-md"><i class="fa fa-download"></i></a>
                  </td>
                </tr>

                <tr>
                  <td>Utang</td>
                  <td><?= $query3 ?></td>
                  <td>Rp. <?= number_format($jumlahhutang, 2, ',', '.'); ?></td>
                  <td>
                    <!-- Button untuk modal -->
                    <a href="export-hutang.php?id=1" type="button" class="btn btn-warning btn-md" target="blank"><i class="fas fa-eye"></i></a>
                    <a href="#" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_hutang"><i class="fa fa-filter"></i></a>
                    <a href="export-hutang.php" type="button" class="btn btn-success btn-md"><i class="fa fa-download"></i></a>
                  </td>
                </tr>

                <!-- Modal -->
                <div id="modalpendapatan" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- konten modal-->
                    <div class="modal-content">
                      <!-- heading modal -->
                      <div class="modal-header">
                        <h4 class="modal-title">Periode Pendapatan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <!-- body modal -->
                      <form action="export-pemasukan.php" method="get">
                        <div class="modal-body">
                          Dari :
                          <input type="date" class="form-control" name="dari" required>
                          Ke :
                          <input type="date" class="form-control" name="ke" required>
                        </div>
                        <!-- footer modal -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success"><i class="fa fa-download"></i></button>
                      </form>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                  </div>

                </div>
          </div>

          <!-- Modal -->
          <div id="modalpengeluaran" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- konten modal-->
              <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                  <h4 class="modal-title">Periode Pengeluaran</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <form action="export-pemasukan.php" method="get">
                  <div class="modal-body">
                    Dari :
                    <input type="date" class="form-control" name="dari" required>
                    Ke :
                    <input type="date" class="form-control" name="ke" required>
                  </div>
                  <!-- footer modal -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-download"></i></button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              </div>
            </div>

          </div>

        </div>
        <!-- Modal -->
        <div id="modal_hutang" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Periode Hutang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <form action="export-hutang.php" method="get">
                <div class="modal-body">
                  Dari :
                  <input type="date" class="form-control" name="dari" required>
                  Ke :
                  <input type="date" class="form-control" name="ke" required>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i></button>
              </form>
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
          </div>

        </div>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>