<?php include 'header.php'; include 'koneksi.php'; ?>

<div class="container mt-2">
	<h3 class="align-center">Data Hotel Yang di Booking</h3>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>NAMA PEMESAN</th>
			<th>ID KAMAR</th>
			<th>LAMA SEWA</th>
			<th>TOTAL BAYAR</th>
			<th>AKSI</th>
		</tr>	
		<?php $no=1;
		$query = mysqli_query($conn,"SELECT * FROM booking ORDER BY id_order ");
		while($row = mysqli_fetch_assoc($query)) :
		 ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $row['nama_user'] ?></td>
			<td><?= $row['id_kamar'] ?></td>
			<td><?= $row['lama_sewa'] ?> hari</td>
			<td>Rp. <?= $row['total_bayar'] ?></td>
			<td>
				<?php if($row['status'] == 1) { ?>
				<a href="" class="btn btn-success">Sudah Checkout</a>
			<?php }else { ?>
				<a href="proses.php?id_order=<?= $row['id_order'] ?>&id_kamar=<?= $row['id_kamar'] ?>" class="btn btn-warning" onclick="return confirm('User Akan DiCheckout?')">Checkout</a>
			<?php } ?>
			</td>
		</tr>
	<?php endwhile; ?>
	<tr>
		<td colspan="4"><b>Total Pemasukan</b></td>
		<?php $query = mysqli_query($conn,"SELECT sum(total_bayar) as sum from booking"); 
			$row = mysqli_fetch_assoc($query);
		?>
		<td>Rp. <?= $row['sum'] ?></td>
	</tr>
	</table>
</div>


 ?>
<?php include 'footer.php'; ?>