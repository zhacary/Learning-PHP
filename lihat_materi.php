<?php include 'header_guru.php' ;?>
<div class="card-body">
    <?php  
        
        $tampil=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_materi='$_GET[id_materi]'");
        $lm=mysqli_fetch_array($tampil);
    ?>
   
    <div class="widget-box">
        <div class="widget-header"><h5 class="center">Komentar</h5></div>
        <div class="widget-body ex3">
        
			
			
			
			<?php  
            $komentar=mysqli_query($koneksi,"SELECT * FROM komentar_materi INNER JOIN user on user.ID_User = komentar_materi.ID_User  WHERE kode_materi='$_GET[id_materi]'");
            while($km=mysqli_fetch_array($komentar)){
        ?>   
       <div class="profile-activity clearfix" style="overflow-x:auto;">



<style type="text/css">
    div.ex3 {
   
  height: 300px;
  overflow: auto;
}</style>


																<div>
																	
																	<a class="user" href="#"> <?= $km['Username']; ?> </a>

																	 <?= $km['isi_komentar']; ?>


                                                                     <div class="">
                                                                       <?= $km['file_materi']; ?>
                                                                    </div>

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
    $materi=$lm["kode_materi"];
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
            echo "<script>window.location.href='lihat_materi.php?id_materi=$_GET[id_materi]'</script>";
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