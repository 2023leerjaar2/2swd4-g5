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
    <script src="js/like.js" defer></script>
    <title>blog post pagina</title>
</head>
<body>
<?php
require_once("conection.php");
require_once("header.php");

if(session_status() == PHP_SESSION_NONE){
    // Sessie is niet gestart, start er eenj
    session_start();
}
?>
    <main>
 <!-- dit is eige pagina van resept  -->
    <?php   
$sql = "SELECT id, title, image_path,  sort_description, description FROM blog_post WHERE id = " . $_GET["id"];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Iterate through the results
    while($row = mysqli_fetch_assoc($result)) {
        echo "<section class='bloggpagina'>";
        echo "<h1 id='Title-blog'>Title: " . $row["title"]. "</h1>";
        echo '<img class="foto-post" id="yourId" src="' . $row["image_path"] . '" alt="Image"><br>';
        echo "<p id='beschrijfing-blog'> beschrijfing: " . $row["description"]. "</p>";
        // hier onder komt reactie mogelijk heid
        echo "<form method='POST' action='submit_comment.php'>";
        echo "<input type='hidden' name='post_id' value='" . $row["id"] . "'>";
        echo "<textarea name='comment' placeholder='Voer uw reactie hier in...'></textarea>";
        echo "<input type='submit' value='Reactie plaatsen'>";
        echo "</form>";
        echo "</section>";

    }
} else {
    echo "<p  id='melding-4'> error 04 </p>";
}


// hier onder is code om de likes te tellen en op te slaan in de database
    
    
// Haal de post_id en user_id op





?>

<section class="terug-button">
<a id='backbutton' href='blog.php'>back</a>
</section>
    </main>
    <?php
    require_once("footer.php");
    ?>
</body>
</html>