<?php 
// dit is persoonlijke pagina hier kan de gebruiker zijn gegevens zien en aanpassen
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>persoonlijke</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
    require_once("header.php");
    ?>
    <main>
<main>
<?php
require_once( "conection.php");
if(session_status() == PHP_SESSION_NONE){
    // Sessie is niet gestart, start er eenj
    session_start();
}

if (isset($_SESSION["gebruikers_id"])) {
    

    // Haal de gebruikersinformatie op uit de database
    $gebruikers_id = $_SESSION["gebruikers_id"];
    $query = "SELECT * FROM gebruikers WHERE ID = $gebruikers_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Toon de gebruikersinformatie
    echo "<h1 id='welkom-bericht'> Welkom " . $_SESSION["voornaam"] . " dit is je eigen pagina hier kan je infomatie aan passen wat je zelf wilt ". "</h1 ";
    echo "<section id='user-info'>";
    echo "<p id='voornaam'>Voornaam: " . $user['Voornaam'] . "</p>";
    echo "<p id='achternaam'>Achternaam: " . $user['Achternaam'] . "</p>";
    echo "<p id='email'>Email: " . $user['Email'] . "</p>";
    echo "<p id='wachtwoord'>Wachtwoord: laten we uit veiligheid niet zien</p>";
    echo "</section>";
    // hier onder is de form om de info van persoon te veranderen
    
    echo "<h2 id='updateTitle'>Update je gegevens</h2>";
    echo "<form method='POST' action='' id='updateForm'>";
    echo "<label for='voornaam' class='inputLabel'>Voornaam:</label> <input type='text' name='voornaam' id='voornaam' value='" . $user['Voornaam'] . "'><br>";
    echo "<label for='achternaam' class='inputLabel'>Achternaam:</label> <input type='text' name='achternaam' id='achternaam' value='" . $user['Achternaam'] . "'><br>";
    echo "<label for='email' class='inputLabel'>Email:</label> <input type='text' name='email' id='email' value='" . $user['Email'] . "'><br>";
    echo "<label for='wachtwoord' class='inputLabel'>Wachtwoord:</label> <input type='password' name='wachtwoord' id='wachtwoord' value='" . $user['Wachtwoord'] . "'><br>";
    echo "<input type='submit' value='Update' id='submitButton'>";
    echo "</form>";

?>
<section class="terug-button">
<a id='backbutton' href='index.php'>back</a>
</section>
<?php

   
if (isset($_POST['voornaam'], $_POST['achternaam'], $_POST['email'])) {
    $gebruikers_id = $_SESSION["gebruikers_id"];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $query = "UPDATE gebruikers SET Voornaam = '$voornaam', Achternaam = '$achternaam', Email = '$email' WHERE ID = $gebruikers_id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "<p id='melding-1'>Je gegevens zijn aangepast. </p>";
        header("refresh:1;url=login.php");
    } else {
        // melding 2 is als er iets mis is gegaan ik heb het als fout 00 genoemd vanwegen het een fout is die we niet kunnen op lossen 
        echo "<p id='melding-2'>Er is iets misgegaan. Probeer het opnieuw. </p>";
        echo "<p id='melding-2-1'>error fout = 00 </p>";
        echo "<p id='melding-2-11'> go to the admin for context </p>";
        header("refresh:1;url=login.php");
    }
}
} else {
    // melding 3 is als je niet bent ingelogd 
    echo "<p id='melding-3'>Niet ingelogd </p>" ;
    header("refresh:1;url=login.php");
}


?>


</main>    
</body>
</html>