<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Costum CSS -->
  <link rel="stylesheet" type="text/css" href="../css\custom.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>Accueil | Geni Soft Ecole</title>

</head>

<body id="top">

  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark my-bg-color fixed-top " id="mainNav">

    <!-- Start Container -->
    <div class="container">

      <!-- Nav Brand -->
      <a id="logo" href="index.html" class="navbar-brand js-scroll-trigger text-white">Geni Soft Ecole</a>
      <!-- the class navbar-brand gives the logo of our web page -->
      <!-- <a id="logo-no-bg" href="index.html"><img src="img\GS-logo-removebg-preview"></a> -->

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation"><i class="fa fa-bars"></i>
        <!-- data-target uses JQuery so when we're calling something like a target we need to put the # for the JQuery -->
        <span class="navbar-toggle-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- ml-auto stands for margine left auto  -->
          <!-- we'll use the id in our JS -->

          <!-- ACCUEIL -->
          <li class="nav-item">
            <a href="index.html" class="nav-link js-scroll-trigger">Accueil</a>
          </li>

          <!-- NOS FORMATIONS -->
          <li class="nav-item dropdown">
            <!-- dropdown-toggle -->
            <!-- id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
             
            <a href="formations.html" class="nav-link  js-scroll-trigger">Nos Formations</a>
          </li>

          <!-- NOS OFFRES -->
          <li class="nav-item">
            <a href="offres.html" class="nav-link js-scroll-trigger">Nos Offres</a>
          </li>

          <!-- CONTACT -->
          <li class="nav-item">
            <a href="contact.html" class="nav-link js-scroll-trigger">Contact</a>
          </li>

          <!-- RECHERCHE -->
          <li class="nav-item">
            <i class="fa fa-search btn ml-2 mt-1 btn-lg"><a href="https://www.geni-soft.com"></a></i>
          </li>

           <li class="nav-item">
             <a href="logout.php" class="btn btn-link" style="color: rgba(255,255,255,.6);">Logout</a>
           </li>
        </ul>
      </div>
    </div>
    <!-- End Container -->
  </nav>
  <!-- End Navigation -->

  <a href="reset-password.php" class="btn btn-primary">Reset Your Password</a>

  </div>
  <!-- End Container -->

  <br><br><br><br>

  <!-- Footer -->
  <footer class="py-5 my-bg-color text-center">
    <div class="container">

      <div class="btn-group btn-group-lg">
        <a class="btn btn-secondary" href="https://www.geni-soft.com" target="blank"><i class="fa fa-globe"></i></a>
        <a class="btn my-bg-color" href="https://web.facebook.com/GeniSoftInformatique/?ref=br_rs" target="blank"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-secondary" href="https://www.linkedin.com/company/geni-soft-informatique" target="blank"><i class="fa fa-linkedin"></i></a>
        <a class="btn my-bg-color" href="contact.html"><i class="fa fa-phone"></i></a>
        <a class="btn btn-secondary" href="contact.html"><i class="fa fa-envelope-o"></i></a>
      </div>

      <br><br><br>
      <p class="m-0 text-center text-white">Geni Soft Ecole - Copyright &copy; 2020 Tous droits réservés</p>

    </div>

  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <script src="js/navbar-shrinker.js"></script>

  
  <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=gsef;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }


        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT matricule, nom, prenom, gender, dateN, lieuN, adresse, niveauEtu, telephone, formation, email, occupation, disponibilité FROM preinscrit');
       
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        { 
            echo '<p><strong>' . htmlspecialchars($donnees['matricule']) . '</strong></p>';
            echo '<p>nom:' . htmlspecialchars($donnees['nom']) . ', prenom:' . htmlspecialchars($donnees['prenom']) . ', gender:' . htmlspecialchars($donnees['gender']) . '</p>';
            echo '<p>date de naissance:' . htmlspecialchars($donnees['dateN']) . ' à ' . htmlspecialchars($donnees['lieuN']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['adresse']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['niveauEtu']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['telephone']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['formation']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['email']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['occupation']) . '</p>';
            echo '<p>' . htmlspecialchars($donnees['disponibilité']) . '</p>';
        }
        $reponse->closeCursor();
    ?>
</body>

</html>
