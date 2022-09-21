<?php

    require("connexion_db.php");

    $code = $_GET["open"];

    if(isset($_GET["delete"])) {
        
        $sql = "DELETE FROM images WHERE id_image='".$_GET["delete"]."'";

        mysqli_query($conn,$sql);

        header("location: rubrique.php");

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/images.jfif" type="image/x-icon"/>
    <title>Mon album</title>
    <link rel="stylesheet" href="style/album.css">
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
        <div class="text">
            <?php

                $query1 = mysqli_query($conn,"select id_rubrique, nom_rubrique, desc_rubrique from rubrique where id_rubrique='$code'");
    
                while($row1 = mysqli_fetch_assoc($query1)) {

                    echo '<h1>'.$row1['nom_rubrique'].'</h1>';
                    echo '<span>'.$row1['desc_rubrique'].'</span>';

                }
            ?>
        </div>
        <div class="container">
            <?php

                $query = mysqli_query($conn,"select id_image, id_rubrique, photo, commentaire_image, date_image, time_image from images where id_rubrique='$code'");
    
                while($row = mysqli_fetch_assoc($query)) {

                    echo '<div class="cadrant">';
                    echo '<div class="folder">';
                    echo '<span><img src="photos/' .$row["photo"]. '"/></span>';
                    echo '<span class="text2">'.$row['commentaire_image'].'</span>';
                    echo '<span class="text2">'.$row['date_image'].'</span>';
                    echo '<span class="text2">'.$row['time_image'].'</span></div>';
                    echo '<span><a href="album_update.php?update='.$row["id_image"].'"><img src="image/bouton-modifier.png"></a></span>';
                    echo '<span><a href="?delete='.$row["id_image"].'"><img src="image/supprimer.png"></a></span></div>';
                }
                
            ?>
        </div>
    </section>
</body>
</html>