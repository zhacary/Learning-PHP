<?php include 'header_siswa.php'; ?>
 <div>
        <table class="table">
       <tr>
        <th>NAMA Username SAAT INI</th>
        

        
        <?php 
        $t=mysqli_query($koneksi,"SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
        while($sr=mysqli_fetch_array($t)){
        ?>
		
        <td>
        <?= $sr['Username'] ;?>
        </td>
		
        <td>
        <a href="edit_user_mahasiswa.php?action=Edit&ID_User=<?=$sr["ID_User"]?>" class="btn btn-sm btn-primary no-radius">
											<i class="ace-icon fa fa-pencil-square-o bigger-117"></i>
											Edit											
										</a>
        </td>
		</tr>
		
		<tr>
		<th>Password SAAT INI</th>
		 <td>
        <?= $sr['Password'] ;?>
        </td>
		

        <td>
        <a href="edit_password_mahasiswa.php?action=Edit&ID_User=<?=$sr["ID_User"]?>" class="btn btn-sm btn-primary no-radius">
											<i class="ace-icon fa fa-pencil-square-o bigger-117"></i>
											Edit											
										</a>
        </td>
       </tr>
        <?php } ?>
        </table>
    
    </div>