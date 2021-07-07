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
   $jurusan=$_POST['jurusan'];
   $kod=$_POST['kode_jurusan'];
  

   if($jurusan=='' || $kod=='' ){
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

      $simpan = mysqli_query($koneksi,"INSERT INTO `jurusan` (`jurusan`, `kode_jurusan`) 
      VALUES ('$jurusan', '$kod');");
      echo "<script>alert('success membuat jurusan')</script>";
      
      if($simpan){
          echo "<script>window.location.href='#.php'</script>";
      }

   }

}




?>


 <label for="">Jurusan</label>
 <input type="text" name="jurusan" class="form-control">

 <label for="">Kelas/kode_jurusan</label>
 <input type="text" name="kode_jurusan" class="form-control">

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
														Tambah Kelas
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
                              
                                <th>Jurusan</th>
                                <th>Kelas/kode_jurusan</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
        $tampil=mysqli_query($koneksi,"SELECT * FROM jurusan");
        while($dr=mysqli_fetch_array($tampil)){
    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
                                 
                                  <td><?= $dr['jurusan']  ?></td>
                                  <td><?= $dr['kode_jurusan']  ?></td>
																
															
																	
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


   