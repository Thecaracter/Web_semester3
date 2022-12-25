<?php
include 'koneksi.php';
if (isset($_GET['reqa']) && $_GET['reqa'] == 'edit') {
	$namaform = "<i class = 'fa fa-edit'></i> Edit";
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT * FROM karyawan  WHERE id=$id ");
	$data = mysqli_fetch_array($query);
	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$tgl_lahir = $data['tgl_lahir'];
	$tmp_lahir = $data['tmp_lahir'];
	$j_kel = $data['j_kel'];
	$no_telp = $data['no_telp'];
	$hasilkode = $data['id'];
	$button = "<i class='fa fa-save'></i> Update";
} elseif (isset($_GET['reqa']) && $_GET['reqa'] == 'add') {
	$namaform = "<i class='fa fa-plus'></i> Tambah";
	$carikode = mysqli_query($conn, "SELECT MAX(id) FROM karyawan") or die(mysqli_error($conn));
	$datakode = mysqli_fetch_array($carikode);
	if ($datakode) {
		$nilaikode = substr($datakode[0], 3);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "RI" . str_pad($kode, 3, "0", STR_PAD_LEFT);
	}
	$_SESSION['id'] = $hasilkode;
	$nama = '';
	$alamat = '';
	$tgl_lahir = '';
	$tmp_lahir = '';
	$j_kel = '';
	$no_telp = '';
	$tgl_simpanan = date('Y-m-d');
	$button = "<i class='fa fa-save' ></i> Simpan";
}
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Karyawan</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
					<?php echo $namaform; ?> Daftar Karyawan
				</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<?php
                if (isset($_GET['id_salah'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					ID Anggota Anda Salah!!!
					</div>';
                } else if (isset($_GET['nama'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nama anda belum di isi!!!
					</div>';
                } else if (isset($_GET['alamat'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Alamat anda belum di isi!!!
					</div>';
                } else if (isset($_GET['tgl_lahir'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tanggal Lahir anda belum di isi!!!
					</div>';
                } else if (isset($_GET['tmp_lahir'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tempat Lahir Anda Kosong!!!
					</div>';
                } else if (isset($_GET['j_kel'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Pilih jenis kelamin dengan tepat!!!
					</div>';
                } else if (isset($_GET['no_telp'])) {
	                echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nomor Handphone Anda Kosong!!!
					</div>';
                }

                ?>
				<form role="form" action="proses.php" method="POST" enctype='multipart/form-data'>
					<input type="hidden" name="reqp" value="<?php echo $_GET['reqa'] ?>">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">ID Anggota</label>
							<input type="text" class="form-control" name="id_karyawan" id="exampleInputEmail1"
								placeholder="ID" value="<?php echo $hasilkode ?>" <?php if (
                                   	$_GET['reqa'] == 'edit' &&
                                   	isset($_GET['reqa']) == 'edit'
                                   ) {
	                                   echo 'disabled';
                                   } ?>>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama</label>
							<input type="text" class="form-control" name="nama" id="exampleInputEmail1"
								placeholder="Nama" value="<?php echo $nama ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" style="resize:vertical" name="alamat" rows="3"
								placeholder="Alamat"><?php echo $alamat; ?></textarea>
						</div>
						<label for="exampleInputEmail1">Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir ?>"
								data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
						</div>
						<br>
						<div class="form-group">
							<label for="exampleInputEmail1">Tempat Lahir</label>
							<input type="text" class="form-control" name="tmp_lahir" value="<?php echo $tmp_lahir ?>"
								id="exampleInputEmail1" placeholder="Tempat Lahir">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="j_kel">
								<option selected value="">-- Pilih Jenis Kelamin --</option>
								<option value="Laki-Laki" <?php if ($j_kel == "Laki-Laki") {
	                                echo 'selected="selected"';
                                }
                                ?>
									?? ?? ??>Laki-Laki</option>
								<option value="Perempuan" <?php if ($j_kel == "Perempuan") {
	                                echo 'selected="selected"';
                                }
                                ?>
									?? ?? ??>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Nomor Handphone</label>
							<input type="number" class="form-control" id="exampleInputPassword1"
								value="<?php echo $no_telp ?>" placeholder="08123456789" name="no_telp">
						</div>
						<div>
							<br>
							<input type='hidden' name='old-foto-profile' value="<?php $foto; ?>" />
							<input type='file' name='foto-profile' />
						</div>

					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary"
							style="box-shadow: 0 3px 0 0 #007299; padding:10px 16px; ">
							<?php echo $button ?>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>