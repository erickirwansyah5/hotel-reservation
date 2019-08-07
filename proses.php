<?php 
require 'koneksi.php';

if(isset($_POST['order'])) {
	$nama = $_POST['nama'];
	$id_kamar = $_POST['id_kamar'];
	$lama_sewa = $_POST['lama_sewa'];
	$total = $_POST['total'];

	$query = "INSERT INTO booking(nama_user,id_kamar,lama_sewa,total_bayar) VALUES('$nama','$id_kamar','$lama_sewa','$total')";
	$proses = mysqli_query($conn,$query);
	if($proses) {
		$query = mysqli_query($conn,"SELECT * FROM tipe_kamar WHERE id_kamar = '$id_kamar'");
		$total_kamar = mysqli_fetch_assoc($query);
		if($total_kamar['jumlah_kamar']  <= 0) {
				echo ("<script type='text/javaScript'>
		    window.alert('Stock Kamar Sudah Habis');
		    window.location.href='room.php';
		    </script>");
		}else {
			mysqli_query($conn, "UPDATE tipe_kamar SET jumlah_kamar = (jumlah_kamar - 1)");
				echo ("<script type='text/javaScript'>
		    window.alert('Data Berhasil Dibooking');
		    window.location.href='room.php';
		    </script>");
			}
	}else{
			echo ("<script type='text/javaScript'>
	    window.alert('Data Gagal Dibooking');
	    window.location.href='room.php';
	    </script>");
	}
}

if(isset($_GET['id_order'])) {
	$id_order = $_GET['id_order'];
	$id_kamar = $_GET['id_kamar'];
	$query = mysqli_query($conn,"UPDATE booking SET status = 1 WHERE id_order = '$id_order'");
	if($query) {
		mysqli_query($conn,"UPDATE tipe_kamar SET jumlah_kamar = (jumlah_kamar + 1) WHERE id_kamar = '$id_kamar'");
		header('location: penyewaan.php');
	}
}

if(isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$fasilitas = $_POST['fasilitas'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$query = mysqli_query($conn, "INSERT INTO tipe_kamar(nama_kamar,fasilitas,harga,jumlah_kamar) VALUES('$nama','$fasilitas','$harga',$jumlah)");
	if($query) {
		echo ("<script type='text/javaScript'>
		   window.alert('Data Berhasil Disimpan')
		   window.location.href='crudroom.php'
		    </script>");
	}else{
		echo ("<script type='text/javaScript'>
		    window.alert('Data Gagal Disimpan');
		    window.location.href='room.php';
		    </script>");
	}
}
if(isset($_POST['ubah'])) {
	$id_kamar = $_POST['id_kamar'];
	$nama = $_POST['nama'];
	$fasilitas = $_POST['fasilitas'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$query = mysqli_query($conn, "UPDATE tipe_kamar set nama_kamar ='$nama',fasilitas='$fasilitas',harga='$harga',jumlah_kamar='$jumlah' WHERE id_kamar='$id_kamar'");
	if($query) {
		echo ("<script type='text/javaScript'>
		   window.alert('Data Berhasil Diubah')
		   window.location.href='crudroom.php'
		    </script>");
	}else{
		echo ("<script type='text/javaScript'>
		    window.alert('Data Gagal Diubah');
		    window.location.href='room.php';
		    </script>");
	}
}

 ?>