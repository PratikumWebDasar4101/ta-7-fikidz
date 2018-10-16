<?php
    require_once("db.php");
    $nim = $_GET['nim'];
    $sql = mysqli_query($conn, "SELECT * FROM mahasiswa");
    $row = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center"><h2>Edit Profil</h2></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="35" value="<?php echo $row['nama'];?>" required></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" maxlength="10" minlength="10" value="<?php echo $row['nim'];?>" readonly disabled></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="radio" name="jeniskelamin" <?php if($row['jeniskelamin'] == "laki-laki") { ?> checked <?php } ?>value="laki-laki">Laki-laki
                <input type="radio" name="jeniskelamin" <?php if($row['jeniskelamin'] == "perempuan") { ?> checked <?php } ?>value="perempuan">Perempuan</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><select name="prodi">
                        <option <?php if($row['prodi'] == "D3 MI") { ?> selected <?php } ?> value="FIT">FIT</option>
                        <option <?php if($row['prodi'] == "D3 PH") { ?> selected <?php } ?> value="D3 PH">D3 PH</option>
                        <option <?php if($row['prodi'] == "D3 IF") { ?> selected <?php } ?> value="D3 IF">D3 IF</option>
                        <option <?php if($row['prodi'] == "D3 TT") { ?> selected <?php } ?> value="D3 TT">D3 TT</option>
                        <option <?php if($row['prodi'] == "D3 MP") { ?> selected <?php } ?> value="D3 MP">D3 MP</option>
                        <option <?php if($row['prodi'] == "D4 SM") { ?> selected <?php } ?> value="D4 SM">D4 SM</option>
                    </select></td>
            </tr>
            
            <tr>
                <td>Fakultas</td>
                <td><select name="fakultas">
                        <option <?php if($row['fakultas'] == "FIT") { ?> selected <?php } ?> value="FIT">FIT</option>
                        <option <?php if($row['fakultas'] == "FEB") { ?> selected <?php } ?> value="FEB">FEB</option>
                        <option <?php if($row['fakultas'] == "FIK") { ?> selected <?php } ?> value="FIK">FIK</option>
                        <option <?php if($row['fakultas'] == "FTE") { ?> selected <?php } ?> value="FTE">FTE</option>
                        <option <?php if($row['fakultas'] == "FIF") { ?> selected <?php } ?> value="FIF">FIF</option>
                        <option <?php if($row['fakultas'] == "FRI") { ?> selected <?php } ?> value="FRI">FRI</option>
                        <option <?php if($row['fakultas'] == "FKB") { ?> selected <?php } ?> value="FKB">FKB</option>
                    </select></td>
            </tr>
            <tr>
                <td>Asal</td>
                <td><textarea name="asal" rows="5"><?php echo $row['asal'];?></textarea></td>
            </tr>
            <tr>
                <td>Moto Hidup</td>
                <td><textarea name="moto" rows="5"><?php echo $row['moto'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form> 
    </center>   
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $nama           = $_POST['nama'];
    $nim            = $_POST['nim'];
    $jeniskelamin   = $_POST['jeniskelamin'];
    $prodi          = $_POST['prodi'];
    $fakultas       = $_POST['fakultas'];
    $asal           = $_POST['asal'];
    $moto           = $_POST['moto'];

     $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jeniskelamin='$jeniskelamin', prodi='$prodi',fakultas='$fakultas', asal='$asal', moto='$moto' WHERE nim='$nim'";
    
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Berhasil Diedit'); location='view.php'</script>";
        }else {
            echo "Error: " . $sql . "<br?" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>