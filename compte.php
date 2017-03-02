<?php
session_start();

$hote = 'localhost';
$port = '3306'; // MySQL default
$db = 'banque';
$login = 'root';
$mdp = '';
try{
    $pdo = new PDO('mysql:host='.$hote.';port='.$port. ';dbname='.$db,
    $login, $mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage() . '<br/>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mes comptes</title>

</head>
<body>
  <a href="moncompte.php"><input type="button" name="retour "value="Retourner au menu"/></a>
  <a href="pageprinc.php"><input type="button" name="deconnexion "value="Se déconnecter"/></a>

  <p>Votre compte courant contient : <?php echo $_SESSION['Courant']; ?> €</p>
  <p>Votre livret contient : <?php echo $_SESSION['Livret']; ?> €</p>
</body>
</html>
