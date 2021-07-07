<?php include 'header_guru.php' ?>



<style>
img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>




<div class="page-header">
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="clearfix">
									<div class="pull-left alert alert-success no-margin alert-dismissable">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>

										<i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
										Data profile guru...
									</div>

									
								</div>
										
								<div class="hr dotted"></div>

								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
											<?php 
										$tampil1=mysqli_query($koneksi,"SELECT * FROM guru INNER JOIN user on 	guru.ID_User = user.ID_User WHERE Username='$_SESSION[Username]'");
										while($si=mysqli_fetch_array($tampil1)){
										?>
												<span >
													<img id="avatar" class="editable img-rounded"  src="img/<?=$si["gambar"] ?>" width="250" height="236"/>
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?=$si['nama_guru'] ?></span>
														</a>
															
														
														
													</div>
												</div>
											</div>
											<?php }?>
											<div class="space-6"></div>

											

											<div class="hr hr12 dotted"></div>

											

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="center">
												

												

												

											<div class="space-12"></div>
										<?php 
										$tampil=mysqli_query($koneksi,"SELECT * FROM guru INNER JOIN user on 	guru.ID_User = user.ID_User WHERE Username='$_SESSION[Username]'");
										while($i=mysqli_fetch_array($tampil)){
										?>
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> NIP </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $i['nip']; ?> </span>
													</div>
												</div>
											
											
												<div class="profile-info-row">
													<div class="profile-info-name"> NAMA LENGKAP </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $i['nama_guru']; ?> </span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">TEMPAT LAHIR</div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														
														<span class="editable" id="city"><?php echo $i['tempat'] ;?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> TANGGAl LAHIR</div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $i['ttl']; ?></span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name">JENIS KELAMIN</div>

													<div class="profile-info-value">
														
														
														<span class="editable" id="city"><?php echo $i['jk'] ?></span>
													</div>
												</div>

												

												

												
											</div>

										<?php } ?>