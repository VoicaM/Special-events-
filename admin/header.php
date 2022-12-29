<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>
	<!-- ======= Header ======= -->
  <header id="header" class="header-fixed">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="../assets/img/logo.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>
        
        <nav class="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
         
            <li<?= $home_active ?>><a href="index.php">Home</a></li>
            <li<?= $evenimente_active ?>><a href="evenimente.php">Evenimente</a></li>
            <li<?= $echipa_active ?>><a href="echipa.php">Echipa</a></li>
            <li<?= $functii_active ?>><a href="functii.php">Funcții</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
       <span class="pull-right"> 
                <?= $nume ?>
            </span>
      
  </header><!-- End Header -->
