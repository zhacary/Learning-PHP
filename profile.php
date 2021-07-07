<?php include 'header_siswa.php' ?>



<div id="user-profile-1" class="user-profile row">
	<div class="col-md-4">
		<?php 
		$tampil1=mysqli_query($koneksi,"SELECT * FROM siswa INNER JOIN user on 	siswa.ID_User = user.ID_User WHERE Username='$_SESSION[Username]'");
		while($si=mysqli_fetch_array($tampil1)){
		?>
			<span>
				<img id="avatar" class="editable img-rounded" src="img/<?php echo $si['gambar'] ?>"  width="250" height="236"/>
			</span>

			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon fa fa-circle light-green"></i>
						&nbsp;
						<span class="white"><?=$si['nama_siswa'] ?></span>
					</a>
				</div>
			</div>
		<?php } ?>

		<div class="space-6"></div>
		<div class="profile-contact-info">
			<div class="space-6"></div>
		</div>
		<div class="hr hr12 dotted"></div>
	</div>
	<div class="col-md-8">
		<div class="center">
			<?php 
			$tampil=mysqli_query($koneksi,"SELECT * FROM siswa INNER JOIN user on siswa.ID_User = user.ID_User WHERE Username='$_SESSION[Username]'");
			while($i=mysqli_fetch_array($tampil)){
			?>
			<div class="profile-user-info profile-user-info-striped">
				<div class="profile-info-row">
					<div class="profile-info-name"> NIM </div>

					<div class="profile-info-value">
						<span class="editable" id="username"><?php echo $i['nim'] ?> </span>
					</div>
				</div>
			
			
				<div class="profile-info-row">
					<div class="profile-info-name"> NAMA </div>

					<div class="profile-info-value">
						<span class="editable" id="username"><?php echo $i['nama_siswa'] ?> </span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">TEMPAT</div>

					<div class="profile-info-value">
						<i class="fa fa-map-marker light-orange bigger-110"></i>
						
						<span class="editable" id="city"><?php echo $i['tempat'] ?></span>
					</div>
				</div>
				
				
				<div class="profile-info-row">
					<div class="profile-info-name">JENIS KELAMIN</div>

					<div class="profile-info-value">
						
						
						<span class="editable" id="city"><?php echo $i['jk'] ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> TGL</div>

					<div class="profile-info-value">
						<span class="editable" id="age"><?php echo $i['ttl'] ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> PROGRAM STUDI </div>

					<div class="profile-info-value">
						<span class="editable" id="signup"><?php echo $i['jurusan'] ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> TELEPON/WA </div>

					<div class="profile-info-value">
						<span class="editable" id="login"><a href="https://api.whatsapp.com/send?phone=<?php echo $i['telp'] ?>/"><?php echo $i['telp'] ?></a></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> EMAIL </div>

					<div class="profile-info-value">
						<span class="editable" id="login"><?php echo $i['email'] ?></span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name"> KODE JURUSAN </div>

					<div class="profile-info-value">
						<span class="editable" id="about"><?php echo $i['kode_jurusan'] ?></span>
					</div>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>
</div>

