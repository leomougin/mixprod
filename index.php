<?php
session_start();
require_once 'requete.php';
$pseudo = NULL;
if (isset($_SESSION["utilisateur"])) {
    $pseudo = $_SESSION["utilisateur"]["pseudo"];
    $id_client=$_SESSION["utilisateur"]["id"];
}
$produits=getProduit();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
    <?php include_once '_partials/menu.php' ?>


    <!--    Présentation-->
    <!-- a supprimer -->
    <h1>revoir l'affichage des goodies ( 2-2 les cards ) + boutons  + faire panier</h1>


    <section class="presentation ">
        <div class="container text-center mt-5">
            <div class="row ">
                <div class="col col-lg-6 col-md-none ">
                    <h1 class="text-start">Mix Production</h1>
                    <h3 class=" text-start">Une société de production audiovisuelle</h3>
                    <h5 class=" text-start">Mélangez vos idées et nous les créons !</h5>


                    <p class="mt-4">
                        Mix Production est une entreprise qui a pour but de faire voir le jour à toutes vos idées ! Et cela peu
                        importe le domaine d'activité, nous ferons tout pour vous donner la visibilité que vous cherchez afin
                        de promouvoir votre société, un produit ou même une émission !  <span class="fw-bold"> Si nos créations et nos valeurs
                            vous correspondent, contactez-nous afin de faire un devis pour mettre en pratique vos idées !
                        </span>
                    </p>
                </div>
                <div class="col d-none d-lg-block">
                    <img src="./assets/image/banner-audiovisuel.jpg" class=" w-100 my-auto rounded-5 m-5" alt="...">
                </div>
                <div class="d-grid gap-2 d-md-block me-5 my-5">
                    <button class="btn btn-outline-dark px-3 rounded-pill" type="button"><a href="pages/contact.php" class="link-underline link-underline-opacity-0 text-black">Nous contacter</a></button>
                </div>            </div>
        </div>
    </section>

    <!--  Qui sommes nous ? -->
    <section id="quisommesnous" class="bg-light">
        <div class="container">
            <div class="d-flex">
                <div class="d-flex w-200">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/image/equipe1.jpg" class="d-block" height="550" width="750" alt=" equipe 1">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/image/equipe2.jpg" class="d-block" height="550" width="750" alt="equipe 2">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/image/equipe3.jpg" class="d-block" height="550" width="750" alt="equipe 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="ms-5 my-auto">
                    <div class="text-center">
                        <h2 class="mb-5"> Qui sommes nous ?</h2>
                        <p class="fs-5">
                             Mix production est une entreprise innovante de l'audiovisuelle qui a pour but
                            d'aider les  autres entreprises à se faire connaître ainsi qu'à développer leur image en améliorant leur communication.</p>
                        <br>
                        <p class="fst-italic">
                            Mix production est créé en 2020 par un jeune entrepreneur qui a déjà ouvert une première entreprise. Après un premier échec,
                            notre directeur a voulu surmonter les anciens problèmes et défis qu'il a pu rencontrer et aider les autres entreprises à faire de même.
                        </p>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <button class="btn btn-outline-dark px-3 rounded-pill" type="button"><a href="pages/equipe.php" class="link-underline link-underline-opacity-0 text-black">La fine équipe</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Offres -->
    <section id="tarifs" class=" mt-5 mb-5">
        <div class="container">
            <h2><strong>Quelques'un de nos goodies</strong> </h2>
            <p  class="mb-5"> Acheter nos goodies pour nous représenter partout on vous irez !</p>

            <div class="row ">
                    <?php
                    foreach ($produits as $produit):
                    $id_produit=$produit["id_produit"];
                    $designation=$produit["designation"];
                    $populaire=$produit["populaire"];
                    $commentaire=$produit["commentaire"];
                    $prix=$produit["prix"];
                    $img=$produit["photo"];
                    ?>
                    <div class="col-lg-5 p-0 me-5">
                        <div class="card text-center mt-5 pb-3
                             <?php if($populaire==TRUE):
                                 echo (' border-primary"><p class="text-primary  border-bottom my-2 pb-2 ">Le plus populaire</p>');
                             else:
                                 echo (' border ">');
                             endif;?>
                            <h5 class="card-title text-black  pt-4"><?=$designation?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary "><?=$commentaire?></h6>
                            <img class="card-img-top" src="<?=$img?>" alt="Card image ">
                            <h1 class="text-primary my-4 fw-bold"><?=$prix?>€</h1>
                            <?php
                            if (isset($_SESSION["utilisateur"])): ?>
                                <div class="m-3">
                                    <button type="button" class=" p-2 btn btn-outline-primary mb-2">
                                        <a class="link-underline link-underline-opacity-0" href="pages/qte_panier.php?id_produit=<?= $produit["id_produit"] ?>" Ajouter au panier </a>
                                    </button>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php endforeach;?>
            </div>

