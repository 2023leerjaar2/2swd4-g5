<?php 

// @todo: uit zoeken hoe blogpagina moet maken
// @todo testen van pagina 
// @todo stylen van pagina
// @todo kopleings op pagina testen


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <a href="index.php">home</a>
    <?php
        // hier komt de blog pagina

        session_start();
        // controle of er ingelogd is
        if (isset($_SESSION["gebruikers_id"])) {
            echo "Welkom " . $_SESSION["voornaam"]; // dit staat er nu ff voor testen 
            // ik heb tot nu toe alles zo gemaakt dat het heel dom er uit ziet 
            
            ?> 
            <section class="wrapper-blog">
                <article class="title-blog">
                <h1>blog</h1>
                </article>
            </section><?php
            require_once( "conection.php");

?>            <!-- Het berichtformulier -->
<form method="POST">
    <input type="text" name="title" placeholder="Title">
    <textarea name="message"></textarea>
    <button type="submit">Post</button>
</form> <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de berichtinhoud en titel op uit het formulier
    $title = $_POST["title"];
    $message = $_POST["message"];
    $user_id = $_SESSION["gebruikers_id"]; // Haal de user_id op uit de sessie

    // Sla het bericht op in de database
    $sql = "INSERT INTO blog_posts (user_id, title, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $title, $message);
    $stmt->execute();
}

// Haal alle berichten op uit de database samen met de voornaam en achternaam van de gebruiker
$sql = "SELECT blog_posts.*, gebruikers.voornaam, gebruikers.achternaam FROM blog_posts JOIN gebruikers ON blog_posts.user_id = gebruikers.ID";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!-- Toon alle berichten -->
<?php while ($row = $result->fetch_assoc()): ?>
<div>
    <h2><?php echo $row["title"]; ?></h2>
    <p><?php echo $row["content"]; ?></p>
    <p>Posted by: <?php echo $row["voornaam"] . " " . $row["achternaam"]; ?></p>
</div>
<?php endwhile; ?>

<?php
        // hier word mesnen door gestuurd als ze niet ingelogd zijn
         } else {
             header("Location: login.php");
         } ?>
</body>
</html>