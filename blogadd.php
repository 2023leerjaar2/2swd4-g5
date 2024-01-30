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
    <title>blog item toevoegen</title>
</head>
<body>
<?php
if(session_status() == PHP_SESSION_NONE){
    // Sessie is niet gestart, start er eenj
    session_start();
}
$rol= $_SESSION["rol"];
$id = $_SESSION["gebruikers_id"];
 
if (isset($_SESSION["gebruikers_id"])) {
 
if ($rol == 1) {

    // hier komt pagina om resepten  toe te voegen
    // dat is een title en foto en een text over de product

    require_once("header.php");
?>

<main>

<section class="title-addpagina">
<h1 id="title-69">blog item toevoegen</h1>
<form action="" method="post" enctype="multipart/form-data"  id="form-blog">
    <label for="title">Titel:</label><br>
    <input type="text" id="title" name="title" id="title-input"><br>
    <label for="image">Foto:</label><br>
    <input type="file" id="image" name="image" id="image-input"><br>
    <label for="description">Beschrijving:</label><br>
    <textarea id="description" name="description" id="description-input"></textarea><br>
    <label for="short_description">Korte Beschrijving:</label><br>
    <textarea id="short_description" name="short_description" id="short-description-input"></textarea><br>
    <label for="url">URL van het kookboek:</label><br>
    <input type="url" id="url" name="url" id="url-input"><br>
    <input type="submit" value="Submit" id="submit-button">
</form>
</section>






<?php
require_once( "conection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $short_description = $_POST['short_description'];
    $url = $_POST['url'];

    // Handle the uploaded file
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO blog_post ( user_id,  title, image_path, description, sort_description, external_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $user_id, $title, $target_file, $description, $short_description, $url);

    $user_id = $id;
    $stmt->execute();
}
}
else {
    // melding 4 is als je niet de rol 1 hebt 
    echo "<p id='melding4'>je hebt geen toegang tot deze pagina.  </p>";
    echo "<p id='melding4-1'>je word terug gestuurd naar de home pagina </p>";
    echo "<p id='melding4-2'>error code = 01. vraag aan admin voor hulp</p>";
    header("refresh:1;url=index.php");
}
}
else {
    // melding 3 is als je niet bent ingelogd 
    echo "<p id='melding-3'>Niet ingelogd </p>" ;
    header("refresh:1;url=login.php");
}
?>  
</main>
<?php
require_once("footer.php")
?>  
</body>
</html>