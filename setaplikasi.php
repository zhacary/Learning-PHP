<?php include 'indexadmin.php' ;
include "koneksi.php";
?>

    <div>
    <form action="" method="post">
   
    <?php 
      if($_SERVER["REQUEST_METHOD"]=="POST"){
                  
        $nama=$_POST["nama_apk"];
       
        $koneksi=mysqli_connect("localhost","root","","db_11");

        if($nama==''){
        echo "<div class='alert alert-warning fade show alert-dismissible mt-2 text-center'>
        Data Belum lengkap harus di selesaikan !
    </div>";
        }else {
          $simpan=mysqli_query($koneksi,"INSERT INTO aplikasi(nama_apk)
          VALUES ('$nama')");

        if($simpan){
           echo"<script>window.location.href='admin_user/setaplikasi.php'</script>";
        }


        }

      }
        ?>

<div class="col">
                    <label for="">NO TRANSAKSI</label>
                    <input type="text" name="nama_apk"  class="form-control">
                    </div>
        <br>
        <button class="btn btn-success">SIMPAN</button>
    
    </form>
    </div>


<br>
    <div>
        <table class="table">
       
        <th>NAMA APK SAAT INI</th>
        

        
        <?php 
        $t=mysqli_query($koneksi,"SELECT * FROM aplikasi");
        while($r=mysqli_fetch_array($t)){
        ?>
        <td>
        <?= $r['nama_apk'] ;?>
        </td>

        <td>
        <a href="#" class="btn btn-sm btn-primary no-radius">
											<i class="ace-icon fa fa-pencil-square-o bigger-117"></i>
											Edit											
										</a>
        </td>
       
        <?php } ?>
        </table>
    
    </div>