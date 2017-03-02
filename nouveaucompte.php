<?php
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
    $i = 1;
    $id = 0;
    while ($i != 100000000){
        $nbr = rand (0,9);
    if ($i == 100000000){
    while($nbr == 0){
        $nbr = rand (0,9);
        }
    }
    $id += $nbr * $i;
    $i = $i * 10;
}

if(!empty($_POST)) {
    $stmt = $pdo->prepare("INSERT INTO users(login, password) VALUES (:login, :password);");
    $stmt->bindParam(':login', $id);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
    header('Location:moncompte.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Nouveau Compte</title>
</head>
<body>

<a href="pageprinc.php">Retournez à l'accueil</a>
<form action="" method="post">
    <label>
        <th>Votre numéro de compte est: <?php echo $id ?></th>

        <br>
        <input type="password" name="password" placeholder="Choisissez votre password">
        <br>
        <input type="submit" name="Connexion "value="Valider votre compte"/>
    </label>
</form>
</body>
</html>
