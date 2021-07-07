<?php 
include 'header_siswa.php';

 ;?>




<?php 
$query=mysqli_query($koneksi,"SELECT * FROM table_pg WHERE kode_pg='$_GET[id_pg]'");
$pg=mysqli_fetch_array($query);
?>


<?php 
$nama=mysqli_query($koneksi,"SELECT * FROM jawab_pg WHERE kode_pg='$_GET[id_pg]' AND ID_User='$mm[ID_User]'");
$nm=mysqli_fetch_array($nama);
if($nm==null){
?>


								<div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
    								<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														SOAL UJIAN PILIHAN GANDA
													</h5>

													<div class="widget-toolbar">
													
													</div>
												</div>
												<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>


												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding" id="myTable">
														<table class="table table-hover ">
															 <tbody>
                <?php
                  
                    $query    =mysqli_query($koneksi, "SELECT * FROM table_pg WHERE kode_pg='$_GET[id_pg]' ORDER BY kode_pg  DESC");
                    $jumlah =mysqli_num_rows($query);
                    $no = 0;
                    while($data = mysqli_fetch_array($query)){
                    $no++
                ?>
                <form action="jawab_pg.php?id_pg=<?= $_GET['id_pg'] ?>" method="POST">
                    <input type="hidden" name="id[]" value="<?php echo $data['id_pg']; ?>">
                    <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                    <tr style="background-color: DodgerBlue; color: white;">
                        <td><?php echo $no?>.</td>
                        <td><?php echo $data['soal'];?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>A. <input name="pilihan[<?php echo $data['id_pg']?>]" type="radio" value="A"><?php echo $data['a'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>B. <input name="pilihan[<?php echo $data['id_pg']?>]" type="radio" value="B"><?php echo $data['b'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>C. <input name="pilihan[<?php echo $data['id_pg']?>]" type="radio" value="C"><?php echo $data['c'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>D. <input name="pilihan[<?php echo $data['id_pg']?>]" type="radio" value="D"><?php echo $data['d'];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td height="40"></td>
                        <?php $jawab=mysqli_query($koneksi,"SELECT * FROM jawab_pg WHERE kode_pg='$_GET[kode_pg]' AND ID_User='$_SESSION[ID_User]' "); 
																	$tmp=mysqli_fetch_array($jawab); if($tmp==null) { ?>
                        <td>
                            <input type="submit" name="submit" value="Jawab" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')">
                            <input type="reset" value="Reset">
                        </td>
                        <?php }else{ ?>
                        	<td>Sudah di isi</td>
                        	<?php } ?>
                    </tr>
                </form>
            </tbody>
														</table>
													</div>
												</div>



											</div>
								</div>


<?php }else{ ?>

    <div class='clearfix'>
                                        <div class='pull-left alert alert-info no-margin alert-dismissable col-xs-12'>
                                            <button type='button' class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                            </button>
                                            <i class='ace-icon fa fa-info-circle bigger-120 blue'></i>
                                            SOAL SUDAH DI ISI ...
                                        </div>
                                        </div>


    <?php } ?>