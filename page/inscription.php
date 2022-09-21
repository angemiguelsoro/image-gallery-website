<?php

    require("connexion_db.php");

    $erreur_mdp = "";
    $erreur_username = "";
    $username = "";
    $ok = "";
    $mdp = "";
    $cmdp = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = trim($_POST["username"]);
        
        $query = mysqli_query($conn, "SELECT id FROM utilisateur WHERE nom_utilisateur = '$username'");
        
        if(mysqli_num_rows($query) == 1){
            $erreur_username = "Cet utilisateur existe dejà!";

        } else{
            
            $mdp = trim($_POST['mdp']);
            $cmdp = trim($_POST['cmdp']);
            
            if($mdp === $cmdp) {       
                $sql = "INSERT INTO utilisateur(nom_utilisateur,mot_de_passe) values('$username','$mdp')";
                
                $result = mysqli_query($conn, $sql);

                $ok = "Enregistrement réussi !!";
                
            } else {
                $erreur_mdp = "mot de passe non identique!";
            }
            
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
    <link rel="stylesheet" href="style/inscription.css">
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
                <li><a href="connexion.php"><img src="image/login.png">Se connecter</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Inscription</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <span class="erreur"><?php echo $erreur_username; ?></span>
                        <span class="sucess"><?php echo $ok; ?></span>
                        <span class="erreur"><?php echo $erreur_mdp; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                        </div>
                        <div class="inputbox">
                            <input type="password" placeholder="Mot de passe" name="mdp" required>
                        </div>
                        <div class="inputbox">
                            <input type="password" placeholder="Confirmer le mot de passe" name="cmdp" required>
                        </div>
                        <div class="inputbox">
                            <a href="#">
                                <input type="submit" value="Valider mon inscription">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>