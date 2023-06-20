<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kolektabilitas</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">

            <div class="box-body">
                <?php
                // Koneksikan ke database
                require 'koneksi.php';

                // Ambil bulan saat ini dari waktu real
                $bulan = date('m');

                // Buat query untuk mengambil semua anggota
                $query = "SELECT id_anggota, nama, alamat, no_telp FROM anggota where status='1'";

                // Jalankan query
                $result = mysqli_query($conn, $query); ?>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-striped table-responsive"
                        data-toggle="table">
                        <thead>
                            <tr class="info">
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>ID_Anggota</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>Alamat</center>
                                </th>
                                <th>
                                    <center>Telp</center>
                                </th>
                                <th>
                                    <center>Status</center>
                                </th>

                            </tr>
                        </thead>
                        <?php
                        // Iterasi hasil query, tampilkan data anggota
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Buat query untuk mengecek apakah anggota sudah melakukan angsuran pada bulan ini
                            $query_cek_angsur = "SELECT id_angsuran FROM angsuran WHERE id_anggota = '" .
                                $row['id_anggota'] .
                                "' AND bln = '$bulan'";

                            // Jalankan query
                            $result_cek_angsur = mysqli_query($conn, $query_cek_angsur);

                            // Jika anggota sudah melakukan angsuran pada bulan ini, tampilkan status "Lancar"
                            if (mysqli_num_rows($result_cek_angsur) > 0) { ?>
                                <td>
                                    <center>
                                        <?php echo $no; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $row['id_anggota']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $row['nama']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $row['alamat']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $row['no_telp']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo "Lancar" ?>
                                    </center>
                                </td>
                                <tr>
                                <?php } else { ?>
                                    <td>
                                        <center>
                                            <?php echo $no; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $row['id_anggota']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $row['nama']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $row['alamat']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $row['no_telp']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo "Macet" ?>
                                        </center>
                                    </td>
                                <tr>
                                    <?php
                                    $no++;
                            }
                        }
                        ?>
                    </table>";

                    <?php // Tutup koneksi ke database
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>