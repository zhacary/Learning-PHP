<?php 
include 'indexadmin.php';
?>


<script>
function myFunction() {
  var str = "Visit W3Schools!"; 
  var n = str.search("W3Schools");
  document.getElementById("demo").innerHTML = n;
}
</script>

<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center" id="modalLabelSmall">Tambah Kelas</h4>
</div>

<div class="modal-body">
   <form action="" method="POST"  enctype="multipart/form-data"  role="form">
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $kmapel=$_POST['kode_mapel'];
   $mapel=$_POST['nama_mapel'];
   $nip=$_POST['nip'];
  

   if($kmapel=='' || $mapel=='' || $nip=='' ){
      echo "<div class='clearfix'>
                          <div class='pull-left alert alert-danger no-margin alert-dismissable'>
                              <button type='button' class=close data-dismiss='alert'>
                                  <i class='ace-icon fa fa-times'></i>
                              </button>

                              <i class='ace-icon fa  fa-exclamation-circle bigger-120 blue'></i>
                              Data Belum Lengkap Silahkan Periksa Kembali...
                          </div>

                          
                      </div>";
  
   }else{

      $simpan = mysqli_query($koneksi,"INSERT INTO `mapel` (`kode_mapel`,`nama_mapel`, `nip`) VALUES ('$kmapel', '$mapel', '$nip');");
      echo "<script>alert('success membuat mata pelajaran')</script>";

      if($simpan){
          echo "<script>window.location.href='#.php'</script>";
      }

   }

}




?>


 <label for="">Mata Pelajaran</label>
 <input type="text" name="nama_mapel" class="form-control">

 <label for="">Kode Mata Peljaran</label>
 <input type="text" name="kode_mapel" class="form-control">

  <label for="">NIP</label>
  <select name="nip" id="" class="form-control">
  <option value="">---</option>
  <?php $kelas=mysqli_query($koneksi,"SELECT * FROM guru GROUP BY nama_guru ASC");
   while($k=mysqli_fetch_array($kelas)) {?>
   <option value="<?= $k['nip'] ?>"><?= $k['nip'] ?> -- <?= $k['nama_guru'] ?></option>
   <?php } ?>
    </select>


 <br>
 <input type="submit" class="btn btn-info" value="SIMPAN">
</form>
</div>

</div>
</div>
</div>



                              <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Tambah Mata Pelajaran
													</h5>

													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
                                <th>No</th>
                              
                                <th>Mata Pelajaran</th>
                                <th>Kode Pelajaran</th>
                                 <th>Nama Guru</th>
                                <th>Nip</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
						        $tampil=mysqli_query($koneksi,"SELECT * FROM mapel INNER JOIN guru ON guru.nip=mapel.nip ");
						        while($dr=mysqli_fetch_array($tampil)){
						   											 ?>
								<tr>
																
								<td class=""><?= $i++; ?></td>
                                 
                                  <td><?= $dr['nama_mapel']  ?></td>
                                  <td><?= $dr['kode_mapel']  ?></td>
                                   <td><?= $dr['nama_guru']  ?></td>
                                  <td><?= $dr['nip']  ?></td>
																
															
																	
                                                </tr>
                                                <tr>
                                                
                                                </tr>
																<?php  } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>


   