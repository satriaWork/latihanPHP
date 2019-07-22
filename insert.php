<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="insert" method="post" action="insert.php">
        <table border="0">
            <tr> 
                <td>Nomor Polisi</td>
                <td><input type="text" name="nopol"></td>
            </tr>
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="merek"></td>
            </tr>
            <tr> 
                <td>Tahun</td>
                <td><input type="text" name="tahun"></td>
            </tr>
            <tr> 
                <td>Pemilik</td>
                <td><input type="text" name="pemilik"></td>
            </tr>
            <tr>
                <td><input type="submit" name="insert" value="Insert"></td>
            </tr>
        </table>
    </form>


    <?php
    error_reporting(0);
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "latihan";

        if (isset($_POST["nopol"])) {
            $nopol = $_POST["nopol"];
            $merek = $_POST["merek"];
            $tahun = $_POST["tahun"];
            $pemilik = $_POST["pemilik"];

            $koneksi = mysqli_connect($server,$user,$password,$database);
            if (!$koneksi) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO mobil (nopol,merek,tahun,pemilik)
                    VALUES (
                    '". $nopol ."',
                    '". $merek ."',
                    ". $tahun .",
                    '". $pemilik ."'
                    )";

            if ($nopol=="" or $merek=="" or $tahun=="" or $pemilik=="") {
               echo '<script language="javascript">alert("Isi seluruh datanya!");</script>';
            }elseif (mysqli_query($koneksi, $sql)) {
                echo '<script language="javascript">alert("Berhasil!");</script>';
            } else {
                echo '<script language="javascript">alert("Error!");</script>';
            }
            

        }
        ?>
</body>
</html>