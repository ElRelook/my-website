<div class="cv-container">
    <div class="head" style="background-image: url('images/fond.jpg');">
        <div class="content">
            <div class="row">
                <?php
                // Connexion à la base de données
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

                // Vérification de la connexion
                if (!$conn) {
                    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
                }

                // Requête SQL pour récupérer les informations sur l'étudiant
                $req_info = "SELECT * FROM eleves WHERE id_eleve = 1"; // Remplacez 1 par l'ID de l'élève concerné

                // Exécution de la requête
                $res_info = mysqli_query($conn, $req_info);

                // Vérification des résultats
                if (mysqli_num_rows($res_info) > 0) {
                    // Affichage des informations sur l'étudiant
                    while ($row_info = mysqli_fetch_assoc($res_info)) {
                        echo '<div class="col-md-6">';
                        echo '<a href="https://www.linkedin.com/in/clément-basdevant-253357230" target="_blank">';
                        echo '<br><br><br><br><br><br><br><br>';
                        echo '<center>';
                        echo '<img src="' . $row_info['photo'] . '" height="273" width="273" style="border-radius: 50%;" />';
                        echo '</center>';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<div style="text-align: left;">';
                        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                        echo '<div style="border: 2px solid #000; padding: 20px; border-radius: 10px;">';
                        echo '<h1 style="font-size: 2.5rem; font-weight: bold; color: #000; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); letter-spacing: 1px;">' . $row_info['prenom'] . ' ' . $row_info['nom'] . '</h1>';
                        echo '<h3 style="color:#000000; font-size: 1.5rem;">' . $row_info['el_text'] . '</h3>';
                        echo '</div>';
                        echo '<br><br><br><br><br><br><br><br>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Aucune information trouvée sur l'étudiant.";
                }

                // Fermeture de la connexion
                mysqli_close($conn);
                ?>
            </div>
        </div>

    </div>

    <div id="a-propos-de-moi" class="left-column">
        <center>
            <h2 style="color: #333333; font-size: 3rem; font-weight: bold; font-family: 'Montserrat', sans-serif;">À propos de moi</h2>
        </center>

        <?php
        $conn = mysqli_connect('127.0.0.1','root','','cv');

        // Vérifier la connexion
        if (!$conn) {
            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }

        // Récupérer le profil personnel
        $req_profil = "SELECT * FROM coordonnees WHERE co_id_eleve = 1";

        $res_profil = $conn->query($req_profil);

        if (!$res_profil) {
            die("Erreur lors de l'exécution de la requête : " . $conn->error);
        }

        if ($res_profil->num_rows > 0) {
            $profil = $res_profil->fetch_assoc();
        } else {
            die("Aucun profil trouvé pour l'élève spécifié.");
        }
        ?>

        <h2 style="color: #333333; font-size: 2rem; font-weight: bold; font-family: 'Montserrat', sans-serif;">Profil personnel</h2>
        <p style="text-align: justify;"><?php echo isset($profil['text1']) ? $profil['text1'] : ''; ?></p>
        <p style="text-align: justify;"><?php echo isset($profil['text2']) ? $profil['text2'] : ''; ?></p>

        <div class="contact-card">
            <h2 style="color: #333333; font-size: 2rem; font-weight: bold; font-family: 'Montserrat', sans-serif;">Coordonnées</h2>
            <a href="https://www.linkedin.com/in/clément-basdevant-253357230"<?php echo isset($profil['linkedin']) ? $profil['linkedin'] : ''; ?>" target="_blank">
                <i class="fab fa-linkedin"></i> <?php echo isset($profil['linkedin']) ? $profil['linkedin'] : ''; ?>
            </a>
            <br>
            <a href="tel:<?php echo isset($profil['co_telephone']) ? $profil['co_telephone'] : ''; ?>"><i class="fas fa-phone-alt"></i> <?php echo isset($profil['co_telephone']) ? $profil['co_telephone'] : ''; ?></a><br>
            <a href="https://www.google.com/maps/search/?api=1&query=<?php echo isset($profil['co_adresse']) ? urlencode($profil['co_adresse']) : ''; ?>" target="_blank"><i class="fas fa-home"></i> <?php echo isset($profil['co_adresse']) ? $profil['co_adresse'] : ''; ?></a><br>
            <a href="mailto:<?php echo isset($profil['co_mail']) ? $profil['co_mail'] : ''; ?>"><i class="fas fa-envelope"></i> <?php echo isset($profil['co_mail']) ? $profil['co_mail'] : ''; ?></a>
        </div>

        <h2 style="color: #333333; font-size: 2rem; font-weight: bold; font-family: 'Montserrat', sans-serif;">Syst&egrave;mes d'information</h2>
        <div class="bubbles-container">
            <div class="bubble"><i class="fab fa-python"></i> Python</div>
            <div class="bubble"><strong>C</strong> C/C++</div>
            <div class="bubble"><strong>LATEX</strong></div>
            <div class="bubble">MATLAB</div>
            <div class="bubble"><i class="fab fa-java"></i> Java</div>
            <div class="bubble"><i class="fab fa-windows"></i> Microsoft Office</div>
        </div>

        <h2 style="color: #333333; font-size: 2rem; font-weight: bold; font-family: 'Montserrat', sans-serif;">Langues</h2>
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

        // Vérification de la connexion
        if (!$conn) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }

        // Requête SQL pour récupérer les langues de l'élève
        $req_langues = "SELECT * FROM langues WHERE la_id_eleve = 1"; // Remplacez 1 par l'ID de l'élève concerné

        // Exécution de la requête
        $res_langues = mysqli_query($conn, $req_langues);

        // Vérification des résultats
        if (mysqli_num_rows($res_langues) > 0) {
            echo "<div class=\"language-cards-container\">";

            // Affichage des langues
            while ($row_langues = mysqli_fetch_assoc($res_langues)) {
                echo "<div class=\"language-card\">";
                echo "<h3>" . $row_langues['la_langue'] . "</h3>";
                echo "<p class=\"language-level\">" . $row_langues['la_niveau'] . "</p>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "Aucune langue trouvée.";
        }
        ?>


        <div class="hobbies-container">
            <div class="hobby-card">
                <?php
                // Connexion à la base de données
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

                // Vérification de la connexion
                if (!$conn) {
                    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
                }

                // Requête SQL pour récupérer les loisirs de l'élève
                $req_loisirs = "SELECT * FROM loisirs WHERE lo_id_eleve = 1"; // Remplacez 1 par l'ID de l'élève concerné

                // Exécution de la requête
                $res_loisirs = mysqli_query($conn, $req_loisirs);

                // Vérification des résultats
                if (mysqli_num_rows($res_loisirs) > 0) {
                    echo "<h2>Loisirs</h2>";
                    echo "<ul>";

                    // Affichage des loisirs
                    while ($row_loisirs = mysqli_fetch_assoc($res_loisirs)) {
                        echo "<li><i class=\"fas fa-" . strtolower($row_loisirs['lo_sport']) . "\"></i> " . $row_loisirs['lo_sport'] . " - " . $row_loisirs['lo_commentaire'] . "</li>";
                    }

                    echo "</ul>";
                } else {
                    echo "Aucun loisir trouvé.";
                }

                // Fermeture de la connexion
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <div class="right-column">
        <?php
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

        // Vérifier la connexion
        if (!$conn) {
            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }

        // Récupérer les formations triées par ID de formation
        $req_formations = "SELECT * FROM formation WHERE fo_id_eleve = 1 ORDER BY id_formation";
        $res_formations = $conn->query($req_formations);

        if (!$res_formations) {
            die("Erreur lors de l'exécution de la requête : " . $conn->error);
        }

        ?>

        <div id="formation" class="formation">
            <h2 class="formation-title">Formation</h2>

            <?php
            while ($formation = $res_formations->fetch_assoc()) {
                echo '<div class="formation-item">';
                echo '<a href="index.php?page=formations">';

                echo '<h3>' . $formation['fo_nom_formation'] . '</h3>';
                echo '<img src="' . $formation['image'] . '" height="' . $formation['image_height'] . '" width="' . $formation['image_width'] . '" alt="' . $formation['fo_nom_formation'] . ' logo">';
                echo '<p>' . $formation['fo_resume'] . '</p>';
                echo '</a>';
                echo '</div>';
            }
            ?>

        </div>

        <div id="experience" class="experience">
            <h2 class="experience-title">Expérience professionnelle</h2>

            <?php
            $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

            // Vérifier la connexion
            if (!$conn) {
                die("Erreur de connexion à la base de données : " . mysqli_connect_error());
            }

            // Récupérer les expériences professionnelles
            $req_experiences = "SELECT * FROM experiences WHERE xp_id_eleve = 1"; // Remplacez 1 par l'identifiant de l'élève
            $res_experiences = $conn->query($req_experiences);

            if (!$res_experiences) {
                die("Erreur lors de l'exécution de la requête : " . $conn->error);
            }

            while ($experience = $res_experiences->fetch_assoc()) {
                echo '<div class="experience-item">';
                echo '<h3><a style="color: #B22222;" href="index.php?page=experiences">' . $experience['xp_entreprise'] . '</h3>';
                echo '<a href="' . $experience['URL'] . '" target="_blank">';
                echo '<img src="' . $experience['image'] . '" height="' . $experience['image_height'] . '" width="' . $experience['image_width'] . '" alt="' . $experience['xp_entreprise'] . ' logo">';
                echo '</a>';
                echo '<p>' . $experience['xp_resume'] . '</p>';
                echo '</div>';
            }

            mysqli_close($conn);
            ?>
        </div>

        <div class="experience">
            <center>
                <h2 style="color: #B22222; font-size: 3rem; font-weight: bold;">&Eacute;l&eacute;ments du Cursus</h2>
            </center>
            <ul>
                <?php
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

                // Vérification de la connexion
                if (!$conn) {
                    die("La connexion a échoué: " . mysqli_connect_error());
                }

                 // Requête pour récupérer les informations du cursus depuis la base de données
                $sql = "SELECT * FROM cursus";
                $result = $conn->query($sql);

                // Affichage des informations récupérées dans des bulles
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=\"experience-item\">";
                        echo "<h3>{$row["cu_classe"]}</h3>";
                        echo "<p>{$row["cu_cours_suivis"]}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class=\"experience-item\">Aucun élément trouvé dans le cursus.</div>";
                }

                // Fermeture de la connexion
                $conn->close();
                ?>
            </ul>
        </div>
    </div>
</div>
