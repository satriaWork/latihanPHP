<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	error_reporting(0);
	$server="localhost";
	$user="root";
	$password="";
	$database="latihan";

	if (isset($_POST["nopol"])) {
		$nopol=$_POST["nopol"];
		$merek=$_POST["merek"];
		$tahun=$_POST["tahun"];
		$pemilik=$_POST["pemilik"];

		$koneksi=mysqli_connect($server,$user,$password,$database);
		if (!$koneksi) {
		die("Connection failed". mysqli_connect_error());
		}

		if ($merek=="" or $tahun=="" or $pemilik=="") {
               echo '<script language="javascript">alert("Isi seluruh datanya!");</script>';
            }else{

			$sql="UPDATE mobil SET merek='".$merek."',tahun='".$tahun."',pemilik='".$pemilik."' WHERE nopol='".$nopol."'";
			$result=mysqli_query($koneksi,$sql);

        	if(mysqli_query($koneksi, $sql)) {
                echo '<script language="javascript">alert("Berhasil!");</script>';
                header("Refresh: 0.1; url=index.php");
            } else {
                echo '<script language="javascript">alert("Error!");</script>';
            }
			}
	// if (isset($_GET["nopol"])) {
	// 		$nim = $_GET["nopol"];

	// 		$koneksi = mysqli_connect($server,$user,$password,$database);
	// 		if (!$koneksi) {
	// 		    die("Connection failed: " . mysqli_connect_error());
	// 		    echo "<br><a href='index.php'>kembali</a>";
	// 		}

	// 		$sql = "SELECT * FROM mobil WHERE nopol=$nopol";
	// 		$result = mysqli_query($koneksi, $sql);
	// 		if (mysqli_num_rows($result) > 0) {
	// 			$row = mysqli_fetch_assoc($result);
	// 			$nama = $row["merek"];
	// 			$nopol=$row["nopol"];
	// 			$tahun= $row["tahun"];
	// 			$pemilik = $row["pemilik"];
	// 		} else {
	// 			echo "tidak ada id tersebut";
	// 		}
	// 	}
	}
	 ?>



	<a href="index.php">Home</a>
    <br/><br/>

    <form name="update" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="merek"></td>
            </tr>
            <tr> 
                <td>Tahun</td>
                <td><input type="text" name="tahun" ></td>
            </tr>
            <tr> 
                <td>Pemilik</td>
                <td><input type="text" name="pemilik"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nopol" value=<?php echo $_GET['nopol'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>