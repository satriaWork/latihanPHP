<!DOCTYPE html>
<html>
<head>
  <title>Tugas 4</title>
</head>
<body>
  <form method="POST">
      Kata:<input type="text" name="kata">
      <input type="submit" name="hitung">
  </form>

  <?php 
  if ($_POST && isset($_POST['kata'])): 
  ?>
  	<br>
    <hr>
    <table>
      <?php 
      foreach (huruf($_POST['kata']) as $huruf =>$jumlah): 
      ?>
        <tr>
          <td><?php echo $huruf ?></td>
          <td>=</td>
          <td><?php echo $jumlah ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  <?php endif ?>


  <?php
	function huruf($kata){
	  $arrayKata = str_split(strtolower($kata));
	  $arrayHuruf = ['a','e','i','o','u'];
	  $get = array_intersect($arrayHuruf, $arrayKata);
	  $count =array_count_values($arrayKata);
	  $result = [];
    asort($get);

	  foreach ($get as $item) {
      $result[$item] = $count[$item];

	  }
	  return $result;

}
?>

</body>
</html>