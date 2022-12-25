<? require('./koneksi.php');
error_reporting(0);
$id = $_GET['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$foto = $_FILES['foto']['name'];
$file_tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file($file_tmp, '../foto/product/' . $foto);


if (isset($_POST['edit-product'])) {
if (isset($_POST['edit-product'])) {
if ($foto == "") {
$sql = mysqli_query($koneksi, "UPDATE `tb_product` SET nama='$nama',harga='$harga',qty='$qty',kategori='$kategori',
deskripsi='$deskripsi' WHERE id='$id'");
// header('location:products.view.php');
echo "
<script>
    Swal.fire({
        title: 'Data Berhasil Diubah', text: '', icon: 'success', confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) { window.location = 'products.view.php'; }
    })</script>";
} else {
$sql = mysqli_query($koneksi, "UPDATE `tb_product` SET nama='$nama', foto='$foto'
,harga='$harga',qty='$qty',kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'");
// header('location:products.view.php');
echo "
<script>
    Swal.fire({
        title: 'Data Berhasil Diubah', text: '', icon: 'success', confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) { window.location = 'products.view.php'; }
    })</script>";
}
} else {
echo "
<script>
    Swal.fire({
        title: 'Data Gagal Disimpan', text: '', icon: 'error', confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) { window.location = 'products.view.php'; }
    })</script>";
}}