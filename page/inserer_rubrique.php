<?php

    require("connexion_db.php");

    $nom_rub = "";
    $des = "";
    $ok = "";
    $erreur = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $nom_rub = $_POST['nom_rub'];
            
            $query = mysqli_query($conn, "SELECT id_rubrique FROM rubrique WHERE nom_rubrique = '$nom_rub'");
            
            if(mysqli_num_rows($query) == 1){

                $erreur = "Cette rubrique existe dejà!";

            } else{
                
                
                $des = $_POST['des_rub'];
                $date_rub = date("Y-m-d");
                $time_rub = date("H:i:s",strtotime("-2 hours"));
 
                $sql = "INSERT INTO rubrique(nom_rubrique,desc_rubrique,date_rubrique,time_rubrique) values('$nom_rub','$des','$date_rub','$time_rub')";
        
                $result = mysqli_query($conn, $sql);

                $ok = "Ajout réussi !!";

            }
        } 

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/images.jfif" type="image/x-icon"/>
    <link rel="stylesheet" href="style/inserer_rubrique.css">
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
                    <h2>Ajouter une rubrique</h2>
                    <form action="" method="post">
                        <span class="sucess"><?php echo $ok; ?></span>
                        <span class="erreur"><?php echo $erreur; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Nom de la rubrique" name="nom_rub" required>
                        </div>

                        <div class="inputbox">
                            Description:<br>
                            <textarea  name="des_rub" ></textarea>
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