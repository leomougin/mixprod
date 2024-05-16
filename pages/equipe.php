<?php
session_start();
require_once '../fonction/requete.php';
$pseudo = NULL;
if (isset($_SESSION["utilisateur"])) {
    $pseudo = $_SESSION["utilisateur"]["pseudo"];
}
?>
    <!doctype html>
    <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        section {
            padding: 60px 0;
        }
    </style>
    <title></title>
</head>
<body>

<!--Insertion d'un menu-->
<?php include_once '../_partials/menu.php' ?>
<section>
    <h1 class="ms-5 mb-3"> Notre équipe </h1>
    <hr class=" border border-2 border-black mx-5">
</section>

<section id="equipe" >

    <p></p>
    <div class="container  text-center  mb-5">

            <div class="d-flex flex-column justify-content-center " >
                <div class="my-3">
                    <img class="rounded-5 " src="../assets/image/photomoi.jpg" height="315" width="210"/></div>
                <div class="">
                    <h1>Léo Mougin</h1>
                    <h2 class="d-none d-md-block">Fondateur & Réalisateur</h2>
                    <p class="d-none d-md-block">Fondateur de Mix Production,<br> une société innovante pour le monde de l'audiovisuelle </p>
                    <p><a class="btn btn-outline-dark mt-3" href="../assets/pdf/Fiche-de-Poste-Léo-Mougin.pdf"
                          target="_blank">Fiche de poste</a></p>
                </div>
            </div>


    </div>
    <div class="container text-center mb-3">
        <div class="row">
            <div class="d-flex justify-content-center ">
                <div class="d-flex flex-column align-items-center m-5 " style=" width:750px ">
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <img class="rounded-5 " src="../assets/image/phong.jpg" height="315" width="210"/></div>
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <h1>Phong Nguyen</h1>
                        <h2 class="d-none d-md-block">Caméraman</h2>
                        <p class="d-none d-md-block">Enregistre les meilleurs plans possibles, c'est le pro du travelling</p>
                        <p><a class="btn btn-outline-dark mt-3" href="../assets/pdf/Fiche-de-Poste-Phong-Nguyen.pdf"
                              target="_blank">Fiche de poste</a></p>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center m-5 " style=" width:750px ">
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <img class="rounded-5 " src="../assets/image/khang.png" height="315" width="210"/></div>
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <h1>Khang Nguyen</h1>
                        <h2 class="d-none d-md-block">Monteur</h2>
                        <p class="d-none d-md-block"> Rend nos créations encore plus unique, c'est le pro des highlights Leagues of Legends</p>
                        <p><a class="btn btn-outline-dark mt-3"
                              href="../assets/pdf/Fiche-de-Poste-Khang-Nguyen.pdf" target="_blank">Fiche de
                                poste</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container text-center mb-3">
        <div class="row">
            <div class="d-flex justify-content-center  ">
                <div class="d-flex flex-column align-items-center m-5 " style=" width:750px "   >
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <img class="rounded-5 " src="../assets/image/maxime.jpg" height="315" width="210"/>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-6">
                        <h1>Maxime Sermet</h1>
                        <h2 class="d-none d-md-block">Chargé de communication</h2>
                        <p class="d-none d-md-block">Il communique nos idées et nos valeurs, c'est le pro du relationnel</p>
                        <p><a class="btn btn-outline-dark mt-3" href="../assets/pdf/Fiche-de-Poste-Maxime-Sermet.pdf"
                              target="_blank">Fiche de poste</a></p>
                    </div>
                    </div>
                    <div class="d-flex flex-column align-items-center m-5 "style=" width:750px ">
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <img class="rounded-5 " src="../assets/image/hugo.jpg" height="315" width="210"/>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <h1>Hugo Talbot</h1>
                            <h2 class="d-none d-md-block">Secrétaire</h2>
                            <p class="d-none d-md-block">Il organise toute l'équipe et nos RDV, c'est le pro des pranks</p>
                            <p><a class="btn btn-outline-dark mt-3" href="../assets/pdf/Fiche-de-Poste-Hugo-Talbot.pdf"
                                  target="_blank">Fiche de poste</a></p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>


<section >
    <div class="container">
        <div class="d-flex flex-column align-items-center mx-auto">
                <img src="../assets/image/Organigramme-mixprod.png" class="w-75 d-none d-sm-block" alt="Organigramme de l'équipe">
            <p><a class="btn btn-outline-dark" href="../assets/pdf/Fiche-de-Poste-Equipe.pdf"
            target="_blank">Toutes les fiches de postes</a> </p>
        </div>
    </div>
</section>
<!--Insertion d'un menu-->
<?php include_once '../_partials/footer.php' ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
    </html><?php
