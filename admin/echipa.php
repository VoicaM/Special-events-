<?php 
include 'sesiune.php';
$echipa_active = ' class="menu-active"';
include 'header.php';
?>
    <main id="main">
      <div class="container">
        <h2 class="text-center" style="padding-top: 120px; color:#2DC997">Tabelul <em>angajați</em></h2>
      </div>
      <div class="container" style="width: 700px;">
        <table class="table mt-5" style="border-bottom: 2px solid #DEE2E6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Angajat</th>
              <th scope="col">E-mail</th>
              <th scope="col" class="text-center">Operații</th>
            </tr>
          </thead>
          <tbody>
<?php
  $interogare = "SELECT * FROM angajati ORDER BY nume";
  $linii = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  //  $i este un contor care va fi incrementat în ciclul while
  while($rez = mysqli_fetch_assoc($linii)):
    $numepren = $rez['nume'] . " " . $rez['prenume'];
?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td class="w-40"><?= $numepren ?></td>
              <td class="w-40"><?= $rez['email'] ?></td>
              <td class="w-20 text-center">
                <a href="editAng.php?editez=<?= $rez['cod_angajat'] ?>">
                  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>  
                <a href="formulare/stergAng.php?sterg=<?= $rez['cod_angajat'] ?>">
                  <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
              </td>
            </tr>
<?php 
  $i++;
  endwhile; 
?>
          </tbody>
        </table> 
      </div>
      <div class="container mt-5" style="width: 700px;">
        <form method="post" action="formulare/adaugAng.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="nume" id="nume" placeholder="Numele">
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="prenume" id="prenume" placeholder="Prenumele">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label class="custom-file-label" for="fotografie">Fotografia</label>
              <input type="file" class="custom-file-input" name="fotografie" id="fotografie">
            </div>
            <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter">
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram">
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Linkedin">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-2 form-group">
              <label for="functia">Funcția:</label>
            </div>
            <div class="col-md-4 form-group">
              <select class="form-control" name="functia" id="functia" placeholder="Functia">
                <option value="0">Selectați funcția:</option>
<?php
  $interogare = "SELECT * FROM functii ORDER BY functie";
  $selfunctii = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
  while($rez = mysqli_fetch_assoc($selfunctii)): ?>

                <option value="<?= $rez['cod_functie'] ?>"><?= $rez['functie'] ?></option>

<?php endwhile; ?>

 

              </select>
            </div>
          </div> 
          <button type="submit" class="btn btn-secondary mb-2 col-xs-3" style="background: #2DC997">Adaugă!</button>
        </form>
      </div>
    </main>
  </body>
</html>