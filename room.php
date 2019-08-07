<?php include 'header.php';
include 'koneksi.php';
 ?>

<div class="container mt-2">
	<table class="table table-bordered table-striped">
		<tr>
			<th>NO</th>
			<th>NAMA KAMAR</th>
			<th>FASILITAS</th>
			<th>HARGA/MALAM</th>
			<th>JUMLAH KAMAR</th>
			<th>AKSI</th>
		</tr>
		<?php $kamar =  mysqli_query($conn,"SELECT * FROM tipe_kamar");
			$no =1;
		 ?>
		<?php while($row = mysqli_fetch_assoc($kamar)) : 
			?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $row['nama_kamar'] ?></td>
			<td><?= $row['fasilitas'] ?></td>
			<td><?= $row['harga'] ?></td>
			<td><?= $row['jumlah_kamar'] ?></td>
			<td>
				<?php if($row['jumlah_kamar'] <= 0) { ?>
				<button disabled class="btn btn-warning">ALL BOOKED</button>
			<?php }else{ ?>
				<a class="btn btn-primary"href="order.php?id_kamar=<?= $row['id_kamar'] ?>">ORDER</a></td>
			<?php } ?>
		</tr>
	<?php endwhile; ?>
	</table>
</div>

<?php include 'footer.php'; ?>
