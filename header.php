<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<!-- hier is denk ik ook niet alle meta dingen nodig want dit is header -->
<link rel="stylesheet" href="css/style.css">
<script src="js/main.js" defer></script>
</head>
<body>
    <header>
        <h1>Jouw Blogtitel</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="persoonlijk.php">Persoonlijk</a></li>
                <li><a href="login.php">login</a></li>
                <!-- Voeg hier andere menu-items toe indien nodig -->
            </ul>
        </nav>
        <?php 
    if(session_status() == PHP_SESSION_NONE){
        // Sessie is niet gestart, start er eenj
        session_start();
    }

        if (isset($_SESSION["gebruikers_id"])) {
            echo "<p>Welkom " . $_SESSION["voornaam"] . "</p>";
        } else {
            echo "<p>Niet ingelogd</p>";
        }
        ?>
    </header>