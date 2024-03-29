<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>bloggpagina</title>
</head>
<body>
<?php
if(session_status() == PHP_SESSION_NONE){
    // Sessie is niet gestart, start er een
    session_start();
}
require_once("conection.php");
require_once("header.php");

// hier komt pagina om recepten te laten zien

if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1){
    ?><a id='addbutton' href="blogadd.php">post toevoegen</a><?php
}

// SQL-query om gegevens op te halen
$sql = "SELECT id, title, image_path,  sort_description FROM blog_post";
$result = mysqli_query($conn, $sql);

// Controleer of de query succesvol was
if (mysqli_num_rows($result) > 0) {
    // Door de resultaten itereren
    echo "<section id='blog_container'>";
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        if ($count % 3 == 0 && $count > 0) {
            // Sluit de vorige rij en start een nieuwe rij na elke 3 blogposts
            echo "</section><section id='blog_container'>";
        }

        echo "<a class='blog_post' href='blogpost.php?id=" . $row["id"] . "'>";
        echo "<h1 class='Title-blog'>Title: " . $row["title"]. "</h1>";
        echo '<img class="fotoblog" src="' . $row["image_path"] . '" alt="Image"><br>';
        echo "<p class='beschrijfing-blog'>kortebeschrijving: " . $row["sort_description"]. "</p>";
        echo "</a>";

        $count++;
    }
    echo "</section>";
} else {
    echo "0 results";
}
?>
<section class="terug-button">
    <a id='backbutton' href='index.php'>back</a>
</section>
<?php
require_once("footer.php")
?>
<img src="/img/test.jpg" alt="">
</body>
</html>