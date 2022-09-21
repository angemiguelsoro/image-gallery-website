<?php
    require("connexion_db.php");
    
    if(isset($_GET["delete"])) {
        
        $sql = "DELETE FROM images WHERE id_rubrique='".$_GET["delete"]."'";
        $sql2 = "DELETE FROM rubrique WHERE id_rubrique='".$_GET["delete"]."'";

        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql2);

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/images.jfif" type="image/x-icon"/>
    <link rel="stylesheet" href="style/rubrique.css">
    <title>Mon album</title>
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
        <h2>Mon album</h2>
        
        <?php

            $query = mysqli_query($conn,"select id_rubrique, nom_rubrique, date_rubrique, time_rubrique from rubrique");

            echo '<div class="container">';

            while($row = mysqli_fetch_assoc($query)) {

                echo '<div class="rubrique">';
                echo '<div class="folder">';
                echo '<a href="album.php?open='.$row["id_rubrique"].'"><img src="image/photo.png"></a>';
                echo '<span>'.$row['nom_rubrique'].'</span>';
                echo '<span>'.$row['date_rubrique'].'</span>';
                echo '<span>'.$row['time_rubrique'].'</span></div>';
                echo '<span><a href="update_rubrique.php?update='.$row["id_rubrique"].'"><img src="image/bouton-modifier.png"></a></span>';
                echo '<span><a href="?delete='.$row["id_rubrique"].'"><img src="image/supprimer.png"></a></span></div>';
            }
            
            '</div>';
            
        ?>
    </section>
</body>
</html>