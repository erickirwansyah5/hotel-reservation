<?php include 'header.php'; include 'koneksi.php'; ?>

<div class="container mt-2">
	<?php if(isset($_GET['id_kamar'])): ?>
		<?php $id_kamar = $_GET['id_kamar']; 
			$query = mysqli_query($conn,"SELECT * FROM tipe_kamar WHERE id_kamar = '$id_kamar'");
			$row = mysqli_fetch_assoc($query);
		?>
	<form action="proses.php" method="post">
		<table class="table">
			<tr>
				<td>Nama Kamar</td>
				<td>
					<input type="hidden" name="id_kamar" value="<?= $id_kamar ?>">
					<input type="text" class="form-control" name="nama" value="<?= $row['nama_kamar'] ?>" required>
				</td>
			</tr>
			<tr>
				<td>Fasilitas</td>
				<td>
					<input type="text" class="form-control" name="fasilitas" value="<?= $row['fasilitas'] ?>" required>
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>
					<input type="text" class="form-control" name="harga" value="<?= $row['harga'] ?>" required id="harga" >
				</td>
			</tr>
			<tr>
				<td>Jumlah Kamar</td>
				<td>
					<input type="number" class="form-control" name="jumlah" value="<?= $row['jumlah_kamar'] ?>" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" class="btn btn-primary" name="ubah">Update</button></td>
			</tr>	
		</form>
		</table>
	<?php endif; ?>
</div>

<?php include 'footer.php'; ?>