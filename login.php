
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/loginstyle.css">
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

session_start();
if (isset($_POST['login'])) {
    $username = $_POST['email-inlog'];
    $password = $_POST['password-inlogen'];

    $sql = "SELECT id, Email FROM gebruikers WHERE Email = '$username' AND Wachtwoord = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $username = $row['username'];
        $role = $row['rol'];

        // Inloggen gelukt
        $_SESSION["gebruikersnaam"] = $username;
        $_SESSION["gebruikers_id"] = $id; // Sla de gebruikers-ID op in de sessie
        $_SESSION["rol"] = $role; // Sla de rol op in de sessie
        echo "<p>Welkom, $username!</p";

        // Terug naar index.php na 3 seconden
        header("refresh:1;url=index.php");
    } else {
        echo "<p>Ongeldige inloggegevens. Probeer opnieuw.</p>";
    }
}



    ?>
</article>