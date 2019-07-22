<!DOCTYPE html>
<html>
<head>
	<title>Bengkel Mobil</title>
</head>
<body>

<?php
// include "config.php";
error_reporting(0);
	$server="localhost";
	$user="root";
	$password="";
	$database="latihan";


	$koneksi=mysqli_connect($server,$user,$password,$database);
	if (!$koneksi) {
		die("Connection failed". mysqli_connect_error());
	}


	$sql="SELECT * FROM mobil";
	if (isset($_GET["nopol"])) {
		$nopol=$_GET["nopol"];	
		$sql2="SELECT * FROM mobil WHERE nopol LIKE '%$nopol%'";
	}
	$result=mysqli_query($koneksi,$sql);


	if (isset($_GET["nopol"])) {
			$nopol = $_GET["nopol"];

			$koneksi = mysqli_connect($server,$user,$password,$database);
			if (!$koneksi) {
			    die("Connection failed: " . mysqli_connect_error());
			}	

		$sql2 = "DELETE FROM mobil WHERE nopol='".$nopol."'";

			if (mysqli_query($koneksi, $sql2)) {
			    echo '<script language="javascript">alert("Berhasil dihapus");</script>';
			    header("Refresh: 0.1; url=index.php");
			} else {
			    echo '<script language="javascript">alert("Error!");</script>';
			}
		}


?>
<form>
	<table>
		<tr>
			<td>Search : </td>
			<td><input type="text" name="nopol"></td>
			<td><input type="submit" name="cari" value="Search"></td>
		</tr>
	</table>	
</form><hr>

<form action="" method="post">
    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>Nomor Polisi</th>
            <th>Merek</th>
            <th>Tahun</th>
            <th>Pemilik</th>
            <th>Action</th>
        </tr>
        <?php if(mysqli_num_rows($result)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $data["nopol"] ?></td>
            <td><?php echo $data["merek"];?></td>
            <td><?php echo $data["tahun"];?></td>
            <td><?php echo $data["pemilik"];?></td>
            <td><?php  
                echo "<a href='index.php?nopol=" . $data[nopol] . "'> delete </a> |
                <a href='edit.php?nopol=" . $data[nopol] . "'> edit </a>";
            ?></td>
        </tr>
        <?php $no++; } ?>
        <?php 
    } 
    ?>
    </table>
</form>

<form action="insert.php">
	 	<input type="submit" name="insert" value="Insert"></a>
</form>
</body>
</html>