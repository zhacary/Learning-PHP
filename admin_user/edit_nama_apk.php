<?php include 'indexadmin.php' ?>

<div>
    <form action="" method="post">
    <?php
          $sqledit=mysqli_query($koneksi,"SELECT * FROM aplikasi WHERE id='$_GET[id]'");
          $e=mysqli_fetch_array($sqledit);
          ?>
                    <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $nama = $_POST["nama_apk"];
                        $id   = $_GET['id'];
                    
                        $update =mysqli_query($koneksi,"UPDATE aplikasi SET 
                        nama_apk='$nama'
                        WHERE id='$id'");




                        if($update){
                            echo"<script>window.location.href='setaplikasi.php'</script>";
                                }
                    


                    }
                    ?>
                     <div class="col">
                    <label for="">NO TRANSAKSI</label>
                    <input type="text" name="nama_apk" value=<?= $e['nama_apk'] ?> class="form-control">
                    </div>
                    <br>
                    <input type="submit" class="btn- btn-success" name="Submit" value="Submit">
                    <input type="submit" class="btn- btn-danger" name="reset" value="Clear">
                    

    </form>
</div>