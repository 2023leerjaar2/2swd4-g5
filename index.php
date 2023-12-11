<?php
require_once( "conection.php");

// ik heb alle meta text toe gevoegt dat ik weet wat nodig is
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>home pagina</title>
</head>
<body>
    <h1>test</h1>
    <a href="login.php">login</a>
    <?php 
    session_start();

    if (isset($_SESSION["gebruikers_id"])) {
        echo "Welkom " . $_SESSION["voornaam"];
        // ik heb tot nu toe alles zo gemaakt dat het heel dom er uit ziet 
        ?> <a href="blog.php">blog</a>
        <a href="persoonlijk.php">persoonlijk</a>
        
        <?php
    } else {
        echo "Niet ingelogd";
    }
    
    ?>
</body>
<link rel="stylesheet" href="/css/style.css">
<script src="/js/main.js" defer></script>
</html>