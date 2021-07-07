<?php
            include 'koneksi.php';
          $sqledit=mysqli_query($koneksi,"SELECT * FROM aplikasi WHERE id='$_GET[id]'");
          $e=mysqli_fetch_array($sqledit);
          ?>
    
    <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $nip = $_POST["nip"];
                        $hari = $_POST["hari"];
                        $jam = $_POST["jam"];
                        $jam_selesai = $_POST["jam_selesai"];
                        $tanggal = $_POST["tanggal"];
                        $kode_jurusan = $_POST["kode_jurusan"];
                        $id   = $_GET['id'];
                    
                        $update =mysqli_query($koneksi,"UPDATE jadwal SET 
                        nip='$nip',
                        hari='$hari',
                        jam='$jam'
                        jam_selesai='$jam_selesai',
                        tanggal='$tanggal',
                        kode_jurusan='$kode_jurusan'
                        WHERE id='$id'");




                        if($update){
                            echo"<script>window.location.href='tambah_jadwal.php'</script>";
                                }
                    


                    }
                    ?>