<?php
session_start();
$pseudo = NULL;
if (isset($_SESSION["utilisateur"])) {
    $pseudo = $_SESSION["utilisateur"]["pseudo"];
}
// Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_GET
//$_SERVER : tableau associatif contenant des inforlations sur la requête

$erreurs = [];
$email = "";
$nom = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Le formluaire a été soumis !
    // Traiter les données du formulaire
    // Récupérer les valeurs saisies par l'utilisateur
    // Superglobal $_POST: tableau associatif

    $nom = $_POST['nom'];
    $email = $_POST['email'];

    // Validation des données

    if (empty($nom)) {
        $erreurs['nom'] = "Le nom est olbigatoire !";
    }
    if (empty($email)) {
        $erreurs['email'] = "L'email est olbigatoire !";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'email n'est pas valide !";
    }

    // Traiter les données

    if (empty($erreurs)) {
        // Traitement des données ( insertion dans une base de données )
        // Rediriger l'utilisateur vers une autre page du site ( souvent page d'accueil )
        header(header: "Location: ../index.php");
        exit();
    }
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

<section >
    <div class="container">
        <h1 class="text-center my-5 ">Nous contacter</h1>
        <div class="d-flex">
                <div class=" w-50 mx-auto shadow p-5 bg-white mb-5">
                    <form action="" method="post" novalidate>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom *</label>
                            <input type="text"
                                   class="form-control <?= (isset($erreurs['nom'])) ? 'border border-2 border-danger' : '' ?>"
                                   id="nom" name="nom" value="<?= $nom ?>" placeholder="Martin">
                            <?php if (isset($erreurs['nom'])): ?>
                                <p class='form-text text-danger'><?= $erreurs['nom'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email"
                                   class="form-control <?= (isset($erreurs['email'])) ? 'border border-2 border-danger' : '' ?>"
                                   id="email"
                                   name="email" value="<?= $email ?>" aria-describedby="emailAide"
                                   placeholder="jean.martin@gmail.com">
                            <?php if (isset($erreurs['email'])): ?>
                                <p class='form-text text-danger'><?= $erreurs['email'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div id="emailAide" class="form-text mb-3">Ne partagez jamais votre adresse email.</div>
                        <div class="mb-3">
                            <label for="objet" class="form-label">Objet</label>
                            <select id="objet" class="form-select" name="objet">
                                <option> --- </option>
                                <option>Ajouter offre</option>
                                <option>Problème site web</option>
                                <option>Demande de renseignement</option>
                                <option>Recherche d'emploi / stage</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Comment pouvons-nous vous aider ? " rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-dark mt-3   ">Valider</button>
                    </form>
                </div>
            <div class="ms-5 my-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.8810779078176!2d6.024175912520937!3d47.23847201320485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478d633c76b79f7d%3A0x2bb22ed360ed629a!2s8%20Rue%20Morand%2C%2025000%20Besan%C3%A7on!5e0!3m2!1sen!2sfr!4v1709632001423!5m2!1sen!2sfr"
                        width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
        <div class="d-flex bg-light mx-auto m-5 w-75 rounded-pill ">
            <div class="mx-auto py-3">
                <p class="">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><style>@keyframes phone{0%,to{transform:rotate(0deg);transform-origin:0 100%}10%,90%{transform:rotate(2deg)}20%,40%,60%{transform:rotate(-4deg)}30%,50%,70%{transform:rotate(4deg)}80%{transform:rotate(-2deg)}}</style><path fill="#0A0A30" d="M15.758 19a10.761 10.761 0 01-7.603-3.162A10.805 10.805 0 015 8.22c0-.854.339-1.673.941-2.277A3.21 3.21 0 018.214 5c.18-.001.36.015.537.05.172.024.34.067.503.125a.699.699 0 01.455.525l.957 4.2a.7.7 0 01-.182.644c-.09.098-.098.105-.957.553a6.93 6.93 0 003.402 3.423c.454-.868.461-.875.559-.966a.699.699 0 01.643-.182l4.191.959a.699.699 0 01.503.455A3.046 3.046 0 0119 15.829a3.223 3.223 0 01-.968 2.255 3.21 3.21 0 01-2.274.916zM8.215 6.4a1.822 1.822 0 00-1.817 1.82 9.396 9.396 0 002.744 6.63 9.36 9.36 0 006.617 2.75 1.821 1.821 0 001.817-1.82v-.231l-3.242-.75-.202.386c-.315.609-.545 1.05-1.132.812a8.276 8.276 0 01-5.016-5.047c-.251-.546.224-.798.824-1.113l.385-.189L8.444 6.4h-.23z" style="animation:phone 1.5s cubic-bezier(1,.01,.75,2.17) both infinite"/></svg>
                    </i> 03 89 56 65 24</p>
                <p>  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><style>@keyframes open{0%{transform:translateX(10px) scale(0);transform-origin:50% 100%}to{transform:scale(1);transform-origin:50% 100%}}</style><rect width="12" height="10" x="6" y="8.804" stroke="#0A0A30" stroke-width="1.5" rx="2"/><path fill="#fff" stroke="#265BFF" stroke-width="1.5" d="M9 6.196a1 1 0 011-1h4a1 1 0 011 1v5.082a1 1 0 01-.37.777l-2.006 1.628a1 1 0 01-1.263-.002l-1.993-1.626A1 1 0 019 11.28V6.196z" style="animation:open 2s cubic-bezier(.49,.39,.35,1.06) both infinite"/><path stroke="#0A0A30" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.465 11.413l3.573 2.783 3.497-2.783"/></svg>
                    <a class="text-black link-underline link-underline-opacity-0" href="mailto:mixproduction@gmail.com">mixproduction@gmail.com</a>
                </p>
                <p class="">  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><style>@keyframes slide-right{0%{transform:translateY(0)}to{transform:translateY(-2px)}}</style><g style="animation:slide-right 1s cubic-bezier(.75,.02,.2,1.06) infinite alternate both" stroke-width="1.5"><path stroke="#0A0A30" d="M17 10.193c0 2.867-4.5 8.307-5 8.307s-5-5.44-5-8.307C7 7.325 9.239 5 12 5s5 2.325 5 5.193z"/><circle cx="12" cy="10" r="2" stroke="#265BFF"/></g></svg>
                    8 Rue Morand, 25000 Besançon </p>
            </div>
    </div>
</section>

<!--Insertion d'un menu-->
<?php include_once '../_partials/footer.php' ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>