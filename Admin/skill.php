<?php
 include('head.inc.php');
 include('bdd.inc.php');
?>

      <div id="page-wrapper">
          <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Skill</h3>
                </div>
                <div class="panel-body">
                  <?php
                    $sql = "SELECT * FROM skill WHERE valide_sk = 0";
                    $req = $conn -> query($sql);
                  ?>
                  <?php while($r = $req ->fetch()){ ?>
                  <div class='row'>
                    <form method='post' action='trait.php'>
                      <div class='col-md-9' style='padding:5px;'>
                        <div class='row'>
                          <div class='col-sm-6'>
                            <input type='text' value="<?php echo $r['lib_sk']?>" name='lib' class='form-control'>
                          </div>
                          <div class='col-sm-3'>
                            <input type='text' value="<?php echo $r['niv_sk']?>" name='niv' class='form-control'>
                          </div>
                        </div>
                        <input type='hidden' value="<?php echo $r['id_sk']?>" name='id'>
                      </div>
                      <div class='btn-group col-md-2' style='padding:5px;'>
                        <button name='delete_sk' type="submit" class='btn btn-danger'><i class="fa fa-eraser"></i></button>
                        <button name='modified_sk' type='submit' class='btn btn-primary'><i class="fa fa-edit"></i></button>
                      </div>
                    </form>
                  </div>
                <?php } ?>
              </div>
              <div class='panel-footer'>
                 <form method='post' action='trait.php'>
                   <b>Nouvelle Competence :</b>
                    <div class='row'>
                       <div class='col-md-9'>
                         <div class='row'>
                         <div class='col-sm-6'>
                           <input type='text' name='lib' class='form-control' placeholder='Libellé'>
                         </div>
                         <div class='col-sm-3'>
                           <input type='text' name='niv' class='form-control' placeholder='Niveau'>
                         </div>
                       </div>
                     </div>
                     <div class='col-md-2'>
                       <button type='submit' name='create_sk' class='btn btn-success'><i class="fa fa-plus"></i></button>
                     </div>
                   </div>
                 </form>
               </div>
            </div>
        </div>
      </div><!--page wrapper -->
  </div>
  <!-- /#wrapper -->


</body>
</html>
