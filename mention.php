<?php
require 'cek-sesi.php';
?>
<?php
require 'cek_admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mention</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php require 'koneksi.php'; ?>
  <?php require 'sidebar.php'; ?>
  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <h3>Mention</h3>

      <?php require 'user.php'; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">



      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Mention</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mention</th>
                  <th>Isi Mention</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM catatan");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                  <tr>
                    <td><?= $data['id_catatan'] ?></td>
                    <td>
                      <?php
                      if ($data['id_catatan'] <= 2) {
                        echo "Pendapatan";
                      } else {
                        echo "Pengeluaran";
                      }
                      ?>
                    </td>
                    <td><?= $data['catatan'] ?></td>
                    <td>
                      <!-- Button untuk modal -->
                      <a href="#" type="button" class=" fa fa-edit btn btn-<?php $data['id_catatan'] <= 2 ? print("success") : print("danger") ?> btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_catatan']; ?>"></a>
                    </td>
                  </tr>
                  <!-- Modal Edit profile-->
                  <div class="modal fade" id="myModal<?php echo $data['id_catatan']; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Mention</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="proses-edit-mention.php" method="get">

                            <?php
                            $id = $data['id_catatan'];
                            $query_edit = mysqli_query($koneksi, "SELECT * FROM catatan WHERE id_catatan='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {
                            ?>

                              <input type="hidden" name="id_catatan" value="<?php echo $row['id_catatan']; ?>">

                              <div class="form-group">
                                <label>Isi Mention</label>
                                  <textarea type="text" class="form-control" name="catatan"><?php echo $row['catatan']; ?></textarea>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Ubah</button>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>