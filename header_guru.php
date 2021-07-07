<?php
session_start();
include "koneksi.php";
$dosen=mysqli_query($koneksi,"SELECT * FROM guru  WHERE ID_User='$_SESSION[ID_User]'");
$dd=mysqli_fetch_array($dosen);
?>

<?php 
$mahasiswa=mysqli_query($koneksi,"SELECT * FROM siswa  WHERE ID_User='$_SESSION[ID_User]'");
$mm=mysqli_fetch_array($mahasiswa);
?>

<?php 
$komentar=mysqli_query($koneksi,"SELECT * FROM komentar_materi  WHERE kode_materi='$_GET[id_materi]'");
$kk=mysqli_fetch_array($komentar);
?>



<!DOCTYPE html>
<html lang="en">
	<head>


		

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>E-Learning 11</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->


		<style>
    .loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 10000;
      background-size: 500px;
      background: url('img/loading2.gif') 50% 50% no-repeat rgb(249, 249, 249);
      opacity: .8;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    });
  </script>
	</head>
	<div class="loader"></div>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

			

				<div class="navbar-header pull-left">
					<a href="indexdosen.php" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
							<?php 
							$tampil=mysqli_query($koneksi,"SELECT * FROM aplikasi");
							while($t=mysqli_fetch_array($tampil)){
							?>
							<?= $t['nama_apk']; ?>
							<?php }?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal">
						</li>

						

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

							
							</ul>
						</li>

							
						
							
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
										<?php 
										$tampil2=mysqli_query($koneksi,"SELECT * FROM guru INNER JOIN user on 	guru.ID_User = user.ID_User WHERE Username='$_SESSION[Username]'");
										while($s=mysqli_fetch_array($tampil2)){
										?>
								<img class="nav-user-photo" src="img/<?php echo $s['gambar'] ?> "  />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $s['nama_guru'] ?> 
								</span>
									<?php } ?>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
										
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<?php 
								$sql_m	= mysqli_query($koneksi, "SELECT * FROM guru WHERE ID_User='$_SESSION[ID_User]'");
								$dm		= mysqli_fetch_array($sql_m);
								if($dm==null){
								?>
								
								<li>
									<a href="tambah_guru.php">
									<i class="ace-icon fa fa-info-circle"></i>
										Isi Profile
									</a>
								</li>
								<?php }else { ?>
									<li>
									<a href="#.php">
										<i class="ace-icon fa fa-check-square-o"></i>
										Profile Sudah Terisi
									</a>
								</li>
								<?php } ?>

								<li>
									<a href="profile_guru.php">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>








				
			</div><!-- /.navbar-container -->
		</div>


		


		
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="widget-box" style="background:#6495ED;color:white;">
					<h5>LIST GURU</h5>
					</div>
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->
				<?php if($dd==!null) { ?>

					<ul class="nav nav-list">
						
										
					


						<li class="">
							<a href="card_materi.php">
								<i class="menu-icon fa fa-list-alt"></i>
								<span class="menu-text"> Materi </span>
							</a>

							<b class="arrow"></b>
						</li>
					

						<li class="">
							<a href="card_datamahasiswa.php">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text " data-glyph="people"> Data siswa </span>
							</a>

							<b class="arrow"></b>
						</li>


						<!-- <li class="">
							<a href="card_jml_absen.php">
								<i class="menu-icon fa fa-book"></i>
								<span class="menu-text " data-glyph="people"> Absen siswa </span>
							</a>

							<b class="arrow"></b>
						</li> -->
			
			
			
					<li>	

								<a href="#"  class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil-square-o"></i>
									<span class="menu-text"> Buat Tugas </span>
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>
						<ul class="submenu">					
							<li class="">
								<a href="tugas.php">
									<i class="menu-icon fa fa-pencil"></i>
									 File Essay 
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="tugas_pg.php">
									<i class="menu-icon fa fa-gear"></i>
									Quiz 
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>



						<li class="">
							<a href="jadwal_guru.php">
								<i class="menu-icon fa fa-calendar"></i>
								<span class="menu-text"> Jadwal </span>
							</a>

							<b class="arrow"></b>
						</li>
			

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="widget-box" style="background:#6495ED;color:white;">
					<h5>UJIAN</h5>
					</div>
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div>



					<li class="">
							<a href="card_ujian_pg.php">
								<i class="menu-icon fa fa-book"></i>
								<span class="menu-text"> Pilihan Ganda </span>
							</a>

							<b class="arrow"></b>
						</li>
						
											
					</ul>
				<?php } ?>
				<!-- .nav-list -->
					
						
						
						
				
			</div>

			<div class="main-content">
			<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
	
		$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
			var color_class = $(this).find('option:selected').data('class');
			var new_class = 'widget-box';
			if(color_class != 'default')  new_class += ' widget-color-'+color_class;
			$(this).closest('.widget-box').attr('class', new_class);
		});
	
	
		// scrollables
		$('.scrollable').each(function () {
			var $this = $(this);
			$(this).ace_scroll({
				size: $this.attr('data-size') || 100,
				//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
			});
		});
		$('.scrollable-horizontal').each(function () {
			var $this = $(this);
			$(this).ace_scroll(
			  {
				horizontal: true,
				styleClass: 'scroll-top',//show the scrollbars on top(default is bottom)
				size: $this.attr('data-size') || 500,
				mouseWheelLock: true
			  }
			).css({'padding-top': 12});
		});
		
		$(window).on('resize.scroll_reset', function() {
			$('.scrollable-horizontal').ace_scroll('reset');
		});
	
		
		$('#id-checkbox-vertical').prop('checked', false).on('click', function() {
			$('#widget-toolbox-1').toggleClass('toolbox-vertical')
			.find('.btn-group').toggleClass('btn-group-vertical')
			.filter(':first').toggleClass('hidden')
			.parent().toggleClass('btn-toolbar')
		});
	
		/**
		//or use slimScroll plugin
		$('.slim-scrollable').each(function () {
			var $this = $(this);
			$this.slimScroll({
				height: $this.data('height') || 100,
				railVisible:true
			});
		});
		*/
		
	
		/**$('.widget-box').on('setting.ace.widget' , function(e) {
			e.preventDefault();
		});*/
	
		/**
		$('.widget-box').on('show.ace.widget', function(e) {
			//e.preventDefault();
			//this = the widget-box
		});
		$('.widget-box').on('reload.ace.widget', function(e) {
			//this = the widget-box
		});
		*/
	
		//$('#my-widget-box').widget_box('hide');
	
		
	
		// widget boxes
		// widget box drag & drop example
		$('.widget-container-col').sortable({
			connectWith: '.widget-container-col',
			items:'> .widget-box',
			handle: ace.vars['touch'] ? '.widget-title' : false,
			cancel: '.fullscreen',
			opacity:0.8,
			revert:true,
			forceHelperSize:true,
			placeholder: 'widget-placeholder',
			forcePlaceholderSize:true,
			tolerance:'pointer',
			start: function(event, ui) {
				//when an element is moved, it's parent becomes empty with almost zero height.
				//we set a min-height for it to be large enough so that later we can easily drop elements back onto it
				ui.item.parent().css({'min-height':ui.item.height()})
				//ui.sender.css({'min-height':ui.item.height() , 'background-color' : '#F5F5F5'})
			},
			update: function(event, ui) {
				ui.item.parent({'min-height':''})
				//p.style.removeProperty('background-color');
	
				
				//save widget positions
				var widget_order = {}
				$('.widget-container-col').each(function() {
					var container_id = $(this).attr('id');
					widget_order[container_id] = []
					
					
					$(this).find('> .widget-box').each(function() {
						var widget_id = $(this).attr('id');
						widget_order[container_id].push(widget_id);
						//now we know each container contains which widgets
					});
				});
				
				ace.data.set('demo', 'widget-order', widget_order, null, true);
			}
		});
		
		
		///////////////////////
	
		//when a widget is shown/hidden/closed, we save its state for later retrieval
		$(document).on('shown.ace.widget hidden.ace.widget closed.ace.widget', '.widget-box', function(event) {
			var widgets = ace.data.get('demo', 'widget-state', true);
			if(widgets == null) widgets = {}
	
			var id = $(this).attr('id');
			widgets[id] = event.type;
			ace.data.set('demo', 'widget-state', widgets, null, true);
		});
	
	
		(function() {
			//restore widget order
			var container_list = ace.data.get('demo', 'widget-order', true);
			if(container_list) {
				for(var container_id in container_list) if(container_list.hasOwnProperty(container_id)) {
	
					var widgets_inside_container = container_list[container_id];
					if(widgets_inside_container.length == 0) continue;
					
					for(var i = 0; i < widgets_inside_container.length; i++) {
						var widget = widgets_inside_container[i];
						$('#'+widget).appendTo('#'+container_id);
					}
	
				}
			}
			
			
			//restore widget state
			var widgets = ace.data.get('demo', 'widget-state', true);
			if(widgets != null) {
				for(var id in widgets) if(widgets.hasOwnProperty(id)) {
					var state = widgets[id];
					var widget = $('#'+id);
					if
					(
						(state == 'shown' && widget.hasClass('collapsed'))
						||
						(state == 'hidden' && !widget.hasClass('collapsed'))
					) 
					{
						widget.widget_box('toggleFast');
					}
					else if(state == 'closed') {
						widget.widget_box('closeFast');
					}
				}
			}
			
			
			$('#main-widget-container').removeClass('invisible');
			
			
			//reset saved positions and states
			$('#reset-widgets').on('click', function() {
				ace.data.remove('demo', 'widget-state');
				ace.data.remove('demo', 'widget-order');
				document.location.reload();
			});
		
		})();
	
	});
</script>
				<div class="main-content-inner">
					

					<div class="page-content">
						
						<br>

						<?php 
							if($dd==null){ 
								echo "<div class='clearfix'>
									<div class='pull-left alert alert-danger no-margin alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
										</button>

										<i class='ace-icon fa fa-info-circle bigger-120 red'></i>
										Silahkan isi profile terlebih dahulu ...
									</div>

									
								</div>";

							}
						?>

		