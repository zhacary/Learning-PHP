<?php
include 'header_siswa.php';
?>



<?php 
$nama=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_materi='$_GET[id_materi]'");
$nm=mysqli_fetch_array($nama);

$absen=mysqli_query($koneksi,"SELECT * FROM absen WHERE kode_materi='$_GET[id_materi]'");
$ab=mysqli_fetch_array($absen);


?>


<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>


<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center" id="modalLabelSmall">Isi Absen</h4>
</div>

<div class="modal-body">
<form  action="" class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $materi=$_POST["kode_materi"];
     $kmapel=$_POST["kode_mapel"];
    $nim=$_POST["nim"];
    $nip=$_POST["nip"];
    $nama=$_POST["nama_siswa"];
    $kjurusan=$_POST["kode_jurusan"];
    $ttl=$_POST["tanggal_upload"];
    $jam=$_POST["jam"];
    $ID_User=$_SESSION["ID_User"];
    
    if($nim=='' || $materi=='' || $kmapel=='' || $nip=='' || $nama=='' || $kjurusan=='' || $ttl=='' ||$jam=='' || $ID_User==''){
        echo "<div class='clearfix'>
                                        <div class='pull-left alert alert-danger no-margin alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                            </button>
                                            <i class='ace-icon fa fa-info-circle bigger-120 red'></i>
                                            Data Belum lengkap silahkan isi data yg masih kosong ...
                                        </div>
                                        </div>";
    }else{
    	ini_set('date.timezone', 'Asia/Jakarta');
        $simpan = mysqli_query($koneksi,"INSERT INTO absen (`kode_materi`,`kode_mapel`,`nim`,`nip`, `nama_siswa`,`kode_jurusan`,`tanggal_upload`,`jam`,`ID_User`) 
        VALUES ('$materi','$kmapel','$nim','$nip', '$nama','$kjurusan','$ttl','$jam','$ID_User');");
        echo "<script> alert('Berhasil Isi Absen')</script>";

        if($simpan){
            echo "<script>window.location.href='downloadmateri1.php'</script>";
        }
    
    }
    }

?>


<label for="">NIM</label>
<?php 
$nim=mysqli_query($koneksi,"SELECT * FROM siswa WHERE ID_User='$_SESSION[ID_User]'");
while ($qs=mysqli_fetch_array($nim)) {?>
<input type="text" readonly value="<?= $qs['nim'] ?>" name="nim" class="form-control">
<?php } ?>


<label for="">NAMA</label>
<?php 
$nama=mysqli_query($koneksi,"SELECT * FROM siswa WHERE ID_User='$_SESSION[ID_User]'");
while ($qs=mysqli_fetch_array($nama)) {?>
<input type="text" readonly value="<?= $qs['nama_siswa'] ?>" name="nama_siswa"  class="form-control">
<?php } ?>

<label for="">TANGGAL</label>
<input type="date"readonly value="<?= date('Y-m-d') ?>" name="tanggal_upload" class="form-control">

<label for="">WAKTU</label>
<input type="text" readonly value="<?php echo date("H:i:s"); ?>" name="jam" class="form-control">

<label for="">KODE MATERI</label>
<?php 
$materi=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_materi='$_GET[id_materi]'");
while ($qs=mysqli_fetch_array($materi)) {?>
<input type="text" readonly value="<?= $qs['kode_materi'] ?>" name="kode_materi" class="form-control">
<?php } ?>

<label for="">KODE MATA PELAJARAN</label>
<?php 
$materi=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_materi='$_GET[id_materi]'");
while ($qs=mysqli_fetch_array($materi)) {?>
<input type="text" readonly value="<?= $qs['kode_mapel'] ?>" name="kode_mapel" class="form-control">
<?php } ?>

<label for="">KODE KELAS</label>
<?php 
$jurusan=mysqli_query($koneksi,"SELECT * FROM siswa WHERE ID_User='$_SESSION[ID_User]'");
while ($qs=mysqli_fetch_array($jurusan)) {?>
<input type="text" readonly value="<?= $qs['kode_jurusan'] ?>" name="kode_jurusan"  class="form-control">
<?php } ?>


<label for="">NIP</label>
<?php 
$nip=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_materi='$_GET[id_materi]'");
while ($qs=mysqli_fetch_array($nip)) {?>
<input type="text" readonly value="<?= $qs['nip'] ?>" name="nip"  class="form-control">
<?php } ?>		
					
	

<br>
       <input type="submit" class="btn btn-success" value="simpan">

</form>

</div>

</div>
</div>
</div>




<?php if ($ab==null) {
	?>
			<div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														<strong>Absensi</strong>
													</h5>

													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	<th>NO</th>
																	<th>NIM</th>
																	<th>NIP</th>														
																	<th>NAMA</th>
																	<th>KODE JURUSAN</th>
																	<th>TANGGAL</th>
																	<th>JAM</th>
																	
																</tr>
															</thead>

															<tbody>
															<?php 
																		$i=1;
																		$tampil=mysqli_query($koneksi,"SELECT * FROM absen WHERE kode_materi='$_GET[id_materi]'");
																		while($m=mysqli_fetch_array($tampil)){
																	?>
																<tr>
																	<td class=""><?= $i++ ?></td>

																	<td class=""><?= $m['nim']; ?></td>

																	<td class=""><?= $m['nip']; ?></td>
																	
																	<td>
																		<a href="#"><?= $m['nama_siswa']; ?></a>
																	</td>

																	<td>
																		<a href="#"><?= $m['kode_jurusan']; ?></a>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $m['tanggal_upload']; ?></span>
																	</td>
																	
																	<td>
																		<a href="#"><?= $m['jam']; ?></a>
																	</td>
																	
																</tr>
																<?php } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

       
<?php }else{ ?>

		<div class='clearfix '>
              <div class='pull-left alert alert-info no-margin alert-dismissable text-center col-xs-12'>
                    <button type='button' class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                 </button>
                      <i class='ace-icon fa fa-info-circle bigger-120 blue '></i>
                             <h5>ABSEN SUDAH DI ISI ...</h5>
                </div>
         </div>




 <?php } ?>










   
