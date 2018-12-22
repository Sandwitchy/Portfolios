<?php
 include('head.inc.php');
 include('bdd.inc.php');
?>

      <div id="page-wrapper">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Diplome</h3>
                </div>
                <div class="panel-body">
                  <fieldset>
                    <legend>Chercher un diplome</legend>
                    <div class='row'>
                      <div class='col-md-4'>
                        <form method='post' action='#'>
                          <select name='dipl' class='form-control'>
                            <option>Choisir un diplome</option>
                            <?php
                              $sql = 'SELECT * FROM diplome WHERE valide_dipl = 0';
                              $req = $conn->query($sql);
                              while ($r = $req -> fetch())
                              {
                                ?><option value='<?php echo $r["id_dipl"]; ?>'><?php echo $r['lib_dipl']; ?></option><?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class='col-md-4'>
                          <button name='search' type='submit' class='btn btn-primary'><i class="fa fa-search"></i></button>
                        </div>
                      </form>
                    </div>
                  </fieldset>
                  <?php if (isset($_POST['search'])): ?>
                    <fieldset>
                      <legend>Modifier un diplome</legend>
                      <form method='post' action='trait.php'>
                        <?php
                          $id = $_POST['dipl'];
                          $sql = "SELECT * FROM diplome WHERE id_dipl = '$id'";
                          $req = $conn -> query($sql);
                          $r = $req -> fetch();
                        ?>
                        <label>Libellé</label>
                        <input type='text' name='lib' value='<?php echo $r['lib_dipl']; ?>' class='form-control'>
                        <div class='row'>
                          <div class='col-md-4'>
                            <label>Date de début</label>
                            <input type='text' name='deb' value='<?php echo $r['datedeb']; ?>' class='form-control'>
                          </div>
                          <div class='col-md-4'>
                            <label>Date de fin</label>
                            <input type='text' name='fin' value='<?php echo $r['datefin']; ?>' class='form-control'>
                          </div>
                        </div>
                        <label>Description</label>
                        <textarea name='desc' class='form-control'><?php echo $r['desc_dipl']; ?></textarea><br>
                        <div class='btn-group'>
                          <input type='hidden' name='id' value='<?php echo $r['id_dipl'];?>'>
                          <button class='btn btn-success' type='submit' style='width:50px;' name='modified'><i class="fa fa-save"></i></button>
                          <button class='btn btn-danger' type='submit' style='width:50px;' name='delete'><i class="fa fa-trash"></i></button>
                        </div>
                      </form>
                    </fieldset>
                  <?php else: ?>
                    <fieldset>
                      <legend>Créer un diplome</legend>
                      <form method='post' action='trait.php'>
                        <label>Libellé</label>
                        <input type='text' name='lib' class='form-control'>
                        <div class='row'>
                          <div class='col-md-4'>
                            <label>Date de début</label>
                            <input type='text' name='deb' class='form-control'>
                          </div>
                          <div class='col-md-4'>
                            <label>Date de fin</label>
                            <input type='text' name='fin' class='form-control'>
                          </div>
                        </div>
                        <label>Description</label>
                        <textarea name='desc' class='form-control'></textarea><br>
                        <button class='btn btn-success' type='submit' name='create'><i class="fa fa-plus-square"></i></button>
                      </form>
                    </fieldset>
                  <?php endif; ?>
                </div>
            </div>
        </div>
      </div><!--page wrapper -->
  </div>
  <!-- /#wrapper -->


</body>
</html>
