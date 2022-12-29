<?php
session_start();
if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $cod = $_POST['editez'];
  $corecta = $_POST['functia'];
  include '../../conectare.php';
  $comanda = "UPDATE functii set functie = '$corecta' where cod_functie = $cod";
  mysqli_query($cnx, $comanda);
  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../functii.php');
} else {
  //  Nu este logat!
  header('Location: ../index.php');
}
?>
