<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservasi Hotel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container mt-2">
  <a class="navbar-brand" href="index.php">Raja Hotel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="room.php">Room</a>
      </li> 
      <li class="nav-item active right">
        <a class="nav-link " href="admin.php">admin</a>
      </li>
    <?php if(isset($_SESSION['admin'])) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="crudroom.php">CRUD Room</a>
      </li> 
      <li class="nav-item active right">
        <a class="nav-link " href="Penyewaan.php">Penyewaan</a>
      </li>
      <li class="nav-item active right">
        <a class="nav-link " target="_blank" href="laporan.php">Laporan</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</div>
</nav>