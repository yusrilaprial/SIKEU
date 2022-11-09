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

  <title>Kelola User</title>

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
      <h3>User</h3>

      <?php require 'user.php'; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <?php
      if ($_SESSION['id'] == 1) {
      ?><button type="button" class="btn btn-success" style="margin:5px; visibility:<?= $lihat ?>" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> User</i></button><br><?php
                                                                                                                                                                                        }
                                                                                                                                                                                          ?>



      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kelola User</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $id = $_SESSION['id'];
                if ($id == 1) {
                  $query = mysqli_query($koneksi, "SELECT * FROM admin");
                } else {
                  $query = mysqli_query($koneksi, "SELECT * FROM admin where id_admin = '$id'");
                }
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                  <tr>
                    <td><?= $data['id_admin'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td>
                      <?php
                      if ($data['id_admin'] == 1) {
                        echo "Admin";
                      } elseif ($data['id_admin'] == 2) {
                        echo "Pimpinan";
                      } else {
                        echo "Pegawai";
                      }
                      ?>
                    </td>
                    <td><?= $data['email'] ?></td>
                    <td>
                      <!-- Button untuk modal -->
                      <a href="#" type="button" class=" fa fa-edit btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_admin']; ?>"></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Mahasiswa-->
                  <div class="modal fade" id="myModal<?php echo $data['id_admin']; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Data User</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="proses-edit-admin.php" method="get">

                            <?php
                            $id = $data['id_admin'];
                            $query_edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {
                            ?>


                              <input type="hidden" name="id_admin" value="<?php echo $row['id_admin']; ?>">

                              <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="id" class="form-control" value="<?php echo $row['id_admin']; ?>" disabled>
                              </div>

                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                              </div>


                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="pass" class="form-control" value="<?php echo $row['pass']; ?>">
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Ubah</button>
                                <?php if ($row['id_admin'] != 1) { ?>
                                  <a href="hapus-admin.php?id_admin=<?= $row['id_admin']; ?>" Onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                <?php } ?>
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
                          <h4 class="modal-title">Tambah User</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="tambah-admin.php" method="get">
                          <div class="modal-body">
                            Nama :
                            <input type="text" class="form-control" name="nama" required>
                            Email :
                            <input type="email" class="form-control" name="email" required>
                            Password :
                            <input type="text" class="form-control" name="pass" required>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>