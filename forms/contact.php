<?php

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
  $sir = htmlspecialchars($sir);
  return $sir;
}

// preiau valorile din campurile formularului (nume, email, subiect si mesaj) 
// și verific daca acele campuri au fost completate
$eroare = '';

if(empty($_POST['name'])) {
  $eroare .= '<p>Nu ați introdus numele!</p>';
} else {
  $nume = corectez($_POST['name']);
}

if(empty($_POST['email'])) {
  $eroare .= '<p>Nu ați introdus adresa Dv. de e-mail!</p>';
} else {
  $email = corectez($_POST['email']);
}

if(empty($_POST['subject'])) {
  $eroare .= '<p>Nu ați introdus subiectul!</p>';
} else {
  $subiect = corectez($_POST['subject']);
}

if(empty($_POST['message'])) {
  $eroare .= '<p>Nu ați introdus mesajul!</p>';
} else {
  $mesaj = corectez($_POST['message']);
}

//  Verific daca preluarea datelor s-a derulat corect
if($eroare == '') {
  //  Nu sunt mesaje de eroare
  include '../conectare.php';
  // formulez comanda INSERT
  $comanda = "INSERT INTO mesaje (nume, email, subiect, mesaj) VALUES (?, ?, ?, ?)";
  if($stm = mysqli_prepare($cnx, $comanda)) {
    mysqli_stmt_bind_param($stm, 'ssss',$nume, $email, $subiect, $mesaj);
    mysqli_stmt_execute($stm);
  } else {
    echo "Eroare la crearea variabilei de tip statement.";
  }
  mysqli_close($cnx);
  //  Reincarc "index.php"
  header('Location: http://localhost/specialevents/index.php');
} else {
  echo "Eroare: " . $eroare;
}
?>