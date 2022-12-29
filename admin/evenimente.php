
<?php 
include 'sesiune.php';
$evenimente_active = ' class="menu-active"';
include 'header.php';
?>
<main id="main">
  <div class="container">
    <h2 class="text-center" style="padding-top: 120px; color: #2DC997">Tabelul <em>evenimente</em></h2>
  </div>
  <?php

  $interogare = "SELECT * FROM categorii ORDER BY filtru";
          //  Execut comanda SQL
  $trimit = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
  $i = 1; 
  while($rez = mysqli_fetch_assoc($trimit)):

   ?>

   <div class="container mt-5" style="width: 700px;">

    <form action="adaugareeveniment.php" method="post" enctype="multipart/form-data" role="form" class="php-email-form"> 
      <div class="form-row">
       <div class="col-md-6 form-group">
        <select class="custom-select" name="cod_categ" id="categoria">
          <option value="0">Selectați categoria:</option>
          <?php
          $interogare = "SELECT * FROM categorii ORDER BY filtru";
          $trimit = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
          while($rez = mysqli_fetch_assoc($trimit)): ?>

            <option value="<?= $rez['cod_categ'] ?>"><?= $rez['categoria'] ?></option>

          <?php endwhile; ?>

        </select>
      </div>

      <div class="col-md-6 form-group">
       <input type="text" class="form-control" name="denumire" id="denumire" placeholder="Numele evenimentului">
     </div>
   </div>

   <div class="form-row">
    <div class="col-md-6 form-group">
      <input type="file" class="custom-file-input" name="poza" id="poza">
      <label class="custom-file-label" for="poza">Selectează poza</label>
    </div>

    <div class="col-md-6 form-group">
      <input type="file" class="custom-file-input" name="poza1" id="poza1">
      <label class="custom-file-label" for="poza1">Prima poza mare</label>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 form-group">
      <input type="file" class="custom-file-input" name="poza2" id="poza2">
      <label class="custom-file-label" for="poza2">A doua poza mare</label>
    </div>

    <div class="col-md-6 form-group">
      <input type="file"  name="poza3" id="poza3">
      <label class="custom-file-label" for="poza3">A treia poza mare</label>
    </div>
  </div>


  <div class="form-row">
    <div class="col-md-6 form-group">
      <input type="text" class="form-control" name="titlul" id="titlul" placeholder="Titlul evenimentului">
    </div>

    <div class="col-md-6 form-group">
      <input type="text" class="form-control" name="clientul" id="clientul" placeholder="Clientul">
    </div>
  </div>

  <div class="form-group">
    <textarea class="form-control" name="descrierea" rows="5"  placeholder="Descrierea evenimentului"></textarea>
  </div>

  <div class="form-row">
    <div class="col-md-6 form-group">
      <input type="date" class="form-control" name="data" id="data" placeholder="Data realizării evenimentului" />
    </div>

  <div class="text-center"><button type="submit" style="background: #2DC997">Adaugă evenimentul!</button></div>
</form>
</div>
<?php 
$i++;
endwhile; 
?>

</div>
</main>
</body>
</html>