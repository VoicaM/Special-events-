<?php
session_start();
if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $cod = $_GET['sterg'];
  include '../../conectare.php';
  $comanda = "DELETE FROM functii where cod_functie = $cod";
  mysqli_query($cnx, $comanda);
  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../functii.php');
} else {
  //  Nu este logat!
  header('Location: ../index.php');
}
?>