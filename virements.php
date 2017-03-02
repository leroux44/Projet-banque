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
/*
if(!empty($_POST['transaction1'])){
    $debitSomme = (int) $_POST['transaction1'];
    (int) $_SESSION['Courant'] -= $debitSomme;
    (int) $_SESSION['Livret'] += $debitSomme;
    $transactionLess = $pdo->exec("UPDATE users SET Courant = (int)$_SESSION['Courant'] WHERE login = $_SESSION['login'];");
    $transactionMore = $pdo->exec("UPDATE users SET Livret = (int)$_SESSION['Livret'] WHERE login = $_SESSION['login'];");
    echo "Votre transaction a été effectuer et sera visible à votre prochaine connexion";
}

if(!empty($_POST['transaction2'])){
    $debitSomme = (int) $_POST['transaction2'];
    (int) $_SESSION['Courant'] += $debitSomme;
    (int) $_SESSION['Livret'] -= $debitSomme;
    $transactionMore = $pdo->exec("UPDATE users SET Courant = $_SESSION['Courant'] WHERE login = $_SESSION['login'];");
    $transactionLess = $pdo->exec("UPDATE users SET Livret = $_SESSION['Livret'] WHERE login = $_SESSION['login'];");
    echo "Votre transaction a été effectuer et sera visible à votre prochaine connexion";
}*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mes virements</title>

</head>
<body>
  <a href="moncompte.php"><input type="button" name="retour "value="Retourner au menu"/></a>
  <a href="pageprinc.php"><input type="button" name="deconnexion "value="Se déconnecter"/></a>

  <form action="" method="post">
      <label>
          <h3>Virements :</h3>
          <p>Compte courant => Livret : <input type="text" name="transaction1" id="transaction1"> &nbsp<button type="submit" name="CL">Valider</button></p>
          <p>Livret => Compte courant : <input type="text" name="transaction2" id="transaction2"> &nbsp<button type="submit" name="LC">Valider</button></p>
      </label>
  </form>

</body>
</html>
