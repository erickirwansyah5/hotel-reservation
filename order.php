<?php include 'header.php';
include 'koneksi.php';
 ?>
<div class="container mt-2">
	<?php if(isset($_GET['id_kamar'])): ?>
		<?php $id_kamar = $_GET['id_kamar']; 
			$query = mysqli_query($conn,"SELECT * FROM tipe_kamar WHERE id_kamar = '$id_kamar'");
			$row = mysqli_fetch_assoc($query);
		?>
		<form action="proses.php" method="post">
		<table class="table">
			<tr>
				<td>Nama Lengkap</td>
				<td>
					<input type="hidden" name="id_kamar" value="<?= $id_kamar ?>">
					<input type="text" class="form-control" name="nama" required>
				</td>
			</tr>
			<tr>
				<td>Tipe Kamar</td>
				<td>
					<input type="text" class="form-control" name="tipe_kamar" value="<?= $row['nama_kamar'] ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>
					<input type="text" class="form-control" name="harga" value="<?= $row['harga'] ?>" disabled id="harga" >
				</td>
			</tr>
			<tr>
				<td>Lama Sewa</td>
				<td>
					<input type="number" class="form-control" name="lama_sewa" id="lama_sewa" required>
				</td>
			</tr>
			<tr>
				<td>Total Bayar</td>
				<td>
					<input type="text" class="form-control" name="total" value="" id="total" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" class="btn btn-primary" name="order">Order Now</button></td>
			</tr>	
		</form>
		</table>
	<?php endif; ?>
</div>
 <?php include 'footer.php'; ?>
<script>
	$('#lama_sewa').blur(function() {
		const val = $(this).val();
		const harga = $('#harga').val();
		$('#total').val(val*harga); 
	})
</script>
