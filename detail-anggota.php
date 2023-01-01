<?php
include 'koneksi.php';
$sql = "SELECT * FROM anggota WHERE id_anggota='" . $_GET['id_anggota'] . "'";
$tampil = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($tampil);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="div1">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>KOPERASI SIMPAN PINJAM</h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Admin Koperasi Makmur
                    <small class="pull-right">
                        <?php echo date('d-m-Y') ?>
                    </small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row --><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive"></div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <script>
            function printContent(el) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
        </script>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Sambutan</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Menjadi bagian dari koperasi mantap gan
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Nama Anggota</th>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Anggota</th>
                            <td><?php echo $data['id_anggota']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>
                                <?php echo $data['alamat']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td>
                                <?php echo $data['tmp_lahir'] . $data['tgl_lahir']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                <?php echo $data['j_kel']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>No_telepon</th>
                            <td>
                                <?php echo $data['no_telp']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Simpanan</th>
                            <td>
                                <?php echo $data['besar_simpanan']; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a class="btn btn-default" onclick="printContent('div1')"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->