<?php include 'header_siswa.php' ?>

<?php  
        
        $tampol=mysqli_query($koneksi,"SELECT * FROM materi  WHERE kode_materi='$_GET[id_materi]'");
        $md=mysqli_fetch_array($tampol);
    ?>
    
	
    <div class="widget-box responsive">
        <div class="widget-header" style="background-color: DogerBlue;">Komentar</div>
        <div class="widget-body ex3" >


                                                                  
         

		<?php  

            $komentar=mysqli_query($koneksi,"SELECT * FROM komentar_materi INNER JOIN user on user.ID_User = komentar_materi.ID_User  WHERE kode_materi='$_GET[id_materi]'");
            while($km=mysqli_fetch_array($komentar)){
            // $awal  = date_create('1988-08-10');
            // $akhir = date_create(); // waktu sekarang
            // $diff  = date_diff( $awal, $akhir );
        ?>   


       <div class="profile-activity clearfix" >

         <style type="text/css">
            div.ex3 {
            
          height: 300px;
          overflow: auto;
        }
        </style>
                                                                    


                                                                <div class="">
                                                                    
                                                                    <a class="user" href="#"> <?= $km['Username']; ?> </a>

                                                                     <?= $km['isi_komentar']; ?>

                                                                    <div class="time">
                                                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        <?= $km['tanggal']; ?> : <?= $km['jam']; ?> : <?= $km['hari']; ?> 
                                                                    </div>
                                                                </div>                                                          
                                                            </div>
                                                    <?php } ?> 

                                                    
            
            
        </div>
    </div>
    
      <div class="col-xs-12">
    <form action="" method="POST"> <!-- Form isi komentar -->

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $materi=$md["kode_materi"];
    $komentar=$_POST["isi_komentar"];
     $jam=$_POST["jam"];
      $hari=$_POST["hari"];
       $tanggal=$_POST["tanggal"];
    $ID_User=$_SESSION["ID_User"];
    $status=$_POST["status"];
    
        
    if($komentar=='' ){
        echo "gagal mengirim pesan<br>";
    }else{

        $simpan = mysqli_query($koneksi,"INSERT INTO `komentar_materi` (`kode_materi`, `isi_komentar`,`ID_User`, `tanggal`, `jam`, `hari`,`status`) VALUES ( '$materi', '$komentar','$ID_User', '$tanggal', '$jam', '$hari','$status');");
        
        if($simpan){
            echo "<script>window.location.href='lihat_materi_mahasiswa.php?id_materi=$_GET[id_materi]'</script>";
        }

    }
    }

    ?>
    <div class="row">
        
        <br>

        <div class="input-group">
            <input placeholder="kirim pesan..." name="isi_komentar"  type="text" class="form-control" name="message">

            <input  name="status" value="Belum di baca"  type="text" class="hidden">

            <input  name="jam"  type="time" value="<?= date('H:i'); ?>" class="hidden" name="message">

            <input type="date"readonly value="<?= date('Y-m-d') ?>" name="tanggal" class="hidden">

            <input type="text"readonly value="<?= date('l') ?>" name="hari" class="hidden">

            <span class="input-group-btn">
            <input class="btn btn-sm btn-info no-radius" type="submit">
                    <i class="ace-icon fa fa-share"></i>
                        Kirim
            </input>
            </span>
            </div>
    </div>
        </form>
    </div>
