<?php
    require_once("db.php");
?>
<form action="view.php" method="POST">
	<input type="text" name="cari">
	<input type="submit" name="submit">
</form>
<table border="1" align="center">
	<tr>
		<th>Nama</th>
		<th>NIM</th>
		<th>Keterangan</th>
	</tr>
	<body>
		<?php
		@$cari	= $_POST['cari'];
		$sql	= "SELECT nim, nama FROM mahasiswa WHERE nim LIKE '%$cari%'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?php echo $row['nama']?></td>
					<td><?php echo $row['nim']?></td>
					<td><a href="delete.php?nama=<?php echo $row['nama']?>">Hapus</a> | <a href="edit.php?nama=<?php echo $row['nama']?>">Edit</a></td>
					</tr>
				<?php
			}
		}else {
			echo "Tidak Ada Data Tersedia";
		}
			mysqli_close($conn);
		?>
	</body>
</table>
<center> <a href='home.php'>Home</a> </center>