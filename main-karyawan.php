<?php include 'koneksi.php';
include 'funct.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman Daftar Anggota
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Master</a></li>
      <li class="active">Anggota</li>
      <li class="active">Daftar Anggota</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Anggota Koperasi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM karyawan  WHERE level='2' order by id");
        ?>
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr class="info">
              <th>
                <center>No</center>
              </th>
              <th>
                <center>ID</center>
              </th>
              <th>
                <center>Nama</center>
              </th>
              <th>
                <center>Alamat</center>
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
                <center>
                  <?php echo $data['id']; ?>
                </center>
              </td>
              <td>
                <?php echo $data['username']; ?>
              </td>
              <td>
                <?php echo $data['alamat']; ?>
              </td>
              <td>
                <center>
                  <a href="page-form-anggota.php?id_anggota=<?php echo $data['id_anggota']; ?>&reqa=edit"
                    title="Edit Data Ini" class="btn btn-danger btn-sm"><i class="fa fa-edit "></i> Edit
                  </a>
                  <a href="proses.php?id_anggota=<?php echo $data['id_anggota']; ?>&reqa=dell" title="Lihat Detail"
                    class="btn btn-success btn-sm"><span class="fa fa-info"> Detail</span>
                  </a>
                  <a href="proses.php?id_anggota=<?php echo $data['id_anggota']; ?>&reqa=dell"
                    title="Berhenti Jadi Anggota" class="btn btn-warning btn-sm"
                    onClick="return confirm('Yakin mau berhenti?');"><span class="fa fa-share"> Berhenti</span>
                  </a>
                </center>
              </td>
            </tr>
            <?php
                $no++;
              }
              ?>
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