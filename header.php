<!-- header.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
<!-- hier is denk ik ook niet alle meta dingen nodig want dit is header -->
<link rel="stylesheet" href="css/header.css">
<script src="js/main.js" defer></script>
</head>
<body>
    <header>
    <?php
           if(session_status() == PHP_SESSION_NONE){
            // Sessie is niet gestart, start er eenj
            session_start();
        }
    ?>
        <nav>
            <ul>
                <li><a  id="home-id" href="index.php">Home</a></li>
                <li><a id="blog-id" href="blog.php">Blog</a></li>
                <li><img src="img/logo.png" alt="logo"></li>
                <li><a id="contact-id" href="contact.php">Contact</a></li>
                <li><?php 
                 if (isset($_SESSION["gebruikers_id"])) {
                 echo "<a id='login-id' href='persoonlijk.php'> Persoonlijk </a>";
                 } else {
                    echo "<a id='login-id' href='login.php'>  Login  </a>";
                    }
                ?></li>

            </ul>
        </nav>
        <?php 
 
   
        
        ?>
    </header>