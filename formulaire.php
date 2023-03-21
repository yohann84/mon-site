<?php 
session_start();
if(isset($_POST['send'])) {
    //extration des variables
    extract($_POST);
    //verifions si les variables existent et ne sont pas vides
    if(isset($username) && $username != "" &&
        isset($first_name) && $first_name != "" &&
        isset($email) && $email != "" &&
        isset($phone) && $phone != "" &&
        isset($message) && $message != ""){

    //envoyé l'email
    //le destinataire (votre email)
    $to = "website.by.yohann@gmail.com";
    //objet du mail
    $subject = "Vous avez reçu un message de :" .$email;

    $message = "
            <p>Vous avez reçu un message de <strong>".$email."</strong></p>
            <p><strong>Nom :</strong>".$username."</p>
            <p><strong>Prénom :</strong>".$first_name."</p>
            <p><strong>Téléphone :</strong>".$phone."</p>
            <p><strong>Message :</strong>".$message."</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$email.'>' . "\r\n";

    //envoi du mail
    $send = mail($to,$subject,$message,$headers);
    //vérification de l'envoi
    if($send){
        $_SESSION['succes_message'] = "message envoyé";   
    }else {
        $info = "Message non envoyé !"; 
    }
    }else{
    //si elles sont vides
        $info = "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <link rel="stylesheet" href="style.css">
    <title>Dévellopeur web création de sites internet Website84.by.yohann</title>
    <meta name="description" content="Dévellopeur web sur Cavaillon dans le vaucluse pour la création de votre site internet...">

</head>

<body>
    <!--Début du header-->
    <header class="main-header" >
        <div class="main-nav"><a href="accueil.html"><img src="img/logo2.jpg" alt="photo du logo"></a></div>
        <div class="titrelogo"><h1>Dévellopeur web sur Cavaillon pour la création de vos sites internet</h1></div>       
    </header>
    <!--fin du header-->

    <!--Début du menu-->
    <div class="menu">
        <div class="menu1">
            <ul>
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="gallerie.html">Notre gallerie</a></li>
                <li><a href="./accueil.html#nous">Qui sommes-nous</a></li>
                <li><a href="contact.html">Nous contacter</a></li>
            </ul>   
        </div>
    </div>
    <!--Fin du menu-->

    <!--Début du formulaire-->
    <div class="container">
        <?php
            //afficher le message d'erreur
            if(isset($info)) { ?>
                <p class="request-message" style="color: red">
                    <?=$info?>
                </p>
                <?php
            }
        ?>

        <?php
            //afficher le message de succes
            if(isset($_SESSION['succes_message'])) { ?>
                <p class="request-message" style="color: green">
                    <?= $_SESSION['succes_message']?>
                </p>
                <?php
            }
        ?>

        <div class="formulaire">
            <form method="post" autocomplete="on" action="">
                    <h1>Nous contacter</h1>
                        <input type="text" name="username" placeholder="Votre nom"><br>
                        <input type="text" name="first_name" placeholder="Votre prénom"><br>
                        <input type="mail" name="email" placeholder="Votre email"><br>
                        <input type="text" name="phone" placeholder="Votre téléphone"><br>
                        <textarea name="message" id="message" cols="50" rows="10" placeholder="Votre message"></textarea>
                        
                        <div class="envoyer">
                            <button name="send">Envoyer votre message</button>
                        </div>
                        
            </form>
        </div>
    </div>
    <!--fin du formulaire-->

    <!--Début du footer-->
    <div class="footer">
        <div class="main-footer" role="contentinfo">
            <div class="liste">
                <ul>
                    <li><a href="accueil.html">Accueil</a></li>
                    <li><a href="../accueil.html#horaire">Jours et horaires</a></li>
                    <li><a href="gallerie.html">Notre gallerie</a></li>
                    <li><a href="contact.html">Nous contacter</a></li>
                </ul>
            </div>

            <div class="photoFooter">
                <a href="accueil.html"><img src="img/logo2.jpg" alt="photo du logo"></a>
            </div>    
        </div>
    </div>
    <!--Fin du footer-->

</body>

</html>