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
  <link rel="stylesheet" type="text/css" href="css\custom.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>Accueil | Geni Soft Ecole</title>

</head>

<body id="top">

  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark my-bg-color fixed-top " id="mainNav">

    <!-- Start Container -->
    <div class="container">

      <!-- Nav Brand -->
      <a id="logo" href="index.php" class="navbar-brand js-scroll-trigger text-white">Geni Soft Ecole</a>
      <!-- the class navbar-brand gives the logo of our web page -->
      <!-- <a id="logo-no-bg" href="index.php"><img src="img\GS-logo-removebg-preview"></a> -->

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
            <a href="index.php" class="nav-link js-scroll-trigger">Accueil</a>
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

          <!-- 
            <form action="" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm btn-outline-info" type="text" placeholder="Recherche">
            <button class="btn btn-outline-info my-2 my-sm-0 mx-lg-2 mx-md-1">Recherche</button>
            'my' stands for Margine Vertical so the margin is set to 2px
            'my-sm-0' stands for margin vertical for small size set to 0px
            </form>
           -->

           <li class="nav-item">
             <a href="php/indexAdmin.php" class="btn btn-link" style="color: rgba(255,255,255,.6);">Login</a>
           </li>
        </ul>
      </div>
    </div>
    <!-- End Container -->
  </nav>
  <!-- End Navigation -->

  <!-- Start Header -->
  <header>

    <!-- Start Carousel Div -->
    <div id="carouselExampleIndicators" class="carousel slide d-none d-sm-block" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <!-- Start Carousel Inner -->
      <div class="carousel-inner" role="listbox">
        <!-- Start First Slide -->
        <div class="carousel-item active" style="background-image: url('img/slide.jpg');">
          <div class="carousel-caption d-none d-sm-block">
            <h2 class="slideh">L'Ecole Geni Soft</h2>
            <p><br>Une école de grande expérience dans le domaine informatique</p>
          </div>
        </div>
        <!-- End First Slide -->

        <!-- Start Second Slide -->
        <div class="carousel-item" style="background-image: url('img/slide.jpg');">
          <div class="carousel-caption d-none d-sm-block">
            <h2 class="slideh">Offres Spécials</h2>
            <p><br>Des offres spécials pour les étudiants et les clients fidèles</p>
          </div>
        </div>
        <!-- End Second Slide -->

        <!-- Start Third Slide -->
        <div class="carousel-item" style="background-image: url('img/slide.jpg');">
          <div class="carousel-caption d-none d-sm-block">
            <h2 class="slideh">Informatique ou Langue Etrangère</h2>
            <p><br>Qu'attendez-vous! Commencez à apprendre et améliorez vos compétences!</p>
          </div>
        </div>
        <!-- End Third Slide -->
      </div>
      <!-- End Carousel Inner -->

      <!-- Start Next  -->
      <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <!-- End Next -->

      <!-- Start Previous -->
      <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!-- End Previous -->

    </div>
    <!-- End Carousel Div -->
  </header>
  <!-- End header -->

  <br>

  <!-- Start Container -->
  <div class="container">
    <h1 class="my-4">Présentation de l'école</h1>

    <p class="text-justify">L'école Géni soft est une école de formation privée, agréée par l'état, affiliée à une <a
        href="https://www.geni-soft.com/ecole.php">entreprise</a> de renom national dont le créneau est le développement
      de logiciels de gestion et la création de sites Web.</p>
    <p class="text-justify">Basée sur les meilleurs moyens pédagogiques et techniques, elle offre un enseignement assuré
      par des professeurs de haut niveau ce qui permet aux étudiants de progresser de manière remarquable dans tous les
      domaines proposés.</p>
    <p class="text-justify">Disposant d'ateliers spécialisés, l'apprentissage qu'elle dispense offre la possibilité de
      progresser plus rapidement.</p>

    <br><br>

    <!-- Start Marketing Section Icons -->
    <h2>Nos prochaines sessions</h2>
    <br>
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
        $reponse = $bdd->query('SELECT fname, fdate, fhour, fhref, fimg FROM session');
       
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        echo      '<div class="row">';

        while ($donnees = $reponse->fetch())
        {
          echo        '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">';
          echo          '<figure class="figure">';
          echo            '<img id="prochainesession" src="img/' . htmlspecialchars($donnees['fimg']) . '.jpg" alt="' . htmlspecialchars($donnees['fname']) . '" class="figure-img img-fluid">';
          echo          '</figure>';
          echo          '<div class="text-center">';
          echo            '<h4 class="nv-session">' . htmlspecialchars($donnees['fname']) . '</h4>';
          echo            '<h6> Nouvelle session ' . htmlspecialchars($donnees['fname']) . ' est programmé le ' . htmlspecialchars($donnees['fdate']) . ' à ' . htmlspecialchars($donnees['fhour']) . '.</h6>';
          echo           '<br>';
          echo            '<button class="btn my-bg-color text-white"><a style="color:white;" href="formations/' . htmlspecialchars($donnees['fhref']) . '.html">Savoir Plus</a></button>';
          echo          '</div>';
          echo        '</div>';
        }
        echo    '</div>';
        $reponse->closeCursor();
    ?>

      </div>

    </div>

    <!-- End Start Marketing Section Icons -->

  </div>
  <!-- End Container -->

  <br><br><br><br>

  <!-- Footer -->
  <footer class="py-5 my-bg-color text-center">
    <div class="container">

      <div class="btn-group btn-group-lg">
        <a class="btn btn-secondary" href="https://www.geni-soft.com" target="blank"><i class="fa fa-globe"></i></a>
        <a class="btn btn-dark" href="https://web.facebook.com/GeniSoftInformatique/?ref=br_rs" target="blank"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-secondary" href="https://www.linkedin.com/company/geni-soft-informatique" target="blank"><i class="fa fa-linkedin"></i></a>
        <a class="btn btn-dark" href="contact.html"><i class="fa fa-phone"></i></a>
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
</body>

</html>