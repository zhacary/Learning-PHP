<?php 
include 'header_siswa.php' ;
$query=mysqli_query($koneksi,"SELECT * FROM table_pg WHERE kode_pg='$_GET[id_pg]'");
$pg=mysqli_fetch_array($query);
?>
<?php


       if(isset($_POST['submit'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($koneksi, "select * from table_pg where id_pg='$nomor' and kunci='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=mysqli_query($koneksi, "select * from table_pg  ");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
            }
        }

        //Lakukan Penyimpanan Kedalam Database
      echo"
        <table class='table table-bordered'>
            <tbody>
                <tr>
                    <td colspan='4'><h4>Nilai Ujian Anda</h4></td>
                </tr>
                <tr>
                    <th width='80'><u>Benar ✔</u></th>
                    <th width='80'><u>Salah ✕</u></th>
                    <th width='140'><u>Tidak Terjawab !</u></th>
                    <th width='100'><u>Skor Akhir #</u></th>
                </tr>
                <tr>
                    <td align='center'>$benar</td>
                    <td align='center'>$salah</td>
                    <td align='center'>$kosong</td>
                    <td align='right'><b>$hasil</b></td>
                </tr>
            </tbody>
        </table>

        ";
        ?>
          
          <form method="POST">
              <?php
              if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    
                    $kode=$_POST['kode_pg'];
                    $nama=$_POST['nama_siswa'];
                    $nilai=$_POST['nilai_pg'];
                    $ID_User=$_POST['ID_User'];

                    if ($kode=='' || $nama=='' || $nilai=='' || $ID_User=='') {
                  
                    }else{
                        $simpan=mysqli_query($koneksi,"INSERT INTO jawab_pg (`kode_pg`,`nama_siswa`,`nilai_pg`,`ID_User`) VALUES ('$kode','$nama','$nilai','$ID_User');");

                        if ($simpan) {
                            echo "<script>window.location.href='tugas_pg_mhs.php'</script>";
                        }
                    }

              }
              ?>

              
              <?php $pilih=mysqli_query($koneksi,"SELECT * FROM table_pg WHERE kode_pg='$_GET[id_pg]'");
               if ($pg=mysqli_fetch_array($pilih)){?>
              <input type="text" name="kode_pg" value="<?= $pg['kode_pg'] ?>"  class='hidden' readonly/>
               <?php } ?>

               
              <?php $mhs=mysqli_query($koneksi,"SELECT * FROM siswa WHERE ID_User='$mm[ID_User]'");
               while ($mh=mysqli_fetch_array($mhs)){?>
              <input type="text" name="ID_User" value="<?= $mh['ID_User'] ?>" class='hidden' readonly/>
                <?php } ?>

              

              
              <?php $mhs=mysqli_query($koneksi,"SELECT * FROM siswa WHERE ID_User='$mm[ID_User]'");
               while ($mh=mysqli_fetch_array($mhs)){?>
              <input type="text" name="nama_siswa" value="<?= $mh['nama_siswa'] ?>" class='hidden' readonly/>
                <?php } ?>

              
              <input type="text" name="nilai_pg" value="<?= $hasil ?>" class='hidden' readonly/>


              <input type="submit" value="selesai">
          </form>