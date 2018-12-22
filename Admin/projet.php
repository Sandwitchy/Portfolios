<?php
 include('head.inc.php');
 include('bdd.inc.php');
?>

      <div id="page-wrapper">
          <div class="col-md-8">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Projet</h3>
                  </div>
                  <div class="panel-body">
                    <fieldset>
                      <legend>Choisir un projet</legend>
                      <?php ?>
                      <form method='post' action='#'>
                        <div class='row'>
                          <div class='col-md-4'>
                            <select name='projet' class='form-control'>
                              <option>Choisir un projet</option>
                              <?php
                                $sql = "SELECT * FROM projet WHERE valide_pro = 0";
                                $req = $conn -> query($sql);
                                while ($r = $req -> fetch())
                                {
                                  ?><option value='<?php echo $r['id_pro']; ?>'><?php echo $r['lib_pro'];?></option><?php
                                }
                              ?>
                            </select>
                          </div><div class='col-md-3'>
                          <button name='search' type='submit' class='btn btn-primary'><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </fieldset>
                    <fieldset>
                    <?php if (isset($_POST['search'])): ?>
                      <legend>Modifier un projet</legend>
                      <form method='post' action='trait.php' enctype="multipart/form-data">
                        <?php
                          $id = $_POST['projet'];
                          $sql = "SELECT * FROM projet WHERE id_pro = '$id'";
                          $req = $conn -> query($sql);
                          $r = $req -> fetch();
                        ?>
                        <label>Libellé</label>
                        <input type='text' name='lib' value="<?php echo $r['lib_pro']; ?>" class='form-control'><br>
                        <div class='vb-profilepic img-thumbnail col-md' style="background-image:url('<?php echo '../'.$r['img_pro']; ?>');
                                                                        height:150px;width:150px;"></div>
                        <input type='file' id='image' name='imgpro'>
                        <label>Description</label>
                        <textarea name='desc' class='form-control'><?php echo $r['desc_pro']; ?></textarea><br>
                        <div class='btn-group'>
                          <input type='hidden' name='id' value='<?php echo $r['id_pro'];?>'>
                          <button class='btn btn-success' type='submit' style='width:50px;' name='modified_pro'><i class="fa fa-save"></i></button>
                          <button class='btn btn-danger' type='submit' style='width:50px;' name='delete_pro'><i class="fa fa-trash"></i></button>
                        </div>
                      </form>
                    <?php else: ?>
                      <legend>Créer un projet</legend>
                      <form method='post' action='trait.php' enctype="multipart/form-data">
                        <label>Libellé</label>
                        <input type='text' name='lib' class='form-control'>
                        <label>Image</label>
                        <input type='file' id='image' name='imgpro'>
                        <label>Description</label>
                        <textarea name='desc' class='form-control'></textarea><br>
                        <button name='create_pro' class='btn btn-success' type='submit'><i class="fa fa-plus-square"></i></button>
                      </form>
                    <?php endif; ?>
                    </fieldset>
                  </div>
              </div>
          </div><!-- gestion proejt -->
      </div><!--page wrapper -->
  </div>
  <!-- /#wrapper -->


</body>
</html>
