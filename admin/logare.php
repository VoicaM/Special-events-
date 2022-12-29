<?php  
include 'sesiune.php'; 
$home_active =' class="active"';
include 'header.php'; 
?>

  <main id="main">
    <div class="container" style="padding-top: 150px; color: #2DC997">
      <div class="section-title col-12">
        <h2>Conectare la baza de date</h2>
      </div>

      <div class="form d-block mx-auto" style="width: 500px;">
        <form action="formulare/logare.php" method="post">
          <div class="form-row">
            <div class="col-sm-6 form-group">
              <input type="text" name="nume" class="form-control" id="nume" placeholder="Numele">
            </div>
            <div class="col-sm-6 form-group">
              <input type="password" class="form-control" name="parola" id="parola" placeholder="Parola">
            </div>
          </div>
                                   
          <div class="text-center"><button type="submit" style="background: #2DC997">Login</button></div>
        </form>
      </div>
    </div>
  </main><!-- End #main -->
</body>
</html>