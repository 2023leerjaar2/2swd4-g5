<html lang="nl">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    require_once("conection.php");
    if(session_status() == PHP_SESSION_NONE){
        // Sessie is niet gestart, start er eenj
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verwijder de gebruikers-ID uit de sessie
        unset($_SESSION["gebruikers_id"]);
        unset($_SESSION["voornaam"]);   
        // Stuur de gebruiker terug naar de homepage
        ?> <p> u bent Uitlogd </p> <?php
        header("refresh:1;url=index.php");
        exit;
    }
    ?>

    <section class="uitloggen">

    <h1>Uitlog pagina </h1>

    <h3> weet je zekker dat je wild uit loggen?</h3>
    <h3> als je dat wild druk dan op de knop</h3>
    <form method="post">
        <button type="submit">Uitloggen</button>
    </form>

    <h3> zo niet druk dan op terug</h3>
    <a href="index.php">terug</a>
    </section>
</body>
</html>