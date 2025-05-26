<div class="cv-container"> <!-- Conteneur principal pour le CV -->
    <br><br><br> <!-- Ajout de sauts de ligne pour créer de l'espace -->
    <center> <!-- Centre le contenu suivant -->
        <h2 class="formation-title">Experiences</h2> <!-- Titre centré des expériences -->
    </center> <!-- Fin du centrage -->
    <section class="formations"> <!-- Section pour afficher les expériences -->
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

        // Vérifier la connexion
        if (!$conn) {
            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }

        // Récupérer les expériences triées par ID d'expérience
        $req_experiences = "SELECT * FROM experiences WHERE xp_id_eleve = 1 ORDER BY id_experience";
        $res_experiences = $conn->query($req_experiences);

        // Boucle pour afficher les expériences
        while ($experience = $res_experiences->fetch_assoc()) {
            echo '<div class="experience-item">'; // Début de la section de l'expérience
            echo '<h3>' . $experience['xp_entreprise'] . ' - ' . $experience['xp_poste_attribue'] . '</h3>'; // Affichage de l'entreprise et du poste attribué
            echo '<img src="' . $experience['image'] . '" height="' . $experience['image_height'] . '" width="' . $experience['image_width'] . '" alt="' . $experience['xp_entreprise'] . '" class="experience-image">'; // Affichage de l'image de l'expérience
            echo '<p>' . $experience['xp_resume'] . '</p>'; // Affichage du résumé de l'expérience
            echo '<p>' . $experience['text2'] . '</p>'; // Affichage du deuxième paragraphe de l'expérience
            echo '<img src="' . $experience['image2'] . '" height="' . $experience['image_height2'] . '" width="' . $experience['image_width2'] . '" alt="' . $experience['xp_entreprise'] . '" class="experience-image">'; // Affichage de la deuxième image de l'expérience
            echo '</div>'; // Fin de la section de l'expérience
        }

        // Fermer la connexion
        $conn->close();
        ?>
    </section> <!-- Fin de la section des expériences -->
</div> <!-- Fin du conteneur principal pour le CV -->
