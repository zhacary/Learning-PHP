<?php include 'header_guru.php' ;?>
<div class="card-body">
    <?php  
        
        $tampil=mysqli_query($koneksi,"SELECT * FROM table_pg WHERE kode_pg='$_GET[id_pg]'");
        $lm=mysqli_fetch_array($tampil);
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
<h4 class="modal-title text-center" id="modalLabelSmall">Tambah soal pilihan ganda</h4>
</div>

<div class="modal-body">
<form method="POST">
    <?php 
if ($_SERVER["REQUEST_METHOD"]=='POST') {
    $kodepg=$_POST["kode_pg"];
    $kmapel=$_POST["kode_mapel"];
    $soal=$_POST["soal"];
    $a=$_POST["a"];
    $b=$_POST["b"];
    $c=$_POST["c"];
    $d=$_POST["d"];
    $kunci=$_POST["kunci"];
    $tanggal=$_POST["tanggal"];

    if($kodepg=='' || $kmapel=='' || $soal=='' || $a=='' || $b=='' || $c=='' || $d=='' || $kunci=='' || $tanggal==''){
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
         date_default_timezone_set('Asia/Jakarta');
        $simpan = mysqli_query($koneksi,"INSERT INTO `table_pg` (`kode_pg`, `kode_mapel`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `tanggal`) VALUES ('$kodepg', '$kmapel', '$soal', '$a', '$b', '$c', '$d', '$kunci', '$tanggal');");
        
        if($simpan){
            echo "<script>window.location.href='jawabpg?id_pg='<?= $_GET[id_pg] ?>.php'</script>";
        }

    }
}

    ?>



<label></label>
<?php  $tampil=mysqli_query($koneksi,"SELECT * FROM pg WHERE kode_pg='$_GET[id_pg]' ");
while($dm=mysqli_fetch_array($tampil)){ ?>
<input type="text" name="kode_pg" value="<?= $dm['kode_pg'] ?>" readonly class="hidden">
<?php } ?>

<label></label>
<?php  $mpl=mysqli_query($koneksi,"SELECT * FROM pg WHERE kode_pg='$_GET[id_pg]'");
while($mp=mysqli_fetch_array($mpl)){ ?>
<input type="text" name="kode_mapel" value="<?= $mp['kode_mapel'] ?>" readonly class="hidden">
<?php } ?>

<label>Soal</label>
<input type="text" name="soal" class="form-control">

    <label>a</label>
<input type="text" name="a" class="form-control">
    <label>b</label>
<input type="text" name="b" class="form-control">    



    <label>c</label>
<input type="text" name="c" class="form-control">
    <label>d</label>
<input type="text" name="d" class="form-control">


<label>kunci</label>
<input type="text" name="kunci" class="form-control">

<label>tanggal</label>
<input type="text" value="<?= date('Y-m-d') ?>" name="tanggal" readonly class="form-control">

<br>
       <input type="submit" class="btn btn-success" value="simpan">
</form>
</div>

</div>
</div>
</div>



											 <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul materi.." title="Type in a name">
                                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
                                                        <i class="ace-icon fa fa-book"></i>
                                                        SOAL PILIHAN GANDA
                                                    </h5>

                                                    <div class="widget-toolbar">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
                                                    +
                                                    </button>
                                                    </div>
                                                </div>
																
                                                <div class="widget-body widget-container-col">
                                                    <div class="widget-main no-padding table-container" >
                                                        <table class="table table-striped table-bordered table-hover ">
                                                            <thead class="thin-border-bottom">
                                                                <tr>
                                                                <th>No</th>
                                                                <th>kode pg</th>
                                                                <th>soal</th>
                                                                <th>a</th>
                                                                <th>b</th>
                                                                <th>c</th>
                                                                <th>d</th>

                                                                <th>kunci</th>
                                                                <th>tanggal</th>
                                                                
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                                  $i = 1;

                                                                
                                                                    $tampil2=mysqli_query($koneksi,"SELECT * FROM `table_pg` WHERE kode_pg='$_GET[id_pg]' ");
                                                                    while($dm=mysqli_fetch_array($tampil2)){           
                                                            ?>
                                                            <tbody>
                                                                 
                                                                <tr>
                                                                
                                                                    <td class=""><?= $i++; ?></td>
                                                                    <td class=""><?= $dm['kode_pg']; ?></td>
                                                                    <td class=""><?= $dm['soal']; ?></td>
                                                                    <td class=""><?= $dm['a']; ?></td>
                                                                    <td class=""><?= $dm['b']; ?></td>
                                                                    <td class=""><?= $dm['c']; ?></td>
                                                                    <td class=""><?= $dm['d']; ?></td>
                                                                    <td class=""><?= $dm['kunci']; ?></td>
                                                                    <td class=""><?= $dm['tanggal']; ?></td>


                                                                </tr>
                                                                
                                                                
                                                                
                                                            </tbody>
                                                            <?php  } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                             </div>
                                          </div>
                                        
	</div>
    
	
 
 

