<form id="contact" action="contact.php" method="POST"> <!-- Déclaration du formulaire avec méthode POST et action pointant vers le script PHP -->
    <div class="form-group"> <!-- Groupe de champs de formulaire -->
        <br><br><br> <!-- Ajout de sauts de ligne pour créer de l'espace -->
        <label for="nom">Nom:</label><br> <!-- Étiquette pour le champ nom -->
        <input type="text" id="nom" name="Nom" placeholder="Votre nom" required/> <!-- Champ de saisie pour le nom -->
    </div>
    <div class="form-group"> <!-- Groupe de champs de formulaire -->
        <label for="prenom">Prénom:</label><br> <!-- Étiquette pour le champ prénom -->
        <input type="text" id="prenom" name="Prénom" placeholder="Votre prénom" required/> <!-- Champ de saisie pour le prénom -->
    </div>
    <div class="form-group"> <!-- Groupe de champs de formulaire -->
        <label for="email">Email:</label><br> <!-- Étiquette pour le champ email -->
        <input type="email" id="email" name="email" placeholder="Votre email" required/> <!-- Champ de saisie pour l'email -->
    </div>
    <div class="form-group"> <!-- Groupe de champs de formulaire -->
        <label for="objet">Objet:</label><br> <!-- Étiquette pour le champ objet -->
        <input type="text" id="objet" name="objet" placeholder="Objet" required/> <!-- Champ de saisie pour l'objet -->
    </div>
    <div class="form-group"> <!-- Groupe de champs de formulaire -->
        <label for="message">Message:</label><br> <!-- Étiquette pour le champ message -->
        <textarea id="message" name="message" placeholder="Votre message..." rows="5" required></textarea> <!-- Champ de saisie pour le message -->
    </div>
    <button type="submit">Envoyer</button> <!-- Bouton de soumission du formulaire -->
</form>

<?php
// Connexion à la base de données
$conn = mysqli_connect('127.0.0.1', 'root', '', 'cv');

// Vérification de la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = isset($_POST['Nom']) ? $_POST['Nom'] : ''; // Récupération du nom
    $prenom = isset($_POST['Prénom']) ? $_POST['Prénom'] : ''; // Récupération du prénom
    $email = isset($_POST['email']) ? $_POST['email'] : ''; // Récupération de l'email
    $objet = isset($_POST['objet']) ? $_POST['objet'] : ''; // Récupération de l'objet
    $message = isset($_POST['message']) ? $_POST['message'] : ''; // Récupération du message

    // Préparation de la requête SQL d'insertion
    $sql = "INSERT INTO formulaire (nom, prenom, email, objet, message) VALUES ('$nom', '$prenom', '$email', '$objet', '$message')";

    // Exécution de la requête
    if (mysqli_query($conn, $sql)) {
        // Redirection vers la page de confirmation
        header("Location: index.php?page=confirmation");
        exit(); // Assurez-vous qu'aucune sortie supplémentaire n'est envoyée après cette ligne
    } else {
        echo "Erreur lors de l'insertion des données : " . mysqli_error($conn);
    }
}

// Fermeture de la connexion
mysqli_close($conn);
?>
