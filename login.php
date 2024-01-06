<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen , inlogen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginpagina</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
</body>
</html>

<?php
require_once("conection.php");
// hier kan je inloggen
?>

    
<article>
    <section>
        <h2>Login</h2>
        <form action="" method="POST">
            <section>
                <label for="email">email</label>
                <input type="email" name="email-inlog" id="email" required>
            </section>

            <section>
                <label for="password">Password:</label>
                <input type="password" name="password-inlogen" id="password" required>
            </section>

            <section>
                <button type="submit" name="login">Login</button>
            </section>
        </form>
    </section>


    <?php

if(session_status() == PHP_SESSION_NONE){
    // Sessie is niet gestart, start er eenj
    session_start();
}
if (isset($_POST['login'])) {
    $username = $_POST['email-inlog'];
    $password = $_POST['password-inlogen'];

    $sql = "SELECT ID , Email , Rol , Voornaam  FROM gebruikers WHERE Email = '$username' AND Wachtwoord = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['ID'];
        $voornaam = $row['Voornaam'];
        $role = $row['Rol'];

        // Inloggen gelukt
        $_SESSION["gebruikers_id"] = $id; // Sla de gebruikers-ID op in de sessie
        $_SESSION["rol"] = $role; // Sla de rol op in de sessie
        $_SESSION["voornaam"] = $voornaam; // Sla de voornaam op in de sessie om daara hoi te zeggen 
        echo "<p>Welkom, $voornaam!</p";

        // Terug naar index.php na 3 seconden
        header("refresh:1;url=index.php");
    } else {
        echo "<p>Ongeldige inloggegevens. Probeer opnieuw.</p>";
    }
}

?> 
</article> 
<section class="logout button">
<a href="logout.php">logout</a>
</section>



    <section class="terug-button">
<a href='index.php'>home</a>
</section>
</article>