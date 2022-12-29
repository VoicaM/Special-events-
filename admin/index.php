<?php  
include 'sesiune.php'; 
$home_active =' class="menu-active"';
include 'header.php'; 
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>ADMIN - SPECIAL EVENTS</h1>
      <h2>Aplicație web destinată bazei de date a site-ului</h2>
      <div class="<?= $display_btcon ?>">
                  <a href="logare.php" class="btn-get-started">Conectare</a>
                </div>
                <div  class="<?= $display_btdecon ?>">
                  <a href="delogare.php" class="btn-get-started">Deconectare</a>
                </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  </main><!-- End #main -->

  
</body>
</html>