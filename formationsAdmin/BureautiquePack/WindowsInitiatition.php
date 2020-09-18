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
<html lang="Fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />

    <!-- Costum CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link rel="stylesheet" href="../../css/formation.css">
    <script src="../data.js"></script>
    <!-- <link rel="stylesheet" href="css/sideNav.css"> -->

    <title>Geni Soft Ecole | Accueil</title>

</head>

<body>

    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark my-bg-color fixed-top">

        <!-- Start Container -->
        <div class="container">

            <!-- Nav Brand -->
            <a id="logo" href="../../php/indexAdmin.php" class="navbar-brand text-white">Geni Soft Ecole</a>

            <!-- Start Button -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i>
                <span class="navbar-toggle-icon" aria-label="menu"></span>
            </button>
            <!-- End Button -->

            <!-- Start Links -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <!-- ACCUEIL -->
                    <li class="nav-item">
                        <a href="../../php/indexAdmin.php" class="nav-link">Accueil</a>
                    </li>

                    <!-- NOS FORMATIONS -->
                    <li class="nav-item">
                        <a href="../../php/formationsAdmin.php" class="nav-link">Nos Formations</a>
                    </li>

                    <!-- NOS OFFRES -->
                    <li class="nav-item">
                        <a href="" class="nav-link">Nos Offres</a>
                    </li>

                    <!-- CONTACT -->
                    <li class="nav-item">
                        <a href="" class="nav-link">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a href="../../php/logout.php" class="btn btn-link" style="color: rgba(255,255,255,.6);">Logout</a>
                    </li>

                </ul>

            </div>
            <!-- End Links -->

        </div>
        <!-- End Container -->

    </nav>
    <!-- End Navigation -->

    <!-- 
**************************************************************************************************************************
                                        Debut De La Description De La Formation
**************************************************************************************************************************
-->

    <!-- Start container -->
    <div class="container">

        <!-- Page Title -->
        <h1 class="mt-4 mb-3">Nos formations</h1>

        <!-- Start Breadcrumb -->
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../php/indexAdmin.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="../../php/formationsAdmin.php">Formations</a></li>
            <li class="breadcrumb-item active">Bureautique Pack</li>
        </ul>
        <!-- End Breadcrumb -->
    </div>
</div>


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
        echo '<br>';
        echo '<div class="container">';
        echo    '<h3>List des inscrit a la formation Windows Initiation</h3>';
        echo    '<br>';
            echo    '<table class="table table-secondary table-striped table-hover">';
            echo        '<thead>';
            echo        '<tr>';
            echo            '<th>Matricule</th>';
            echo            '<th>Nom</th>';
            echo            '<th>Prenom</th>';
            echo            '<th>Téléphone</th>';
            echo            '<th>Disponibilité</th>';
            echo            '<th>Confirmation</th>';
            echo        '</tr>';
        while ($donnees = $reponse->fetch())
        { 
            echo        '</thead>';
            echo        '<tbody>';
            echo        '<tr>';
            echo            '<td>' . htmlspecialchars($donnees['matricule']) . '</td>';
            echo            '<td>' . strtoupper (htmlspecialchars($donnees['nom'])) . '</td>';
            echo            '<td>' . ucfirst (htmlspecialchars($donnees['prenom'])) . '</td>';
            echo            '<td> 0' . htmlspecialchars($donnees['telephone']) . '</td>';
            echo            '<td> ' . htmlspecialchars($donnees['disponibilité']) . '</td>';
            echo            '<td> <button class="btn btn-info" onclick="confirmer()">Confirmer</button> </td>';
            echo        '</tr>';
            echo        '</tbody>';
        }
        echo    '</table>';
        $reponse->closeCursor();
    ?>

   

    </div>

    <script>
        function confirmer(){
            <?php
                //ajouter l'apprenant dans la session
                //supprimer le de cette liste
            ?>
        }
    </script>
    <!-- End Optional JavaScript -->

    <br><br><br><br>

    <!-- Footer -->
    <footer class="py-5 my-bg-color text-center">
        <div class="container">

            <div class="btn-group btn-group-lg">
                <a class="btn btn-secondary" href="https://www.geni-soft.com" target="blank"><i
                        class="fa fa-globe"></i></a>
                <a class="btn btn-dark" href="https://web.facebook.com/GeniSoftInformatique/?ref=br_rs"
                    target="blank"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-secondary" href="https://www.linkedin.com/company/geni-soft-informatique"
                    target="blank"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-dark" href="../../contact.html"><i class="fa fa-phone"></i></a>
                <a class="btn btn-secondary" href="../../contact.html"><i class="fa fa-envelope-o"></i></a>
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

</body>

</html>