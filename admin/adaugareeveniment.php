<?php

   session_start();
   if (isset($_SESSION['logat']))
   {

	include '../conectare.php';
	$interogare = "SELECT cod_categ, categoria  FROM categorii";
		//  Execut comanda SQL
		$trimit = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));

		
	function corectez($sir) {
	  $sir = trim($sir);
	  $sir = stripslashes($sir);
	  $sir = htmlspecialchars($sir);
	  return $sir;
	}

	// preiau valorile din campurile formularului 
	// și verific daca acele campuri au fost completate
	$eroare = '';

	if(empty($_POST['cod_categ'])) {
	  $eroare .= '<p>Nu ați ales categoria în care se încadrează proiectul!</p>'.PHP_EOL;;
	} else {
	  $cod = corectez($_POST['cod_categ']);
	}
	
	if(empty($_POST['denumire'])) {
	  $eroare .= '<p>Nu ați introdus numele evenimentului!</p>'.PHP_EOL;;
	} else {
	  $denumire = corectez($_POST['denumire']);
	}

	if(strlen($_FILES["poza"]["name"]) == 0)  {
	  $eroare .= '<p>Nu ați ales imaginea principală!</p>'.PHP_EOL;
	} else {
	  $poza = $_FILES["poza"]["name"];
	  $nmtmp = $_FILES["poza"]["tmp_name"];
	  $extensie = pathinfo($poza,PATHINFO_EXTENSION); 
	}

	if(strlen($_FILES["poza1"]["name"]) == 0)  {
	  $eroare .= '<p>Nu ați ales prima poza mare!</p>'.PHP_EOL;
	} else {
	  $poza1 = $_FILES["poza1"]["name"];
	  $nmtmp1 = $_FILES["poza1"]["tmp_name"];
	  $extensie1 = pathinfo($poza1,PATHINFO_EXTENSION); 
	}
	
	if(strlen($_FILES["poza2"]["name"]) == 0)  {
	  $eroare .= '<p>Nu ați ales a doua poza mare!</p>'.PHP_EOL;
	} else {
	  $poza2 = $_FILES["poza2"]["name"];
	  $nmtmp2 = $_FILES["poza2"]["tmp_name"];
	  $extensie2 = pathinfo($poza2,PATHINFO_EXTENSION); 
	}

	if(strlen($_FILES["poza3"]["name"]) == 0)  {
	  $eroare .= '
Nu ați ales a treia imagine mare!</p>'.PHP_EOL;
	} else {
	  $poza3 = $_FILES["poza3"]["name"];
	  $nmtmp3 = $_FILES["poza3"]["tmp_name"];
	  $extensie3 = pathinfo($poza3,PATHINFO_EXTENSION); 
	}

	if(empty($_POST['titlul'])) {
	  $eroare .= '<p>Nu ați introdus titlul evenimentului!</p>'.PHP_EOL;;
	} else {
	  $titlul = corectez($_POST['titlul']);
	}

	if(empty($_POST['clientul'])) {
	  $eroare .= '<p>Nu ați introdus clientul proiectului!</p>'.PHP_EOL;;
	} else {
	  $clientul = corectez($_POST['clientul']);
	}
		
	if(empty($_POST['descrierea'])) {
	  $eroare .= '<p>Nu ați adăugat o descriere!</p>'.PHP_EOL;
	} else {
	  $descrierea = corectez($_POST['descrierea']);
	}
	
	if(empty($_POST['data'])) {
	  $eroare .= '<p>Nu ați introdus data realizării!

'.PHP_EOL;
	} else {
	  $data = corectez($_POST['data']);
	}

	//  Verific daca preluarea datelor s-a derulat corect
	if($eroare == '') {
	  //  Nu sunt mesaje de eroare
	  include '../conectare.php';
	  
	  // numele initial pt toate pozele
	  $pinit = 'temp.png';
	  // formulez comanda INSERT
	  $comanda = "INSERT INTO evenimente (cod_categ, denumire, poza, poza_mare_1, poza_mare_2, poza_mare_3, titlul, descrierea, clientul, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	  $stm = mysqli_prepare($cnx, $comanda);
	  mysqli_stmt_bind_param($stm, 'ssssssssss', $cod, $denumire, $pinit, $pinit, $pinit, $pinit, $titlul, $descrierea, $clientul, $data);
	  mysqli_stmt_execute($stm);
	  
	  //  Preiau valoarea cheii primare
	  $nr = mysqli_insert_id($cnx);
	  //redenumesc fisierele si le copiez in directorul assets/img

	  $fotomica = (string)"poza".$nr.".".strtolower($extensie);
	  $cale = "../assets/img/portfolio/$fotomica";
	  $rezultat = move_uploaded_file($nmtmp, $cale);   

	  $fotomare1 = (string)"poza".$nr."_M"."1".".".strtolower($extensie1);
	  $cale1 = "../assets/img/portfolio/$fotomare1";
	  $rezultat1 = move_uploaded_file($nmtmp1, $cale1);   
	  
	  $fotomare2 = (string)"poza".$nr."_M"."2".".".strtolower($extensie2);
	  $cale2 = "../assets/img/portfolio/$fotomare2";
	  $rezultat2 = move_uploaded_file($nmtmp2, $cale2);  
	  
	  $fotomare3 = (string)"poza".$nr."_M"."3".".".strtolower($extensie3);
	  $cale3 = "../assets/img/portfolio/$fotomare3";
	  $rezultat3 = move_uploaded_file($nmtmp3, $cale3);  
		
	  // schimb denumirea fisierului in articolul scris
	  $cdamodif = "UPDATE evenimente set poza='$fotomica', poza_mare_1 = '$fotomare1', poza_mare_2 = '$fotomare2', poza_mare_3 = '$fotomare3' where cod_eveniment=$nr";
	  mysqli_query($cnx, $cdamodif) or die("Nu merge update in tabel");
	  
	  
	  mysqli_close($cnx);
	  //  Reincarc "pagina de administrare"
	  header('Location: evenimente.php');
	} 

	else {
	  echo "Eroare: " . $eroare;
	}
		 }
   else {
	header('Location: index.php');  
   }
?>