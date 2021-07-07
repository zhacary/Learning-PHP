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



 <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Daftar User Login Guru
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
                               									<th>Nama User</th>
                                								<th>Password</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
															        $tampil=mysqli_query($koneksi,"SELECT * FROM user WHERE Level='guru'");
															        while($dr=mysqli_fetch_array($tampil)){
															    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
                                  									<td><?= $dr['Username']  ?></td>
                                 									 <td><?= $dr['Password']  ?></td>					
                                                				</tr>
                                               
																<?php  } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>







   <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Daftar Guru Yang sudah Mengisi Profile
													</h5>

													<div class="widget-toolbar">
													
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama Dosen</th>
                                <th>Nama User</th>
                                <th>Password</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
        $tampil=mysqli_query($koneksi,"SELECT * FROM user INNER JOIN guru ON guru.ID_User=user.ID_User WHERE Level='guru'");
        while($dm=mysqli_fetch_array($tampil)){

    																?>


																<tr>
																
																	<td class=""><?= $i++; ?></td>
                                  <td><?= $dm['nip']  ?></td>
                                  <td><?= $dm['nama_guru']  ?></td>
                                  <td><?= $dm['Username']  ?></td>
                                  <td><?= $dm['Password']  ?></td>


                                 
																
															
																	
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


<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center" id="modalLabelSmall">Tambah Dosen</h4>
</div>

<div class="modal-body">
   <form action="" method="POST"  enctype="multipart/form-data"  role="form">
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $username=$_POST['Username'];
   $pass=md5($_POST['Password']);
   $Level=$_POST['Level'];

   if($username=='' || $pass==''|| $Level=='' ){
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

      $simpan = mysqli_query($koneksi,"INSERT INTO `user` (`Username`, `Password`,`Level`) 
      VALUES ('$username', '$pass','$Level');");
      
      if($simpan){
          echo "<script>window.location.href='#.php'</script>";
      }

   }

}




?>

<label for="">Username</label>
 <input type="text" name="Username" class="form-control">

 <label for="">Password</label>
 <input type="password" name="Password" class="form-control">

 <label for="">Level</label>
 <input type="text" name="Level" value="guru" class="form-control" readonly>

 <br>
 <input type="submit" class="btn btn-info" value="SIMPAN">
</form>
</div>

</div>
</div>
</div>

	



													
													
													
													