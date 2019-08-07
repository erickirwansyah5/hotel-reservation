<?php 
include 'koneksi.php';
if(isset($_GET['id_kamar'])) {
    $id_kamar = $_GET['id_kamar']; 
			$query = mysqli_query($conn,"DELETE FROM tipe_kamar WHERE id_kamar = '$id_kamar'");
			if($query) 
			{
				echo ("<script type='text/javaScript'>
		    window.alert('data berhasil dihapus');
		    window.location.href='crudroom.php';
		    </script>");
			}

		}
	
