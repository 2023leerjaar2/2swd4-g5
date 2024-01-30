<!DOCTYPE html>
<html lang="nl">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/like.js" defer></script>
    <title>acount aanmaken</title>
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
        <!-- dit pagina is om als gast een acount te maken -->
    <section id='title'>
        <h1 id="'title-1"> maak hier u acount</h1>
    </section>
    <form id="acound-add" method="post" action="">
        <label for="voornaam">Voornaam:</label><br>
        <input type="text" id="voornaam" name="voornaam"><br>
        <label for="achternaam">Achternaam:</label><br>
        <input type="text" id="achternaam" name="achternaam"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord" name="wachtwoord"><br>
        <input type="submit" id="submit" value="Submit">
    </form>
    <section class="terug-button1">
        <a id='backbutton' href='index.php'>back</a>
    </section>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $rol = 2; // Standaardwaarde voor rol
    
        // Controleer of het account al bestaat
        $checkSql = "SELECT * FROM gebruikers WHERE Email = '$email'";
        $result = $conn->query($checkSql);
    
        if ($result->num_rows > 0) {
            // Account bestaat al
            echo "<p id='melding-4'>Dit account bestaat al. </p>";
            echo "<script>
                    setTimeout(function(){
                        document.getElementById('melding-4').style.display = 'none';
                    }, 4000);
                  </script>";
        } else {
            // Account bestaat niet, dus maak een nieuw account
            $sql = "INSERT INTO gebruikers (Voornaam, Achternaam, Email, Wachtwoord, Rol)
            VALUES ('$voornaam', '$achternaam', '$email', '$wachtwoord', '$rol')";
    
            if ($conn->query($sql) === TRUE) {
                echo "<p id='melding-1'>Je gegevens zijn aangepast. </p>";
                header("refresh:1;url=login.php");
            } else {
                "<p id='melding4-2'>error code = 02. vraag aan admin voor hulp</p>";
            }
        }
    
        $conn->close();
    }
    ?>
    
    </main>

    <?php
    require_once("footer.php");
    ?>
</body>
</html>