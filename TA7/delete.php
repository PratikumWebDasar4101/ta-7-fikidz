<?php
    require_once("db.php");

    $nama = $_GET['nama'];
    $sql = "DELETE FROM mahasiswa WHERE nama='$nama'";

    if (mysqli_query($conn, $sql)) {
        header("location: view.php");
    }else {
        echo "Error: " . $sql . "<br?" . mysqli_error($conn);
    }
    	mysqli_close($conn);
?>