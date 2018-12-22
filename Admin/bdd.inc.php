<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr
        <video width='240' height='auto' autoplay loop >
          <source src='erreur_php.mp4' type='video/mp4'>
        </video>"
        ;
}

//set error handler
set_error_handler("customError");
$serveur = "mysql:host=localhost;dbname=portfolio";//initialisation des variables de connexion
$base = "portfolio";
$user = "root";
$pass = "";
try {
    $conn = new PDO($serveur, $user, $pass);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