<!---->
<!--                -->
<!--                <div class=" col-lg-5 p-0 me-5">-->
<!--                    <div class="card  text-center border border-primary border-3 pb-3 ">-->
<!--                        <h5 class="card-title  pt-4">Tasse</h5>-->
<!--                        <h6 class="card-subtitle mb-2 text-body-secondary ">Pour vos meilleure café</h6>-->
<!--                        <img class="card-img-top" src="assets/image/goodie-mug.png" alt="Card image tasse">-->
<!--                        <h1 class="text-primary my-4 fw-bold">4.99€</h1>-->
<!---->
<!--                        --><?php
//                        if (isset($_SESSION["utilisateur"])): ?>
<!--                            <div class="m-3">-->
<!--                                <button type="button" class=" p-2 btn btn-outline-primary mb-2">-->
<!--                                    Ajouter au panier-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        --><?php //endif;?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-5 p-0 me-5">-->
<!--                    <div class="card  text-center border mt-5 pb-3">-->
<!--                        <h5 class="card-title  pt-4">Gourde</h5>-->
<!--                        <h6 class="card-subtitle mb-2 text-body-secondary ">Rester hydrater même pendant vos déplacement</h6>-->
<!--                        <img class="card-img-top" src="assets/image/goodie-gourde.png" alt="Card image gourde" >-->
<!---->
<!--                        <h1 class="text-primary my-4 fw-bold">10.99€</h1>-->
<!--                        --><?php
//                        if (isset($_SESSION["utilisateur"])): ?>
<!--                            <div class="m-3">-->
<!--                                <button type="button" class=" p-2 btn btn-outline-primary mb-2">-->
<!--                                    Ajouter au panier-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        --><?php //endif;?>
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-5 p-0 me-5">-->
<!--                    <div class="card  text-center border mt-5 pb-3">-->
<!--                        <h5 class="card-title  pt-4">Sac</h5>-->
<!--                        <h6 class="card-subtitle mb-2 text-body-secondary ">Transporter facilement tout nos goodies</h6>-->
<!--                        <img class="card-img-top" src="assets/image/goodie-sac.png" alt="Card image sac" >-->
<!---->
<!--                        <h1 class="text-primary my-4 fw-bold">2.50€</h1>-->
<!---->
<!--                        --><?php
//                        if (isset($_SESSION["utilisateur"])): ?>
<!--                            <div class="m-3">-->
<!--                                <button type="button" class=" p-2 btn btn-outline-primary mb-2">-->
<!--                                    Ajouter au panier-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        --><?php //endif;?>
<!--                    </div>-->
<!--                </div>-->
            </div>
    </section>

    <!--  Activités -->
    <section>
        <div class="container bg-light">
            <div class="row mb-5 text-black">
                <h2><strong>Nos productions</strong> </h2>
                <p> Nous proposons nos services sur un large palette d'activités</p>
            </div>
            <div class="row ">
                <div class="col   col-xxl-4 mb-5" >
                    <div class=" card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                                <img class=" my-3 rounded-pill "  height="150" width="250" src="assets/image/sport.jpg" alt="image sport">
                        </a>
                            <p class="mb-3"><strong>Sport</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill" height="150" width="250" src="assets/image/documentaire.jpg" alt="image documentaire">

                        </a>
                        <p class="mb-3"><strong>Documentaire</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/interview.jpg" alt="image interview">
                        </a>
                        <p class="mb-3"><strong>Interview</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/pub.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Pub</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/mode.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Mode</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/auto.jpg" alt="image pub">
                        </a>
                        <p class="mb-3 "><strong>Automobile</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/evenement.jpg" alt="image pub">
                        </a>
                        <p class="mb-3 "><strong>Évènement</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/tele.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Télévision</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/tourisme.jpg" alt="image pub">
                        </a>
                        <p class="mb-3 "><strong>Tourisme</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/musique.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Musique</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/montage.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Montage</strong></p>
                    </div>
                </div>
                <div class="col  col-xxl-4 mb-5">
                    <div class="card bg-secondary align-items-center">
                        <a class="" href="#" target="_blank" >
                            <img class=" my-3 rounded-pill " height="150" width="250" src="assets/image/nouveauformat.jpg" alt="image pub">
                        </a>
                        <p class="mb-3"><strong>Nouveau format</strong></p>
                    </div>
                </div>
                <p class="text-end"><strong> Et bien plus encore                                           <svg viewBox="0 0 24 8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <!--
                            Author: Maximilian Duartes
                            Web: topan.com.ar
                          -->
                            <style>
                                @keyframes loader-18 {

                                    0% {
                                        transform: scale(1) rotateZ(0)
                                    }

                                    50% {
                                        transform: scale(1.5) rotateZ(180deg)
                                    }

                                    100% {
                                        transform: scale(1) rotateZ(360deg)
                                    }

                                }
                            </style>
                            <g style="animation:loader-18 1s ease-out infinite both;transform-origin:4px;animation-delay: 0s;">
                                <circle cx="4" cy="4" r="1.5" fill="#0A0A30" />
                            </g>
                            <g style="animation:loader-18 1s ease-out infinite both; transform-origin:11px;animation-delay: .3s;">
                                <circle cx="11" cy="4" r="1.5" fill="#0A0A30" />
                            </g>
                            <g style="animation:loader-18 1s ease-out infinite both;transform-origin:18px;animation-delay: .6s;">
                                <circle cx="18" cy="4" r="1.5" fill="#0A0A30" />
                            </g>

                        </svg>                                      </strong></p>
            </div>
    </section>
    <!--    Avis-->
    <section id="avis" class="">
        <div class="text-center">
            <div class="mb-5">
                <h2> <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><style>@keyframes jello{0%,to{transform:scale3d(1,1,1)}30%{transform:scale3d(1.25,.75,1)}40%{transform:scale3d(.75,1.25,1)}50%{transform:scale3d(1.15,.85,1)}65%{transform:scale3d(.95,1.05,1)}75%{transform:scale3d(1.05,.95,1)}}</style><path stroke="#0A0A30" stroke-width="1.5" d="M11.081 5.141c.347-.807 1.491-.807 1.838 0l1.274 2.97a1 1 0 00.828.601l3.218.295c.875.08 1.229 1.168.568 1.748l-2.43 2.13a1 1 0 00-.316.972l.714 3.152c.194.857-.732 1.53-1.487 1.08l-2.776-1.653a1 1 0 00-1.024 0l-2.776 1.653c-.755.45-1.681-.223-1.487-1.08l.715-3.152a1 1 0 00-.317-.973l-2.43-2.13c-.66-.579-.307-1.667.568-1.747l3.218-.295a1 1 0 00.828-.601l1.274-2.97z" style="animation:jello 1s both infinite cubic-bezier(.69,.34,.09,.6);transform-origin:center"/></svg>
                    </i> Avis</h2>
                <h5 class="text-secondary">L'avis de nos précédents clients </h5>
            </div>
            <div class="text-start mx-auto   w-75">
                <ul class="list-group">
                    <li class="list-group-item my-3">
                    <span class=" mb-2 ">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i><i class="bi bi-star"></i>
                    </span>
                        <h4 class="fs-4">Je recommande vivement j'ai été extrêmement satisfait!!</h4>
                        <p class="fs-6">
                            Il me fallait une équipe pour un tournage avec mes anciens associés est partie 1 jour avant mon tournage et ils ont pu m'aider et faire un excellent travail!                            <span class="fs-6 fst-italic text-secondary">
                                <br>Avis de Edouard, le 23/01/2024
                            </span>
                        </p>
                    </li>
                    <li class="list-group-item my-3">
                    <span class=" mb-2 ">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i><i class="bi bi-star"></i>
                    </span>
                        <h4 class="fs-4">J'adore, je peux maintenant attirer un maximum de clients avec ma pub !</h4>
                        <p class="fs-6">

                            J'avais demandé un PUB pour les nouveaux shampoings de mon entreprise. Ils ont réussi à m'attirer beaucoup de client! J'adore et je recommande!<br>
                            <span class="fs-6 fst-italic text-secondary">
                                Avis de Maxime, le 12/09/2023
                            </span>
                        </p>
                    </li>

                    <li class="list-group-item my-3">
                    <span class=" mb-2 ">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </span>
                        <h4 class="fs-4">Excellent travail, un projet rendu en avance!</h4>
                        <p class="fs-6">
                            Après avoir fait un devis pour un documentaire animalier, le projet devait être fini après 1 mois et demi, ils ont pu me le rendre
                            2 semaines en avance!
                            <br>
                            <span class="fs-6 fst-italic text-secondary">
                                Avis de Phong, le 03/11/2023
                            </span>
                        </p>
                    </li>
                </ul>
            </div>

        </div>

    </section>



    <!--Insertion d'un footer-->
    <?php include_once '_partials/footer.php' ?>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
