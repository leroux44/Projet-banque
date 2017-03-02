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

if(!empty($_POST)) {
    $res = $pdo->query("SELECT login, password, Courant, Livret FROM users;");
    while($row = $res->fetch()){
        if ($_POST['login'] == $row['login']) {
            if ($_POST['password'] == $row['password']) {
                $_SESSION['Courant'] = $row['Courant'];
                $_SESSION['Livret'] = $row['Livret'];
                header('Location:moncompte.php');
            }
        }
    }
    echo "Mauvais numéro de compte ou mot de passe";
    $res->closeCursor();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>

</head>
<body>

<a href="pageprinc.php">Retournez à l'accueil</a>
<form action="" method="post">
    <label>
        <input type="text" name="login" placeholder="Entrez votre numéro de compte">
        <input type="password" name="password" placeholder="Entrez votre password">
        <input type="submit" name="Connexion "value="Connexion"/>
    </label>
</form>
</body>
</html>
