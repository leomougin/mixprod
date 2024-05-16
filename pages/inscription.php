
<?php
session_start();
require_once '../requete.php';

if (!empty($_SESSION)) {
    header( "Location: /");
}



// Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_GET
//$_SERVER : tableau associatif contenant des inforlations sur la requête

$erreurs = [];
$pseudo="";
$prenom = "";
$nom = "";
$email = "";
$adresse="";
$cp="";
$ville="";
$mdp = "";
$mdpconf = "";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Le formluaire a été soumis !
    // Traiter les données du formulaire
    // Récupérer les valeurs saisies par l'utilisateur
    // Superglobal $_POST: tableau associatif

    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email= $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    $mdpconf = $_POST['mdpconf'];
    $cp = $_POST['cp'];
    $ville=$_POST['ville'];


    // Validation des données
    if (empty($pseudo)) {
        $erreurs['pseudo'] = "Un pseudo est olbigatoire !";
    }
    if (empty($prenom)) {
        $erreurs['prenom'] = "Un prénom est olbigatoire !";
    }
    if (empty($nom)) {
        $erreurs['nom'] = "Un nom est olbigatoire !";
    }
    if (empty($adresse)) {
        $erreurs['adresse'] = "Une adresse est olbigatoire !";
    }
    if (empty($cp)) {
        $erreurs['cp'] = "Un code postal est olbigatoire !";
    }
    if (empty($ville)) {
        $erreurs['ville'] = "Une ville est olbigatoire !";
    }
    if (empty($email)) {
        $erreurs['email'] = "Un email est olbigatoire !";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'email n'est pas valide !";
    }elseif(checkMailExists($email)){
        $erreurs["email"]="Un utilisateur s'est déjà inscrit avec cette adresse email!";
    }
    if (empty($mdp)) {
        $erreurs['mdp'] = "Un mot de passe est olbigatoire !";
    }elseif(!isValidMDP($mdp)){
        $erreurs['mdp'] = "Votre mot de passe doit obligatoirement contenir 1 majuscule, 1 minuscule et 1 chiffre et faire entre 8 et 14 caractères !";
    }
    if (empty($mdpconf)) {
        $erreurs['mdpconf'] = "La confirmation de votre mot de passe est olbigatoire !";
    }elseif ($mdp!=$mdpconf){
        $erreurs['mdpconf'] = " Veuillez saisir le même mot de passe !";
    }
    // Traiter les données

    if (empty($erreurs)) {
        // Traitement des données ( insertion dans une base de données )

        addClient($nom,$prenom,$adresse,$cp,$ville,$email,$pseudo,$mdpHash);

        // Rediriger l'utilisateur vers une autre page du site ( souvent page d'accueil )
        header(header: "Location: ../index.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="fr"">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        body {
            font-family: 'Gluten', cursive;
        }
    </style>
    </style>
    <title>ahahhaha</title>
</head>
<body>

<!--Insertion d'un menu-->
<?php include_once '../_partials/menu.php' ?>
<h2 class="text-center mt-5">S'inscrire</h2>
<hr class="border border-danger border-1 opacity-75 mb-5">
<div class="container ">

    <div class=" w-50 mx-auto shadow p-5 bg-white rounded-5 ">
        <form class="text-black" action="" method="post" novalidate>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['prenom'])) ? 'border border-2 border-danger' : '' ?>"
                       id="prenom" name="prenom" value="<?= $prenom ?>" placeholder="John">
                <?php if (isset($erreurs['prenom'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['prenom'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['nom'])) ? 'border border-2 border-danger' : '' ?>"
                       id="nom" name="nom" value="<?= $nom ?>" placeholder="Martin">
                <?php if (isset($erreurs['nom'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['nom'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['pseudo'])) ? 'border border-2 border-danger' : '' ?>"
                       id="pseudo" name="pseudo" value="<?= $pseudo ?>" placeholder="j0hNdu77">
                <?php if (isset($erreurs['pseudo'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['pseudo'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['email'])) ? 'border border-2 border-danger' : '' ?>"
                       id="email" name="email" value="<?= $email ?>"
                       placeholder="john77@gmail.com">
                <?php if (isset($erreurs['email'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['email'] ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['adresse'])) ? 'border border-2 border-danger' : '' ?>"
                       id="adresse" name="adresse" value="<?= $adresse ?>"
                       placeholder="17 rue sous la Craie">
                <?php if (isset($erreurs['adresse'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['adresse'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="cp" class="form-label">Code Postal *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['cp'])) ? 'border border-2 border-danger' : '' ?>"
                       id="cp" name="cp" value="<?= $cp ?>"
                       placeholder="70000">
                <?php if (isset($erreurs['cp'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['cp'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville *</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs['ville'])) ? 'border border-2 border-danger' : '' ?>"
                       id="ville" name="ville" value="<?= $cp ?>"
                       placeholder="Villers-le-Sec">
                <?php if (isset($erreurs['ville'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['ville'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe *</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs['mdp'])) ? 'border border-2 border-danger' : '' ?>"
                       id="mdp" name="mdp" value="<?= $mdp ?>">
                <?php if (isset($erreurs['mdp'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['mdp'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="mdpconf" class="form-label">Confirmer le mot de passe *</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs['mdpconf'])) ? 'border border-2 border-danger' : '' ?>"
                       id="mdpconf" name="mdpconf" value="<?= $mdpconf ?>">
                <?php if (isset($erreurs['mdpconf'])): ?>
                    <p class='form-text text-danger'><?= $erreurs['mdpconf'] ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-outline-danger">Valider</button>
            <p class="mt-3 ">Si vous avez déjà un compte,<a href="connexion.php" class="text-black "> se connecter</a></p>
        </form>

    </div>
</div>
<?php include_once '../_partials/footer.php' ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>