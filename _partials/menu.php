<nav class="navbar navbar-expand-md bg-light  sticky-top ">
    <div class="container-fluid ">
        <a class="navbar-brand m3-3" href="../index.php">
            <img src="../assets/image/mix-production.png" alt="logo" width="60" height="60" class="rounded-pill">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-auto mb-2 mb-md-0 justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item mx-3">
                    <a class="nav-link active text-black" href="../index.php">Accueil</a>
                </li>

                        <li class="nav-item mx-3">
                            <a class="nav-link active text-black" href="../pages/equipe.php">Notre équipe</a>
                        </li>



                    <li class="nav-item mx-3">
                        <a class="nav-link active text-black" href="../pages/contact.php">Contact</a>
                    </li>


                <?php
                if (!(isset($_SESSION["utilisateur"]))): ?>
                    <li class="nav-item mx-3">
                        <a class="nav-link active text-black" href="../pages/inscription.php">Inscription</a>
                    </li>
                <?php endif;

                if (!(isset($_SESSION["utilisateur"]))): ?>
                    <li class="nav-item mx-3">
                        <a class="nav-link active text-black" href="../pages/connexion.php">Connexion</a>
                    </li>
                <?php endif;


                if (isset($_SESSION["utilisateur"])): ?>

                    <li class="nav-item mx-3">
                        <a class="nav-link active text-black" href="../pages/panier.php">Panier</a>
                    </li>

                <?php endif;


                if (isset($_SESSION["utilisateur"])): ?>
                    <li class="nav-item mx-3">
                        <a class="nav-link active text-black" href="../pages/deconnexion.php">Déconnexion</a>
                    </li>
                <?php endif;
                ?>
            </ul>
        </div>
    </div>
</nav>
<?php if (isset($_SESSION["utilisateur"])): ?>
    <p class="fst-italic text-end me-5 mt-3">Vous êtes connecté en tant que <span class="text-primary"><?=$pseudo ?></span> !!</p>
<?php endif ?>
