<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page/style/accueil.css">
    <link rel="shortcut icon" href="page/image/images.jfif" type="image/x-icon"/>
    <title>Page d'accueil</title>
</head>
<body>

    <header>
        <div class="logo">
            <img src="page/image/c996b223139f820547ccaa9f5c4a3891.jpg" alt="">
            <p>IMAGES GALLERY</p>
        </div>
        <nav>
            <ul>
                <li name="home"><a href="accueil.php"><img src="page/image/page-daccueil.png">ACCEUIL</a></li>
                <li><a href="#about"><img src="page/image/info(1).png">A PROPOS</a></li>
                <li><a href="#dev"><img src="page/image/phone.png">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <h2>Galerie d'image</h2>
        <div class="connexion">
            <a href="page/inscription.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <img src="page/image/add-user.png">
                INSCRIPTION
            </a>
            <a href="page/connexion.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <img src="page/image/login.png">
                CONNEXION
            </a>
        </div>
    </section>

    <section id="about" class="contains">
        <div class="image_animée"></div>
        <p>
            Inscrivez-vous et connectez-vous pour créer votre album de photos, classez les dans des rubriques selon vos preferences et ajoutez autant de photos que vous voudrez.
        </p>
    </section>

    <section id="dev" class="developper">
        <div class="card">
            <div class="img_dev">
                <img src="page/image/MOI.png" alt="">
            </div>
            <div class="text">
                Soro Ange Songmon Miguel<br>Developpeur
            </div>
        </div>

        <div class="sociaux">
            <div class="social">
                <img src="page/image/facebook.png" alt="">
            </div>
            <div class="social">
                <img src="page/image/instagram.png" alt="">
            </div>
            <div class="social">
                <img src="page/image/whatsapp.png." alt="">
            </div>
        </div>
    </section>
    
    <script src="script/script.js"></script>
</body>
</html>