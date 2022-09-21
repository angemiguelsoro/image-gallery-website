<?php

    require("connexion_db.php");

    $code = $_GET["update"];

    $sql = "SELECT *FROM rubrique WHERE id_rubrique='$code'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(isset($_POST) & !empty($_POST)) {

        $des = $_POST['des_rub'];
        $nom_rub = $_POST['nom_rub'];
        $date_rub = date("Y-m-d");
        $time_rub = date("H:i:s",strtotime("-2 hours"));

        $sql2 = "UPDATE rubrique SET nom_rubrique='$nom_rub', desc_rubrique='$des', date_rubrique='$date_rub', time_rubrique='$time_rub' WHERE id_rubrique='$code'";

        $result2 = mysqli_query($conn, $sql2);

        if($result2) {
            header("location: rubrique.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/images.jfif" type="image/x-icon"/>
    <link rel="stylesheet" href="style/update_rubrique.css">
    <title>Galerie d'image</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/c996b223139f820547ccaa9f5c4a3891.jpg" alt="">
            <p>IMAGES GALLERY</p>
        </div>
        <nav>
            <ul>
                <li><a href="../accueil.php"><img src="image/page-daccueil.png">Accueil</a></li>
                <li><a href="rubrique.php"><img src="image/photo-album.png">Mon album</a></li>
                <li><a href="inserer_image.php"><img src="image/galerie-dimages.png">Ajouter des photos</a></li>
                <li><a href="inserer_rubrique.php"><img src="image/folder.png">Ajouter des rubriques</a></li>
                <li><a href="../accueil.php"><img src="image/logout.png">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    
    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Modifier la rubrique</h2>
                    <form action="" method="post">
                        <div class="inputbox">
                            <input type="text" placeholder="Nom de la rubrique" name="nom_rub" value="<?php echo $row["nom_rubrique"]?>" required>
                        </div>

                        <div class="inputbox">
                            Description:<br>
                            <textarea  name="des_rub" ><?php echo $row["desc_rubrique"]?></textarea>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>