
<?php
include 'koneksi.php';
$id = $_GET['id_pg'];
$query = "DELETE FROM table_pg WHERE id_pg='$id'";
mysqli_query($koneksi, $query);
echo "<script>window.location.href='.php'</script>";

?>
