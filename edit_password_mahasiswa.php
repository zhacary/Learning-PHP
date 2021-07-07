<?php include 'header_siswa.php'; ?>

<div>
    <form action="" method="post">
    <?php
          $sqledit=mysqli_query($koneksi,"SELECT * FROM user WHERE ID_User='$_GET[ID_User]'");
          $e=mysqli_fetch_array($sqledit);
          ?>
                    <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $pass = md5($_POST["Password"]);
                        $id   = $_GET['ID_User'];
                    
                        $update =mysqli_query($koneksi,"UPDATE user SET 
                        Password='$pass'
                        WHERE ID_User='$id'");




                        if($update){
                            echo"<script>window.location.href='login.php'</script>";
                                }
                    


                    }
                    ?>
                     <div class="col">
                    <label for="">Edit Password</label>
                    <input type="text" name="Password" value=<?= $e['Password'] ?> class="form-control">
                    </div>
                    <br>
                    <input type="submit" onclick="return confirm('setelah mengganti nama user anda harus login dengan username baru klik ok untuk konfirmasi')"  class="btn- btn-success" name="Submit" value="Submit">
                    <a type="button" class=" btn-app" href="edit_User_mhs.php" value="Clear">Kembali</a>
                    

    </form>
</div>