<?php

    require("connexion_db.php");

    $erreur = "";
    $username = "";
    $mdp = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = trim($_POST["username"]);
        $mdp = trim($_POST['mdp']);
        
        $query = mysqli_query($conn, "SELECT * FROM utilisateur WHERE nom_utilisateur = '$username' AND mot_de_passe = '$mdp' ");
        
        if(mysqli_num_rows($query) > 0){
            header("location: user_connected.php");
        } else{    
            $erreur = "Nom d'utilisateur ou mot de passe incorrect !!";
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
    <link rel="stylesheet" href="style/connexion.css">
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
                <li><a href="inscription.php"><img src="image/add-user.png">S'inscrire</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Connexion</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <span class="erreur"><?php echo $erreur; ?></span>
                    <div class="inputbox">
                        <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                    </div>
                    <div class="inputbox">
                        <input type="password" placeholder="Mot de passe" name="mdp" required>
                    </div>
                    <div class="inputbox">
                        <a href="#">
                            <input type="submit" value="Se connecter">
                        </a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>