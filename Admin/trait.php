<?php
  include('bdd.inc.php');

  if (isset($_POST['send']))
  {
    $desc = $_POST['descri'];
    $age = $_POST['age'];
    $mail = $_POST['mail'];
    $adress = $_POST['adress'];
    $bio = $conn -> quote($_POST['bio']);
    $n = $_FILES['imgpro']['name'];
    $t = $_FILES['imgpro']['type'];
    $s = $_FILES['imgpro']['size'];
    $temp = $_FILES['imgpro']['tmp_name'];
    $e = $_FILES['imgpro']['error'];

    $sql = "SELECT img FROM bio";
    $req = $conn -> query($sql);
    $r = $req -> fetch();
    unlink($r['img']);

    $ext = ".".pathinfo($n, PATHINFO_EXTENSION);
    $pathnewphoto1 = "../assets/img/photoprof".$ext;

    move_uploaded_file($temp,$pathnewphoto1);

    $sql = "UPDATE bio
            SET age = '$age',
                descri = '$desc',
                img = '$pathnewphoto1',
                mail = '$mail',
                adress = '$adress',
                bio_content = $bio";
    $req = $conn -> query($sql)or die($sql);
    header('location:index.php');
  }
  if (isset($_POST['create']))
  {
    $lib = $conn->quote($_POST['lib']);
    $deb = $_POST['deb'];
    $fin = $_POST['fin'];
    $desc = $conn->quote($_POST['desc']);

    $sql = "INSERT INTO diplome VALUES(NULL,$lib,'$deb','$fin',$desc,0)";
    $req = $conn -> query($sql)or die($sql);
    header('location:diplome.php');
  }
  if (isset($_POST['modified']))
  {
    $id = $_POST['id'];
    $lib = $conn->quote($_POST['lib']);
    $deb = $_POST['deb'];
    $fin = $_POST['fin'];
    $desc = $conn->quote($_POST['desc']);

    $sql = "UPDATE diplome SET lib_dipl = $lib,
                               datedeb = '$deb',
                               datefin = '$fin',
                               desc_dipl = $desc
                            WHERE id_dipl = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:diplome.php');
  }
  if (isset($_POST['delete']))
  {
    $id = $_POST['id'];

    $sql = "UPDATE diplome SET valide_dipl = 1
                            WHERE id_dipl = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:diplome.php');
  }
  if (isset($_POST['create_exp']))
  {
    $lib = $conn->quote($_POST['lib']);
    $deb = $_POST['deb'];
    $fin = $_POST['fin'];
    $desc = $conn->quote($_POST['desc']);

    $sql = "INSERT INTO experience VALUES(NULL,$lib,'$deb','$fin',$desc,0)";
    $req = $conn -> query($sql)or die($sql);
    header('location:experience.php');
  }
  if (isset($_POST['modified_exp']))
  {
    $id = $_POST['id'];
    $lib = $conn->quote($_POST['lib']);
    $deb = $_POST['deb'];
    $fin = $_POST['fin'];
    $desc = $conn->quote($_POST['desc']);

    $sql = "UPDATE experience SET lib_exp = $lib,
                                  datedeb = '$deb',
                                  datefin = '$fin',
                                  desc_exp = $desc
                            WHERE id_exp = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:experience.php');
  }
  if (isset($_POST['delete_exp']))
  {
    $id = $_POST['id'];

    $sql = "UPDATE experience SET valide_exp = 1
                            WHERE id_exp = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:experience.php');
  }
  if (isset($_POST['create_sk']))
  {
    $lib = $conn->quote($_POST['lib']);
    $niv = $_POST['niv'];


    $sql = "INSERT INTO skill VALUES(NULL,$lib,'$niv',0)";
    $req = $conn -> query($sql)or die($sql);
    header('location:skill.php');
  }
  if (isset($_POST['modified_sk']))
  {
    $id = $_POST['id'];
    $lib = $conn->quote($_POST['lib']);
    $niv = $_POST['niv'];

    $sql = "UPDATE skill SET lib_sk = $lib,
                             niv_sk = '$niv'
                            WHERE id_sk = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:skill.php');
  }
  if (isset($_POST['delete_sk']))
  {
    $id = $_POST['id'];

    $sql = "UPDATE skill SET valide_sk = 1
                            WHERE id_sk = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:skill.php');
  }

  if (isset($_POST['create_pro']))
  {
    $lib = $conn->quote($_POST['lib']);
    $desc = $conn->quote($_POST['desc']);
    $n = $_FILES['imgpro']['name'];
    $t = $_FILES['imgpro']['type'];
    $s = $_FILES['imgpro']['size'];
    $temp = $_FILES['imgpro']['tmp_name'];
    $e = $_FILES['imgpro']['error'];

    $ext = ".".pathinfo($n, PATHINFO_EXTENSION);
    $pathnewphoto1 = "../assets/img/projet".rand(0,1024).$ext;

    move_uploaded_file($temp,$pathnewphoto1);

    $sql = "INSERT INTO projet VALUES(NULL,$lib,'$pathnewphoto1',$desc,0)";
    $req = $conn -> query($sql)or die($sql);
    header('location:projet.php');
  }
  if (isset($_POST['modified_pro']))
  {
    $id = $_POST['id'];
    $lib = $conn->quote($_POST['lib']);
    $desc = $conn->quote($_POST['desc']);
    $n = $_FILES['imgpro']['name'];
    $t = $_FILES['imgpro']['type'];
    $s = $_FILES['imgpro']['size'];
    $temp = $_FILES['imgpro']['tmp_name'];
    $e = $_FILES['imgpro']['error'];

    $sql = "SELECT img_pro FROM projet WHERE id_pro = '$id'";
    $req = $conn -> query($sql);
    $r = $req -> fetch();
    unlink($r['img_pro']);

    $ext = ".".pathinfo($n, PATHINFO_EXTENSION);
    $pathnewphoto1 = "../assets/img/projet".$id.$ext;

    move_uploaded_file($temp,$pathnewphoto1);

    $sql = "UPDATE projet SET lib_pro = $lib,
                              desc_pro = $desc,
                              img_pro = '$pathnewphoto1'
                            WHERE id_pro = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:projet.php');
  }
  if (isset($_POST['delete_pro']))
  {
    $id = $_POST['id'];

    $sql = "SELECT img_pro FROM projet WHERE id_pro = '$id'";
    $req = $conn -> query($sql);
    $r = $req -> fetch();
    unlink($r['img_pro']);

    $sql = "UPDATE projet SET valide_pro = 1
                            WHERE id_pro = $id";
    $req = $conn -> query($sql)or die($sql);
    header('location:projet.php');
  }
 ?>
