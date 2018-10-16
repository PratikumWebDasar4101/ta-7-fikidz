<?php
    require_once("db.php");
?>

<form method="POST">
	<table align="center">
		<tr>
			<td colspan="3" align="center" bgcolor="lightblue"><h2>Isi Data Diri!</h2></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" maxlength="10"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jeniskelamin" value="Laki Laki"> Laki Laki
				<input type="radio" name="jeniskelamin" value="Perempuan"> Perempuan</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td><select name="prodi">
				<option value="D3 MI">D3 MI</option>
				<option value="D3 PH">D3 PH</option>
				<option value="D3 IF">D3 IF</option>
				<option value="D3 TT">D3 TT</option>
				<option value="D3 MP">D3 MP</option>
				<option value="D4 SM">D4 SM</option>
			</select></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
				<option value="FIT">FIT</option>
				<option value="FIK">FIK</option>
				<option value="FRI">FRI</option>
				<option value="FTE">FTE</option>
				<option value="FEB">FEB</option>
				<option value="FKB">FKB</option>
			</select></td>
		</tr>
		<tr>
			<td>Asal</td>
			<td>:</td>
			<td><input type="text" name="asal"></td>
		</tr>
		<tr>
			<td>Moto Hidup</td>
			<td>:</td>
			<td><textarea name="moto"></textarea></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>

<?php 
if (isset($_POST['submit'])) {
	$nama 			= $_POST['nama'];
	$nim 			= $_POST['nim'];
	$jeniskelamin 	= $_POST['jeniskelamin'];
	$prodi 			= $_POST['prodi'];
	$fakultas 		= $_POST['fakultas'];
	$asal 			= $_POST['asal'];
	$moto 			= $_POST['moto'];

	$sql = "INSERT INTO mahasiswa(nama, nim, jeniskelamin, prodi, fakultas, asal, moto) 
			VALUES ('$nama', '$nim', '$jeniskelamin', '$prodi', '$fakultas', '$asal', '$moto')";

        if (mysqli_query($conn, $sql)) {
            echo "<center>Berhasil Dibuat</center>";
        }
        else {
            echo "Error: " . $sql . "<br?" . mysqli_error($conn);
        }
        mysqli_close($conn);
        echo "<center> <a href='view.php'>Lihat Data</a> </center>";
	}
	
 ?>