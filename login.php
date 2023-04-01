<?php 

include('config.php');
include('login.action.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>connexion</title>

</head>
<body>
    <h1>Connexion</h1>
    <form method="post" id="mon-formulaire">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <button type="submit">se connecter</button>
</form>
<script src="login.js"></script>


</body>
</html>