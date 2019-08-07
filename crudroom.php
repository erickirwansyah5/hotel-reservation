<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?>

<div class="container mt-2">
	<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Add Room</button>
	<table class="table table-bordered table-striped">
		<tr>
			<th>NO</th>
			<th>NAMA KAMAR</th>
			<th>FASILITAS</th>
			<th>HARGA/MALAM</th>
			<th>JUMLAH KAMAR</th>
			<th colspan="2">AKSI</th>
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
			<td><a href="ubah.php?id_kamar=<?= $row['id_kamar'] ?>"class="btn btn-warning">UBAH</a></td>
			<td><a onclick="return confirm('Yakin?')" href="hapus.php?id_kamar=<?= $row['id_kamar'] ?>" class="btn btn-danger">HAPUS</a></td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>

<?php include 'footer.php'; ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post">
        	<table class="table">
        		<tr>
        			<td>Nama</td>
        			<td><input type="text" class="form-control" name="nama" required=""></td>
        		</tr><tr>
        			<td>Fasilitas</td>
        			<td><input type="text" class="form-control" name="fasilitas" required=""></td>
        		</tr><tr>
        			<td>Harga</td>
        			<td><input type="number" class="form-control" name="harga" required=""></td>
        		</tr><tr>
        			<td>Jumlah Kamar</td>
        			<td><input type="text" class="form-control" name="jumlah" required=""></td>
        		</tr>
        	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>