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

//  Campuri din formular: name="nume", name="prenume", name="fotografie", name="email"
//           name="twitter", name="facebook", name="instagram", name="linkedin", name="functia"

  if(empty($_POST['nume'])) {
    $eroare .= '<p>Nu ați introdus numele!</p>';
  } else {
    $nume =  corectez($_POST['nume']);
  }

  if(empty($_POST['prenume'])) {
    $eroare .= '<p>Nu ați introdus prenumele!</p>';
  } else {
    $prenume =  corectez($_POST['prenume']);
  }

  $poza = $_FILES["fotografie"]["name"];       //  Numele fisierului incarcat pe server
  $nmtmp = $_FILES["fotografie"]["tmp_name"];  //  Numele dat în momentul salvarii in directorul temporar
  $extensie = strtolower(pathinfo($poza,PATHINFO_EXTENSION));  //  Extensia fisierului
  $imagine_base64 = base64_encode(file_get_contents($nmtmp));  //  Fisierul este convertit in format binar (base64)
  $fotografie = 'data:image/'.$extensie.';base64,'.$imagine_base64;  //  Valoarea campului fotografie din tabel

  if(empty($_POST['email'])) {
    $eroare .= '<p>Nu ați introdus adr. de email!</p>';
  } else {
    $email =  corectez($_POST['email']);
  }

  if(empty($_POST['twitter'])) {
    $eroare .= '<p>Nu ați introdus adr. de twitter!</p>';
  } else {
    $twitter =  corectez($_POST['twitter']);
  }

  if(empty($_POST['facebook'])) {
    $eroare .= '<p>Nu ați introdus adr. de facebook!</p>';
  } else {
    $facebook =  corectez($_POST['facebook']);
  }

  if(empty($_POST['instagram'])) {
    $eroare .= '<p>Nu ați introdus adr. de instagram!</p>';
  } else {
    $instagram =  corectez($_POST['instagram']);
  }

  if(empty($_POST['linkedin'])) {
    $eroare .= '<p>Nu ați introdus adr. de linkedin!</p>';
  } else {
    $linkedin =  corectez($_POST['linkedin']);
  }

  $cod_functie = $_POST['functia'];
  //  Verific daca preluarea datelor s-a derulat corect
  if($eroare == '') {
    //  Nu sunt mesaje de eroare
    include '../../conectare.php';
    // formulez comanda INSERT
    $comanda = "INSERT INTO angajati (nume, prenume, fotografie, email, twitter, facebook, instagram, linkedin, cod_functie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 'ssssssssi',$nume, $prenume, $fotografie, $email, $twitter, $facebook, $instagram, $linkedin, $cod_functie);
      if(!mysqli_stmt_execute($stm)) {
        echo "Eroare la exec. INSERT: " . mysqli_error($cnx);
      }
      } else {
      echo "Eroare la crearea variabilei de tip statement.";
    }
    mysqli_close($cnx);
    //  Reincarc "echipa.php"
    header('Location: ../echipa.php');
  } else {
    echo "Eroare: " . $eroare;
  }
} else {
  //  Nu este logat!
  header('Location: ../index.php');
}
?>