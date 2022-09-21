<?php

    require("connexion_db.php");

    $com_img = "";
    $id_rub = "";
    $ok = "";
    $img = "";

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){            
            
            $com_img = $_POST['com_img'];
            $id_rub = trim($_POST['rubrique']);
            $date_img = date("Y-m-d");
            $time_img = date("H:i:s",strtotime("-2 hours"));
            
            $img = $_FILES['img']['name'];
            $upload = "photos/".$img;

            move_uploaded_file($_FILES['img']['tmp_name'],$upload);

            $sql = "INSERT INTO images(id_rubrique,photo,commentaire_image,date_image,time_image) values('$id_rub','$img','$com_img','$date_img','$time_img')";

            $result = mysqli_query($conn, $sql);
    
            $ok = "Ajout réussi !!";

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/images.jfif" type="image/x-icon"/>
    <link rel="stylesheet" href="style/inserer_image.css">
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
                    <h2>Ajouter une image</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <span class="sucess"><?php echo $ok; ?></span>

                        <div class="img">
                            <input type="file" name="img" required>
                        </div>

                        <div class="inputbox">
                            Commentaire:<br>
                            <textarea  name="com_img" ></textarea>
                        </div>

                        <div class="selectbox">
                            Nom de la rubrique:
                            <?php
                                 $sql2 = "SELECT id_rubrique, nom_rubrique FROM rubrique ORDER BY nom_rubrique DESC";
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select name='rubrique'>";

                                while($row = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row['id_rubrique'].'">'.$row['nom_rubrique'].'</option>';
                                }

                                echo "</select><br/>";

                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Ajouter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>