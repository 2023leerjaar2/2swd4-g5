<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content="blog website voor ala">
    <meta name="keywords" content="ala , blog , php , leeren , nederlands , engels ,  bbq , 4 persoonen ">
    <meta name="author" content="sjouk  , dani  , tim  ,  adam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/like.js" defer></script>
    <title>contact</title>
</head>
<body class="contact">
    <?php
    require_once("conection.php");
    require_once("header.php");
    ?>

<article class="contact-us-container">
  <h2>Contacteer ons</h2>
 <p>We zijn altijd beschikbaar voor u, voel vrij ons te contacteren.</p>
  <article class="contact-info">
    <p><strong>Telefoon:</strong> <a href="mailto:kamadoing@business.com">kamadoing@business.com</a> or <a href="tel:+31612345678">+31 6 12345678</a></p>
    <p><strong>Support:</strong> <a href="mailto:kamadoing@business.com">kamadoing@business.com</a></p>
    <p><strong>Office:</strong> 1418 Riverwood Drive, Suite 3845 Cottonwood, CA 96022, United States</p>
  </article>



  <form>
    <label for="name">Naam:</label>
    <input type="text" id="name" required>
    <label for="email">E-mail:</label>
    <input type="email" id="email" required>
    <label for="subject">Onderwerp:</label>
    <input type="text" id="subject" required>
    <label for="message">Beschrijving:</label>
    <textarea id="message" required></textarea>
    <button type="submit">LOGIN</button>
  </form>
</article>


<?php
    require_once("footer.php");
    ?>
</body>
</html>