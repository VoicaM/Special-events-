<?php
session_start();

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
  $sir = htmlspecialchars($sir);
  return $sir;
}

if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $eroare = '';

  if(empty($_POST['functia'])) {
    $eroare .= '<p>Nu ați introdus funcția!</p>';
  } else {
    $functia = corectez($_POST['functia']);
  }

  //  Verific daca preluarea datelor s-a derulat corect
  if($eroare == '') {
    //  Nu sunt mesaje de eroare
    include '../../conectare.php';
    // formulez comanda INSERT
    $comanda = "INSERT INTO functii (functie) VALUES (?)";
    if($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 's',$functia);
      mysqli_stmt_execute($stm);
    } else {
      echo "Eroare la crearea variabilei de tip statement.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ../functii.php');
  } else {
    echo "Eroare: " . $eroare;
  }
} else {
  //  Nu este logat!
  header('Location: ../index.php');
}
?>