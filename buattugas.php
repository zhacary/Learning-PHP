<?php include 'header_siswa.php' ?>
<div class="page-header">
							<h1>
								Pilih Data Yang Akan Diedit
							</h1>
					</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="" id="main-widget-container">
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-12">
											<div class="" id="">
												<div class=" col-md-12">
												
												
												<form action="" method="post" class="">
    <?php  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      
        $idl=$_POST["id_soal"];
        $soal=$_POST["soal"];
        $a=$_POST["a"];
        $b=$_POST["b"];
        $c=$_POST["c"];
        $d=$_POST["d"];
        $jawaban=$_POST["knc_jawaban"];
      
        $tanggal=$_POST["tanggal"];
        $aktiv=$_POST["aktif"];
      

        if($idl==''|$soal==''|$a==''|$b==''|$c=='' |$d=='' |$jawaban=='' |$tanggal=='' |$aktiv==''){
            echo"<div>SILAHKAN LENGKAPI DATA</div>";
        }else{
            $submit=mysqli_query($konek,"INSERT INTO tbl_soal(`id_soal`,`soal`,`a`,`b`,`c`,`d`,`knc_jawaban`,`tanggal`,`aktif`) VALUES('$idl','$soal','$a','$b','$c','$d','$jawaban','$tanggal','$aktiv')");
      if($submit){
        header("location:soal.php");
    }   
    
    }
    }
	?>
	

	
    <label for="">ID</label>
    <input type="text" name="id_soal" class="form-control"/>
	<br>
    <label for="">SOAL</label>
    <input type="textarea" name="soal" class="form-control"/>
	<br>
	
<div class="row">
	<div class="col-md-4">
    <label for="">A</label>
    <input type="text" name="a" class="form-control"/>
	</div>

	<div class="col-md-4">
    <label for="">B</label>
    <input type="text" name="b" class="form-control"/>
	</div>
</div>
	
<div class="row">
	<div class="col-md-4">
    <label for="">C</label>
    <input type="text" name="c" class="form-control"/>
	</div>

	<div class="col-md-4">
    <label for="">D</label>
    <input type="text" name="d" class="form-control"/>
	</div>
</div>
<br>
    <label for="">KUNCI JAWABAN</label>
   <select name="knc_jawaban" id="" class="form-control">
   <option value="a">A</option>
   <option value="b">B</option>
   <option value="c">C</option>
   <option value="d">D</option>
   </select>

   <label for="">TANGGAL</label>
    <input type="date" name="tanggal" class="form-control"/>

    <label for="">STATUS AKTIF</label>
   <select name="aktif" id="" class="form-control">
   <option value="Y">Y</option>
   <option value="N">N</option>
   </select>
<br>
   <input type="submit" class="btn- btn-success" name="Submit" value="Submit">
    <input type="submit" class="btn- btn-danger" name="reset" value="Clear">

      </form>

												</div>
											</div>
										</div>
                                    </div>
									<hr />
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

