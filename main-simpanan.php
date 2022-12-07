<?php include 'koneksi.php';
include 'funct.php';
?>
<div class="content-wrapper">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <section class="content-header">
    <h1>
      Halaman Daftar Simpanan
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Simpanan</li>
      <li class="active">Data Simpanan</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Simpanan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM simpanan WHERE NOT nm_simpanan = 'Simpanan Pokok'");
        ?>
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr class="info">
              <th>
                <center>No</center>
              </th>
              <th>Nama Simpanan</th>
              <th>
                <center>ID Anggota</center>
              </th>
              <th>
                <center>Tanggal Simpanan</center>
              </th>
              <th>
                <center>Besar Simpanan</center>
              </th>
              <th>
                <center>Action</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) {
              ?>
              <td>
                <center>
                  <?php echo $no; ?>
                </center>
              </td>
              <td>
                <?php echo $data['nm_simpanan']; ?>
              </td>
              <td>
                <center>
                  <?php echo $data['id_anggota']; ?>
                </center>
              </td>
              <td>
                <?php echo TanggalIndo($data['tgl_simpanan']); ?>
              </td>
              <td>
                <?php echo numberrupiah($data['besar_simpanan']) ?>
              </td>
              <td>
                <center>
                  <a href="proses.php?id_simpanan=<?php echo $data['id_simpanan']; ?>&reqs=dell"
                    title="Hapus Simpanan Ini" class="btn btn-danger btn-sm"
                    onClick="returnconfirm();"><span class="glyphicon glyphicon-trash">
                      Hapus</span> </a>
                </center>
              </td>
            </tr>
            <?php
                $no++;
              }
              ?>
            <script>
            function returnconfirm(){
              swal({
              title: "Anda Yakin Akan Berhenti?",
              text: "Data Tidak Bisa Dipulihkan Setelah Di Hapus",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete.isConfirmed) {
                swal('Data Di Hapus', '', 'success');
              } else {
                swal(' Cancelled', '', 'error');
              }
            });
            }
          </script>
          </tbody>
        </table>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>