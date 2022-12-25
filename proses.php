<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php session_start();
require 'koneksi.php';
error_reporting(0);
//Aksi anggota
if ($_POST['reqa'] == "add") {
	$id_anggota = $_POST['id_anggota'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$j_kel = $_POST['j_kel'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$ket = $_POST['ket'];
	$nm_simpanan = $_POST['nm_simpanan'];
	$besar_simpanan = $_POST['besar_simpanan'];
	$tgl_simpanan = $_POST['tgl_simpanan'];
	$ket_simpanan = $_POST['ket_simpanan'];
	$bln = date('m');
	$tgl_skrg = date('Y/m/d');

	if ($id_anggota != $_SESSION['id_anggota']) {
		header('Location:page-form-anggota.php?reqa=add&id_salah=salah');
	} else if ($nama == "") {
		header('Location:page-form-anggota.php?reqa=add&nama=kosong');
	} else if ($alamat == "") {
		header('Location:page-form-anggota.php?reqa=add&alamat=kosong');
	} else if ($tgl_lahir == "") {
		header('Location:page-form-anggota.php?reqa=add&tgl_lahir=kosong');
	} else if ($tmp_lahir == "") {
		header('Location:page-form-anggota.php?reqa=add&tmp_lahir=kosong');
	} else if ($j_kel == "") {
		header('Location:page-form-anggota.php?reqa=add&j_kel=kosong');
	} else if ($no_telp == "") {
		header('Location:page-form-anggota.php?reqa=add&no_telp=kosong');
	} else if ($nm_simpanan != "Simpanan Pokok") {
		header('Location:page-form-anggota.php?reqa=add&nm_simpanan=salah');
	} else if ($besar_simpanan != "50000") {
		header('Location:page-form-anggota.php?reqa=add&besar_simpanan=salah');
	} else if ($tgl_simpanan != $tgl_skrg) {
		header('Location:page-form-anggota.php?reqa=add&tgl_simpanan=salah');
	} else if ($ket_simpanan != "Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja") {
		header('Location:page-form-anggota.php?reqa=add&ket_simpanan=salah');
	} else {
		if (isset($_FILES['foto-profile'])) {


			$folder = 'uploads/';

			if (isset($_FILES['foto-profile']['name']) && ($_FILES['foto-profile']['name'] != "")) {
				$newImage = $folder . $_FILES['foto-profile']['name'];
				move_uploaded_file($_FILES['foto-profile']['tmp_name'], $newImage);
			}
			$sql_anggota = "INSERT INTO anggota (id_anggota,nama,alamat,tgl_lahir,tmp_lahir,j_kel,status,no_telp,besar_simpanan,foto)VALUES('" . $id_anggota . "','" . $nama . "','" . $alamat . "','" . $tgl_lahir . "','" . $tmp_lahir . "','" . $j_kel . "','1','" . $no_telp . "','" . $besar_simpanan . "','" . $newImage . "')";

			$sql_simpanan = "INSERT INTO simpanan (nm_simpanan,id_anggota,tgl_simpanan,besar_simpanan,ket_simpanan,bln)VALUES('" . $nm_simpanan . "','" . $id_anggota . "','" . $tgl_simpanan . "','" . $besar_simpanan . "','" . $ket_simpanan . "','" . $bln . "')";
			$tambah_anggota = mysqli_query($conn, $sql_anggota) or die(mysqli_error($conn));
			$tambah_simpanan = mysqli_query($conn, $sql_simpanan) or die(mysqli_error($conn));

			// $up = $user->tambahProduk($idProduk, $namaProduk, $hargaProduk, $newImage, $cid);
			if ($tambah_anggota && $tambah_simpanan == true) {
				echo 'berhasil';
				header('Location:page-anggota.php');
			} else {
				echo 'gagal';
			}
		}


	}
	exit;
} else if ($_POST['reqa'] == "edit") {
	$id_anggota = $_POST['id_anggota'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$j_kel = $_POST['j_kel'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$ket = $_POST['ket'];

	if ($nama == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&nama=kosong");
	} else if ($alamat == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&alamat=kosong");
	} else if ($tgl_lahir == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&tgl_lahir=kosong");
	} else if ($tmp_lahir == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&tmp_lahir=kosong");
	} else if ($j_kel == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&j_kel=kosong");
	} else if ($no_telp == "") {
		header("Location:page-form-anggota.php?reqa=edit&id_anggota=$_POST[id_anggota]&no_telp=kosong");
	} else {

		$sql = mysqli_query($conn, "UPDATE anggota set nama='" . $nama . "',alamat='" . $alamat . "',tgl_lahir='" . $tgl_lahir . "',tmp_lahir='" . $tmp_lahir . "',j_kel='" . $j_kel . "',no_telp='" . $no_telp . "',besar_simpanan='" . $besar_simpanan . "' WHERE id_anggota='" . $id_anggota . "'");

		header('Location:page-anggota.php');
	}

	exit;

}
if ($_GET['reqa'] == "dell") {
	$id_anggota = $_GET['id_anggota'];
	$sql_pin = mysqli_query($conn, "SELECT * FROM pinjaman WHERE id_anggota='" . $id_anggota . "'");
	// $sql_pin = mysqli_query("Select * From pinjam where id_anggota='".$id_anggota."'");
	$data_pin = mysqli_fetch_array($sql_pin);
	$jumlah_pin = mysqli_num_rows($sql_pin);
	$_SESSION["suksess"] = 'Data Berhasil Di Hapus';

	if ($jumlah_pin == 0 || $data_pin['ket'] == 1) {
		$sql = "UPDATE anggota set status='0' where id_anggota='" . $id_anggota . "'";
		$delete = mysqli_query($conn, $sql);
		//echo $sql;
		header("Location:page-berhenti-anggota.php?id_anggota=$id_anggota");
	} else {
		echo 'swal("Anda Berhasil Berhenti!", "Klik Button Untuk Melanjutkan!", "success");';
	}
	exit;
}

//Aksi Simpanan
if ($_POST['reqs'] == "add") {
	$nm_simpanan = $_POST['nm_simpanan'];
	$id_anggota = $_POST['id_anggota'];
	$tgl_simpanan = $_POST['tgl_simpanan'];
	$besar_simpanan = $_POST['besar_simpanan'];
	$ket = $_POST['ket'];
	$bln = date('m');

	$sql = mysqli_query($conn, "SELECT * FROM simpanan WHERE bln='" . $bln . "' AND id_anggota='" . $id_anggota . "' AND nm_simpanan='Simpanan Wajib'");
	$jum = mysqli_num_rows($sql);

	//echo $nm_simpanan;
	if ($nm_simpanan == "") {
		header('Location:page-form-simpanan.php?reqs=add&nm_simpanan=kosong');
	} else if ($id_anggota == "") {
		header('Location:page-form-simpanan.php?reqs=add&nama=kosong');
	} else if ($tgl_simpanan == "") {
		header('Location:page-form-simpanan.php?reqs=add&tgl_simpanan=kosong');
	} else if ($besar_simpanan == "") {
		header('Location:page-form-simpanan.php?reqs=add&besar_simpanan=kosong');
	} else if ($ket == "") {
		header('Location:page-form-simpanan.php?reqs=add&ket=kosong');
	} else if ($nm_simpanan == "Simpanan Sukarela") {
		//$nm_simpanan = $_POST['nm_simpanan'];
		$sql = "INSERT INTO simpanan (nm_simpanan,id_anggota,tgl_simpanan,besar_simpanan,ket_simpanan,bln)VALUES('" . $nm_simpanan . "','" . $id_anggota . "','" . $tgl_simpanan . "','" . $besar_simpanan . "','" . $ket . "','" . $bln . "')";
		$tambah_simpanan = mysqli_query($conn, $sql);
		header('Location:page-simpanan.php');
	} else if ($jum == 0) {
		//$nm_simpanan = $_POST['nm_simpanan'];
		$sql = "INSERT INTO simpanan (nm_simpanan,id_anggota,tgl_simpanan,besar_simpanan,ket_simpanan,bln)VALUES('" . $nm_simpanan . "','" . $id_anggota . "','" . $tgl_simpanan . "','" . $besar_simpanan . "','" . $ket . "','" . $bln . "')";
		$tambah_simpanan = mysqli_query($conn, $sql);
		header('Location:page-simpanan.php');
	} else {
		header('Location:page-form-simpanan.php?reqs=add&sudah=bayar');
	}

}
if ($_GET['reqs'] == "dell") {
	$id_simpanan = $_GET['id_simpanan'];
	mysqli_query($conn, "DELETE FROM simpanan where id_simpanan='" . $id_simpanan . "'");
	$_SESSION["sukses"] = 'Data Berhasil Di Hapus';
	header('Location:page-simpanan.php');
	exit;
}


//Aksi Pinjaman
if ($_POST['reqpin'] == "add") {
	$id_pinjaman = $_POST['id_pinjaman'];
	$nama_pinjaman = $_POST['nama_pinjaman'];
	$id_anggota = $_POST['id_anggota'];
	$besar_pinjaman = $_POST['besar_pinjaman'];
	$tgl_pengajuan_pinjaman = $_POST['tgl_pengajuan_pinjaman'];
	$tgl_acc_peminjam = $_POST['tgl_acc_peminjam'];
	$tgl_pinjaman = $_POST['tgl_pinjaman'];
	$tgl_pelunasan = $_POST['tgl_pelunasan'];
	$bln = date('m');
	$thn = date('Y');
	$sql = mysqli_query($conn, "SELECT * FROM pinjaman WHERE id_anggota='" . $id_anggota . "' AND ket='0'");
	$jum = mysqli_num_rows($sql);

	if ($id_pinjaman == "" || $id_pinjaman != $_SESSION['id_pinjaman']) {
		header('Location:page-form-peminjaman.php?reqpin=add&id_pinjaman=error');
	} else if ($nama_pinjaman == "") {
		header('Location:page-form-peminjaman.php?reqpin=add&nama_pinjaman=kosong');
	} else if ($id_anggota == "") {
		header('Location:page-form-peminjaman.php?reqpin=add&id_anggota=kosong');
	} else if ($besar_pinjaman == "") {
		header('Location:page-form-peminjaman.php?reqpin=add&besar_pinjaman=kosong');
	} else if ($jum == 0) {
		$mysql = "INSERT INTO pinjaman (id_pinjaman,nama_pinjaman,id_anggota,besar_pinjaman,tgl_pengajuan_pinjaman,tgl_acc_pinjaman,tgl_pinjaman,tgl_pelunasan,bln,thn,ket)VALUES('" . $id_pinjaman . "','" . $nama_pinjaman . "','" . $id_anggota . "','" . $besar_pinjaman . "','" . $tgl_pengajuan_pinjaman . "','" . $tgl_acc_peminjam . "','" . $tgl_pinjaman . "','" . $tgl_pelunasan . "','" . $bln . "','" . $thn . "','0')";
		$tambah = mysqli_query($conn, $mysql) or die(mysqli_error($conn));
		header('Location:page-pinjaman.php');
	} else {
		header('Location:page-form-peminjaman.php?reqpin=add&belum_lunas=gagal');
	}

	exit;
} else if ($_POST['reqpin'] == "edit") {
	$id_pinjaman = $_POST['id_pinjaman'];
	$nama_pinjaman = $_POST['nama_pinjaman'];
	$id_anggota = $_POST['id_anggota'];
	$besar_pinjaman = $_POST['besar_pinjaman'];
	$tgl_pengajuan_pinjaman = $_POST['tgl_pengajuan_pinjaman'];
	$tgl_acc_peminjam = $_POST['tgl_acc_peminjam'];
	$tgl_pinjaman = $_POST['tgl_pinjaman'];
	$tgl_pelunasan = $_POST['tgl_pelunasan'];


	$sql = "UPDATE pinjaman set nama_pinjaman='" . $nama_pinjaman . "',id_anggota='" . $id_anggota . "',besar_pinjaman='" . $besar_pinjaman . "' WHERE id_pinjaman='" . $id_pinjaman . "'";

	$update = mysqli_query($conn, $sql);

	exit;
}
if ($_GET['reqpin'] == 'dell') {
	$id_pinjaman = $_GET['id_pinjaman'];

	$delete = mysqli_query($conn, "DELETE FROM pinjaman WHERE id_pinjaman='" . $id_pinjaman . "'");

	header('Location:page-pinjaman.php');
	exit;
}

//Aksi Angsuran
if ($_POST['reqang'] == "add") {
	$id_angsuran = $_POST['id_angsuran'];
	$id_pinjaman = $_POST['id_pinjaman'];
	$id_anggota = $_POST['id_anggota'];
	$nama_pinjaman = $_POST['nama_pinjaman'];
	$tgl_pembayaran = $_POST['tgl_pembayaran'];
	$angsuran_ke = $_POST['angsuran_ke'];
	$tgl_jatuh_tempo = $_POST['tgl_jatuh_tempo'];
	$besar_angsuran = $_POST['besar_angsuran'];
	$bln_p = date('m');
	$jtuh = substr($tgl_jatuh_tempo, 9, 2);
	$jum_angsuran_ke = mysqli_query($conn, "SELECT * FROM angsuran WHERE bln='" . $bln_p . "' AND id_anggota='" . $id_anggota . "'");
	;
	$num = mysqli_num_rows($jum_angsuran_ke);


	if ($num == 0) {
		if ($tgl_pembayaran > $tgl_jatuh_tempo) {
			$hitung_denda = (date('d') - $jtuh) * 2000;
			$angsuran = $besar_angsuran + $hitung_denda;
			$sqldenda = "INSERT INTO angsuran (id_angsuran,id_pinjaman,id_anggota,nama_pinjaman,tgl_pembayaran,angsuran_ke,besar_angsuran,tgl_jatuh_tempo,denda,bln,ket)VALUES('" . $id_angsuran . "','" . $id_pinjaman . "','" . $id_anggota . "','" . $nama_pinjaman . "','" . $tgl_pembayaran . "','" . $angsuran_ke . "','" . $angsuran . "','" . $tgl_jatuh_tempo . "','" . $hitung_denda . "','" . $bln_p . "','BELUM LUNAS')";


			$tambah_denda = mysqli_query($conn, $sqldenda);

			header('Location:page-angsuran.php');
		}
		$sql = "INSERT INTO angsuran (id_angsuran,id_pinjaman,id_anggota,nama_pinjaman,tgl_pembayaran,angsuran_ke,besar_angsuran,tgl_jatuh_tempo,bln,ket)VALUES('" . $id_angsuran . "','" . $id_pinjaman . "','" . $id_anggota . "','" . $nama_pinjaman . "','" . $tgl_pembayaran . "','" . $angsuran_ke . "','" . $besar_angsuran . "','" . $tgl_jatuh_tempo . "','" . $bln_p . "','BELUM LUNAS')";


		$tambah_ = mysqli_query($conn, $sql);

		header('Location:page-angsuran.php');
	} else {
		echo "Harap Membayar Angsuran berikutnya di bulan berikutnya";
	}

	exit;

}
if ($_GET['reqang'] == 'dell') {
	$id_angsuran = $_GET['id_angsuran'];

	$delete = mysqli_query($conn, "DELETE FROM angsuran WHERE id_angsuran='" . $id_angsuran . "'");

	header('Location:page-angsuran.php');
	exit;
}
if ($_GET['requbs'] == "dell") {
	$id_ubahsimpanan = $_GET['id'];
	mysqli_query($conn, "DELETE FROM K_simpanan where id='" . $id_ubahsimpanan . "'");
	$_SESSION["sukses"] = 'Data Berhasil Dihapus';
	header('Location:page-ubahsimpanan.php');
	exit;

}
if ($_GET['requbp'] == "dell") {
	$id_ubahsimpanan = $_GET['id'];
	mysqli_query($conn, "DELETE FROM K_pinjaman where id_k_pinjaman='" . $id_ubahsimpanan . "'");
	$_SESSION["sukses"] = 'Data Berhasil Dihapus';
	header('Location:page-ubahpinjaman.php');
	exit;

}

//Aksi Ubah Simpanan
if ($_POST['requbs'] == "add") {
	if (!empty($_POST)) {
		$output = '';
		$nama = $_POST["nm_simpanan"];
		$ket = $_POST["ket_simpanan"];
		$bsr = $_POST["besar_simpanan"];
		$query = "
		INSERT INTO k_simpanan(nm_simpanan, ket_simpanan, besar_simpanan)  
		 VALUES('$nama', '$ket', '$bsr')
		";

		$result = mysqli_query($conn, $query);
		header("location: page-ubahsimpanan.php");


	}

}

//Aksi Karyawan
if ($_POST['reqkar'] == "add") {
	$id_anggota = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$j_kel = $_POST['j_kel'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	// $ket = $_POST['ket'];


	if ($id_anggota != $_SESSION['id']) {
		header('Location:page-form-karyawan.php?reqkar=add&id_salah=salah');
	} else if ($nama == "") {
		header('Location:page-form-karyawan.php?reqkar=add&nama=kosong');
	} else if ($alamat == "") {
		header('Location:page-form-karyawan.php?reqkar=add&alamat=kosong');
	} else if ($tgl_lahir == "") {
		header('Location:page-form-karyawan.php?reqkar=add&tgl_lahir=kosong');
	} else if ($tmp_lahir == "") {
		header('Location:page-form-karyawan.php?reqkar=add&tmp_lahir=kosong');
	} else if ($j_kel == "") {
		header('Location:page-form-karyawan.php?reqkar=add&j_kel=kosong');
	} else if ($no_telp == "") {
		header('Location:page-form-karyawan.php?reqkar=add&no_telp=kosong');
	} else if ($besar_simpanan != "50000") {
		header('Location:page-form-karyawan.php?reqkar=add&besar_simpanan=salah');
	} else {
		if (isset($_FILES['foto-profile'])) {


			$folder = 'uploads/';

			if (isset($_FILES['foto-profile']['name']) && ($_FILES['foto-profile']['name'] != "")) {
				$newImage = $folder . $_FILES['foto-profile']['name'];
				move_uploaded_file($_FILES['foto-profile']['tmp_name'], $newImage);
			}
			$sql_anggota = "INSERT INTO karyawan (id,nama,alamat,tgl_lahir,tmp_lahir,j_kel,status,no_telp,besar_simpanan,foto)VALUES('" . $id_anggota . "','" . $nama . "','" . $alamat . "','" . $tgl_lahir . "','" . $tmp_lahir . "','" . $j_kel . "','1','" . $no_telp . "','" . $besar_simpanan . "','" . $newImage . "')";

			$tambah_anggota = mysqli_query($conn, $sql_anggota) or die(mysqli_error($conn));


			// $up = $user->tambahProduk($idProduk, $namaProduk, $hargaProduk, $newImage, $cid);
			if ($tambah_anggota == true) {
				echo 'berhasil';
				header('Location:page-karyawan.php');
			} else {
				echo 'gagal';
			}
		}


	}
}
exit;
if ($_POST['requbp'] == "add") {
	if (!empty($_POST)) {
		$output = '';
		$nama = $_POST["nama_pinjaman"];
		$ket = $_POST["keterangan_pinjaman"];
		// $bsr = $_POST["besar_simpanan"];
		$query = "
		INSERT INTO k_pinjaman(nama_pinjaman, keterangan_pinjaman)  
		 VALUES('$nama', '$ket')
		";

		$result = mysqli_query($conn, $query);
		header("location: page-ubahpinjaman.php");


	}

}

if ($_POST['reqp'] == "add") {
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$j_kel = $_POST['j_kel'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	// $ket = $_POST['ket'];
	// $nm_simpanan = $_POST['nm_simpanan'];
	// $besar_simpanan = $_POST['besar_simpanan'];
	// $tgl_simpanan = $_POST['tgl_simpanan'];
	// $ket_simpanan = $_POST['ket_simpanan'];
	// $bln = date('m');
	// $tgl_skrg = date('Y/m/d');

	if ($id_anggota != $_SESSION['id_anggota']) {
		header('Location:page-form-anggota.php?reqa=add&id_salah=salah');
	} else if ($nama == "") {
		header('Location:page-form-anggota.php?reqa=add&nama=kosong');
	} else if ($alamat == "") {
		header('Location:page-form-anggota.php?reqa=add&alamat=kosong');
	} else if ($tgl_lahir == "") {
		header('Location:page-form-anggota.php?reqa=add&tgl_lahir=kosong');
	} else if ($tmp_lahir == "") {
		header('Location:page-form-anggota.php?reqa=add&tmp_lahir=kosong');
	} else if ($j_kel == "") {
		header('Location:page-form-anggota.php?reqa=add&j_kel=kosong');
	} else if ($no_telp == "") {
		header('Location:page-form-anggota.php?reqa=add&no_telp=kosong');
		// } else if ($nm_simpanan != "Simpanan Pokok") {
		// 	header('Location:page-form-anggota.php?reqa=add&nm_simpanan=salah');
		// } else if ($besar_simpanan != "50000") {
		// 	header('Location:page-form-anggota.php?reqa=add&besar_simpanan=salah');
		// } else if ($tgl_simpanan != $tgl_skrg) {
		// 	header('Location:page-form-anggota.php?reqa=add&tgl_simpanan=salah');
		// } else if ($ket_simpanan != "Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja") {
		// 	header('Location:page-form-anggota.php?reqa=add&ket_simpanan=salah');
	} else {
		if (isset($_FILES['foto-profile'])) {


			$folder = 'uploads/';

			if (isset($_FILES['foto-profile']['name']) && ($_FILES['foto-profile']['name'] != "")) {
				$newImage = $folder . $_FILES['foto-profile']['name'];
				move_uploaded_file($_FILES['foto-profile']['tmp_name'], $newImage);
			}
			$sql_anggota = "INSERT INTO anggota (id,username,jenis_kelamin,password,alamat,foto,level)VALUES('" . $id_karyawan . "','" . $nama . "','" . $alamat . "','" . $tgl_lahir . "','" . $tmp_lahir . "','" . $j_kel . "','1','" . $no_telp . "','" . $besar_simpanan . "','" . $newImage . "')";

			// $sql_simpanan = "INSERT INTO simpanan (nm_simpanan,id_anggota,tgl_simpanan,besar_simpanan,ket_simpanan,bln)VALUES('" . $nm_simpanan . "','" . $id_anggota . "','" . $tgl_simpanan . "','" . $besar_simpanan . "','" . $ket_simpanan . "','" . $bln . "')";
			$tambah_anggota = mysqli_query($conn, $sql_anggota) or die(mysqli_error($conn));
			$tambah_simpanan = mysqli_query($conn, $sql_simpanan) or die(mysqli_error($conn));

			// $up = $user->tambahProduk($idProduk, $namaProduk, $hargaProduk, $newImage, $cid);
			if ($tambah_anggota && $tambah_simpanan == true) {
				echo 'berhasil';
				header('Location:page-karyawan.php');
			} else {
				echo 'gagal';
			}
		}


	}
	exit;
}

?>