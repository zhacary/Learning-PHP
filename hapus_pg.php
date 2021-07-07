<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM `table_pg` WHERE `table_pg`.`id_pg`='$id'");
echo "<script>window.location.href='soal_ujian_pg.php?id_upg='$_GET[kode_pg]'</script>";

?>

 <?php    
        $tampil=mysqli_query($koneksi,"SELECT * FROM table_pg WHERE kode_pg='$_GET[id_upg]'");
        $lm=mysqli_fetch_array($tampil);
    ?>
