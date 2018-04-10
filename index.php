<?php

if(!empty($_POST)) {

	$errors = array();// verifie l'existence du champ et d'un contenu

		if(empty($_POST['nom'])) {
			$errors['nom'] = "Vous n'avez pas renseigné votre nom";
		}
		if(empty($_POST['prenom'])) {
			$errors['prenom'] = "Vous n'avez pas renseigné votre prénom";
		}
		if(empty($_POST['sujet'])) {
			$errors['sujet'] = "Vous n'avez pas renseigné le sujet de la demande";
		}
		if(empty($_POST['message'])) {
			$errors['message'] = "Vous n'avez pas renseigné votre message";
		}
		
		if (empty($errors)){ // Envoi de mail 
			$to = 'otmane.e@codeur.online';
			$nom = 'Message envoyé par ' . htmlspecialchars($_POST['prenom']) .' ' . htmlspecialchars($_POST['nom']);
			$headers = "Content-Type: text/html; charset=\"utf-8\"";
            $message_content = '
                <table>
                    <tr>
                    <td><b>Emetteur du message:</b></td>
                    </tr>
                    <tr>
                    <td>'. $nom . '</td>
                    </tr>
                    <tr>
                    <td><b>Sujet du message:</b></td>
                    </tr>
                    <tr>
                    <td>' . htmlspecialchars($_POST['sujet']) . '</td>
                    </tr>
                    <tr>
                    <td><b>Message:</b></td>
                    </tr>
                    <tr>
                    <td>'. nl2br(htmlspecialchars($_POST['message'])) . '</td>
                    </tr>
                </table>
            ';
			mail($to, $nom, $message_content,$headers);
		}

	}

		
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Otmane W.</title>
		<link rel="icon" type="image/png" href="img/logo.png" />


        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
            rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
            rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Mina" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">

        <script src="main.js"></script>
    </head>

    <body id="page-top">

        <section class="container">
            
            <header id="menu">

            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                <div class="container">
                    <img class="logo" src="img/logo.png">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">Otmane W.</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#page-top">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            </header>

            <section>

            </section>



            <!-- Section contact -->
            <section id="contact">

                <aticle class="entete text-center">
                        <h1 class="titre"> CONTACTEZ-MOI </h1>
                        <h2 class="soustitre"> Une question ? N'hésitez pas !</h2>
                </article>
        
                <div class="row">
    
                    
                    <section class=" col-md-5 info-contact">
    
                        <article class="text">
                        <span id="asidFormT">Une question, une information, une suggestion ?</span><br>
                        <p id="asidFormP">N'hésitez pas à nous contacter via notre formulaire.</p>
                            <img id="vect" src="img/vect1.png">
                        </article>
    
                    </section>
                    
    
                    <section class="col-md-6  form-line">
                        <h3 class="formuleTitre text-center"> Formulaire de contact :</h3>
    
                        <form name="formul" method="POST" action="index.php">
    
                            <div class="form-group lab">
                                <label class="col-xl-4 " for="nom">Nom* :</label>
                                <input class="col-xl-6" type="texte" name="nom" id="nom" value="<?php if(isset(($_POST['nom']))) echo ($_POST['nom']); ?>"/>
                                <p class="error" ><?php if(isset($errors['nom'])) echo $errors['nom']; ?></p>
                                
                            </div>
    
                            <div class="form-group lab">
                                <label class="col-xl-4 " for="prenom">Prénom* :</label>
                                <input class="col-xl-6" type="text" name="prenom" value="<?php if(isset(($_POST['prenom']))) echo ($_POST['prenom']); ?>"/>
                                <p class="error"><?php if(isset($errors['prenom'])) echo $errors['prenom']; ?></p>
                            </div>
    
    
                            <div class="form-group lab">
                                <label class="col-xl-4 "  for="sujet">Sujet* :</label>
                                <input class="col-xl-6" type="text" name="sujet" id="sujet" value="<?php if(isset(($_POST['sujet']))) echo ($_POST['sujet']); ?>"/>
                                <p class="error"><?php if(isset($errors['sujet'])) echo $errors['sujet']; ?></p>
                            </div>
    
                            <div class="form-group lab">
                                <label class="col-xl-4 "  for="message">Votre message* :</label>
                                <br>
                                <textarea class="col-xl-12" name="message" id="message" rows="5" cols="10" value="<?php if(isset(($_POST['message']))) echo ($_POST['message']); ?>"></textarea>
                                <p class="error"><?php if(isset($errors['message'])) echo $errors['message']; ?></p>
                            </div>
    
                            <div class="col-xl-6">
                                <input type="submit" name="envoie" value="Envoyer" id="b_envoie" >
                            </div>
                            
    
                        </form><br>
                        <h6>* Champs obligatoires </h6>
                    </section>
                </div>
            </section>

        </section>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>

    </body>

    </html>