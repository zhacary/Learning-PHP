
<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "DELETE FROM jadwal WHERE id='$id'";
mysqli_query($koneksi, $query);
echo "<script>window.location.href='tambah_jadwal.php'</script>";

?>
