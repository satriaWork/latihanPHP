<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
<?php
		$server = "localhost";
		$user = "root";
		$password = "";
		$database = "latihan";

		if (isset($_GET["nopol"])) {
			$nopol = $_GET["nopol"];

			$koneksi = mysqli_connect($server,$user,$password,$database);
			if (!$koneksi) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "DELETE FROM mobil
					WHERE nopol='".$nopol."'";

			if (mysqli_query($koneksi, $sql)) {
			    echo '<script language="javascript">alert("Berhasil dihapus");</script>';
			} else {
			    echo '<script language="javascript">alert("Error!");</script>';
			}


		} else {
			echo "tidak ada id tersebut";
			echo "<br><a href='index.php'>kembali</a>";
			
		} 
	?>
</body>
</html>