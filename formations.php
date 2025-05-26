<div class="cv-container"> <!-- Conteneur principal pour le CV -->
    <br><br><br> <!-- Ajout de sauts de ligne pour créer de l'espace -->
    <center> <!-- Centre le contenu suivant -->
    <h2 class="formation-title">FORMATIONS</h2> <!-- Titre centré des formations -->
    </center> <!-- Fin du centrage -->
    <section class="formations"> <!-- Section pour afficher les formations -->
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

        // Vérifier la connexion
        if (!$conn) {
            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }

        // Récupérer les formations triées par ID de formation
        $req_formations = "SELECT * FROM formation WHERE fo_id_eleve = 1 ORDER BY id_formation";
        $res_formations = $conn->query($req_formations);

        // Initialiser la variable $section_id
        $section_id = 1;

        // Boucle pour afficher chaque formation
        while ($formation = $res_formations->fetch_assoc()) {
            // Créer un ID unique pour la section
            $section_id_attr = 'formationitem' . $formation['id_formation'];

            // Afficher la section avec son ID unique
            echo '<div class="formation-item" id="' . $section_id_attr . '">'; // Début de la section de formation
            echo '<h3 class="formation-heading">' . $formation['fo_nom_formation'] . '</h3>'; // Affichage du nom de la formation
            echo '<img src="' . $formation['image'] . '" height="' . $formation['image_height'] . '" width="' . $formation['image_width'] . '" alt="' . $formation['fo_nom_formation'] . '" class="formation-image">'; // Affichage de l'image de la formation
            echo '<p class="formation-description">' . $formation['fo_resume'] . '</p>'; // Affichage du résumé de la formation
            echo '<p class="formation-description">' . $formation['text2'] . '</p>'; // Affichage du deuxième paragraphe de la formation
            echo '<img src="' . $formation['photo2'] . '" height="' . $formation['image_height2'] . '" width="' . $formation['image_width2'] . '" alt="' . $formation['fo_nom_formation'] . '" class="image-no-border">'; // Affichage de la deuxième image de la formation
            echo '</div>'; // Fin de la section de formation

            // Incrémenter la variable pour générer un nouvel ID unique pour la prochaine section
            $section_id++;
        }
        ?>
    </section> <!-- Fin de la section des formations -->
</div> <!-- Fin du conteneur principal pour le CV -->
