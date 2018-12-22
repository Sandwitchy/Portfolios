<?php
 include('head.inc.php');
 include('bdd.inc.php');
?>

      <div id="page-wrapper">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Informations général</h3>
                </div>
                <?php
                  $sql ="SELECT * FROM bio";
                  $req = $conn ->query($sql);
                  $r = $req->fetch();
                ?>
                <div class="panel-body">
                    <form method='post' action='trait.php' enctype="multipart/form-data">
                      <div class='form-group'>
                        <label for='descri'>Description</label>
                        <input type='text' value='<?php echo $r["descri"]; ?>' id='descri' name='descri' class='form-control'>
                        <br>
                        <label for='age'>Age</label>
                        <input type='text' value='<?php echo $r["age"]; ?>' id='age' name='age' class='form-control'>
                        <br>
                        <label for="image">Image de profil</label><br>
                        <div class='vb-profilepic img-thumbnail col-md' style="background-image:url('<?php echo $r['img']; ?>');
                                                                          height:150px;width:150px;"></div>
                        <input type='file' id='image' name='imgpro'>
                        <fieldset>
                          <legend>Coordonnées</legend>
                          <label>Mail</label>
                          <input type='text' value='<?php echo $r["mail"]; ?>' name="mail" class='form-control'>
                          <label>Adresse</label>
                          <input type='text' value='<?php echo $r["adress"]; ?>' name="adress" class='form-control'>
                        </fieldset>
                        <label for='bio'>Bio</label>
                        <textarea id='bio' name='bio' class='form-control' rows="4" cols='15'><?php echo $r['bio_content']; ?></textarea>
                      </div>
                      <button name='send' class='btn btn-success' type='submit'><i class="fa fa-save"></i></button>
                    </form>
                </div>
            </div>
        </div>
      </div><!--page wrapper -->
  </div>
  <!-- /#wrapper -->


</body>
</html>
