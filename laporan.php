<?php include 'koneksi.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservasi Hotel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="window.print()">
<div class="container mt-3">
	<h3 class="align-center">Data Booking Hotel</h3>
	<table class="table">
		<tr>
			<th>No</th>
			<th>NAMA PEMESAN</th>
			<th>ID KAMAR</th>
			<th>LAMA SEWA</th>
			<th>TOTAL BAYAR</th>
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
	<table width="100%">
		<br>
		<tr>
			<td></td>
			<td width="200px">
				<p>Bengkulu, <?php echo date('Y-m-d'); ?></p>
				Administrator
				<br>
				<br>
				<br>
			<p>__________________</p>
			</td>
		</tr>
	</table>
</div>

<?php include 'footer.php'; ?>