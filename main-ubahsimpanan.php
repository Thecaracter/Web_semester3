<?php include 'koneksi.php';
include 'funct.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Halaman Ubah Simpanan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Master Simpanan</li>
            <li class="active">Jenis Simpan</li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Simpanan Koperasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM k_simpanan");
                ?>
                <table id="dataTable" class="table table-bordered table-striped">
                    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal"
                        class="btn btn-success">Tambah Jenis Simpanan</button>
                    <br></br>
                    <thead>
                        <tr class="info">
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Jenis Simpanan</center>
                            </th>
                            <th>
                                <center>Keterangan Simpanan</center>
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
                                <center>
                                    <?php echo $data['nm_simpanan']; ?>
                                </center>
                            </td>
                            <td>
                                <?php echo $data['ket_simpanan']; ?>
                            </td>
                            <td>
                                <?php echo $data['besar_simpanan'] ?>
                            </td>
                            <td>
                                <center>

                                    <a type="button" name="edit" value="Edit" title="Edit Data ini" class="btn btn-sm"
                                        id="<?php echo $row["id"]; ?>" style="background: darkslateblue;color:white;"><i
                                            class="fa fa-edit "></i>
                                        Edit
                                    </a>
                                    <a><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>"
                                            class="btn btn-warning btn-xs edit_data" />
                                    </a>

                                    <a href="proses.php?id=<?php echo $data['id']; ?>&requbs=dell"
                                        title="Hapus Simpanan" class="btn btn-danger btn-sm"
                                        onClick="return confirm('Yakin mau berhenti?');"><span class="fa fa-trash-o">
                                            Hapus</span>
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

</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Data</h4>
            </div>
            <div class="modal-body">
                <form action="./proses/insert_ubahsimpanan.php" method="post" id="insert_form">

                    <label>Nama Simpanan</label>
                    <input type="text" name="nm_simpanan" id="nama" class="form-control" />
                    <br />
                    <label>Keterangan Simpanan</label>
                    <textarea style="resize:vertical" name="ket_simpanan" id="ketsim" class="form-control"></textarea>
                    <br />
                    <label>Besar Simpanan</label>
                    <input type="text" name="besar_simpanan" id="besar" class="form-control" />
                    <br />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data Karyawan</h4>
            </div>
            <div class="modal-body" id="detail_karyawan">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Karyawan</h4>
            </div>
            <div class="modal-body" id="form_edit">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Begin Aksi Insert
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            // if ($('#nama').val() == "") {
            //     alert("Mohon Isi Nama ");
        }
            // else if ($('#alamat').val() == '') {
            //     alert("Mohon Isi Alamat");
            }

            else {
            $.ajax({
                url: "./proses/insert_ubahsimpanan.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Inserting");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
        });
    //END Aksi Insert
    //Begin Tampil Form Edit
    $(document).on('click', '.edit_data', function () {
        var employee_id = $(this).attr("id");
        $.ajax({
            url: "edit.php",
            method: "POST",
            data: { employee_id: employee_id },
            success: function (data) {
                $('#form_edit').html(data);
                $('#editModal').modal('show');
            }
        });
    });
    //End Tampil Form Edit

    //Begin Aksi Delete Data
    $(document).on('click', '.hapus_data', function () {
        var employee_id = $(this).attr("id");
        $.ajax({
            url: "delete.php",
            method: "POST",
            data: { employee_id: employee_id },
            success: function (data) {
                $('#employee_table').html(data);
            }
        });
    });
    });
//End Aksi Delete Data
</script>