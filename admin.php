<?php include 'header.php'; include 'koneksi.php'; ?>
<?php 

if(isset($_POST['login'])) {
	$adm = $_POST['admin'];
	$pass = $_POST['password'];
	$query = mysqli_query($conn,"SELECT * FROM admin WHERE admin = '$adm' and pass= '$pass'");
	$row = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query) > 0) {
		$_SESSION['admin'] = $row['admin'];
	}else {
		echo ("<script type='text/javaScript'>
		    window.alert('ADMIN TIDAK TERSEDIA');
		    window.location.href='admin.php';
		    </script>");
	}
}

 ?>

<div class="container mt-2">
	<?php if(isset($_SESSION['admin'])) : ?>
			<div class="jumbotron">
  <h1 class="display-4">Selamat Datang, Admin</h1>
  <p class="lead">Menu ini digunakan untuk memanage data-data yang ada didalam aplikasi ini</p>
  <hr class="my-4">
  <p>Raja Hotel, Jl. Bengkulu-tais KM 32</p>
  <a class="btn btn-primary btn-lg" href="logout.php" role="button">Log Out</a>
</div>
	<?php endif; ?>
	<?php if(!isset($_SESSION['admin'])) : ?>
	<h3>Login Admin</h3>
	<form action="admin.php" method="post">
	<table class="table">
		<tr>
			<td width="10%">Administrator</td>
			<td width="25%"><input type="text" name="admin" class="form-control mr-sm-2" required></td>
			<td></td>
		</tr>
		<tr>
			<td width="10%">Password</td>
			<td width="25%"><input type="Password" name="password" class="form-control mr-sm-2" required></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</td>
			<td></td>
		</tr>
	</form>
	</table>
<?php endif; ?>
</div>


<?php include 'footer.php'; ?>