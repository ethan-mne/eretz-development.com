<?php
// Remplacez ces valeurs par les vôtres
$serveur = "212.1.211.101";
$utilisateur = "u662656180_mytable";
$mot_de_passe = "zD5g/98]G";
$base_de_donnees = "u662656180_mytable";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Initialisation des variables
$resultats = [];
$message = '';
$table_number='';

// Traitement de la recherche
if (isset($_GET['recherche'])) {
    $recherche = $connexion->real_escape_string($_GET['recherche']);

    if (empty($recherche) || strlen($recherche) < 2) {
        echo '<head> <link rel="stylesheet" href="style.css">
        </head>';
        echo '<p class="mt-3 para">Aucun résultat</p>';
        exit;
    }
    
    // Requête SQL pour rechercher des suggestions dans la colonne spécifique (remplacez 'nom_de_la_colonne' par le nom réel de votre colonne)
    $requete_suggestions = "SELECT `full_name` FROM `guests` WHERE `full_name` LIKE '%$recherche%' LIMIT 5";
    
    $resultat_suggestions = $connexion->query($requete_suggestions);
    
    if ($resultat_suggestions->num_rows === 0) {
        echo '<head> <link rel="stylesheet" href="style.css">
        </head>';
        echo '<p class="mt-3 para">Aucun résultat</p>';
        exit;
    }

    $suggestions = [];
    while ($ligne_suggestion = $resultat_suggestions->fetch_assoc()) {
        $suggestions[] = $ligne_suggestion['full_name'];
    }

    // Requête pour récupérer les détails de la personne
    $requete_details = "SELECT `message` FROM `guests` WHERE `full_name` = '$recherche'";
    
    $resultat_details = $connexion->query($requete_details);

    if ($resultat_details!==false && $resultat_details->num_rows > 0) {
        $message = $resultat_details->fetch_assoc();
    }
    $requete_details = "SELECT LPAD(`table_number`, 2, '0') AS table_number FROM `guests` WHERE `full_name` = '$recherche'";

    
    $resultat_details = $connexion->query($requete_details);

    if ($resultat_details!==false && $resultat_details->num_rows > 0) {
        $table_number = $resultat_details->fetch_assoc();
    }

    // Afficher les suggestions et le message avec Bootstrap styles
    echo '<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherche dans la base de données avec suggestions</title>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <link rel="stylesheet" href="style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=The+Seasons&display=swap" rel="stylesheet">
          </head>';
    echo '<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="container text-center">';

    if (!empty($suggestions)) {
        
        echo '<ul class="list-group">';
        foreach ($suggestions as $suggestion) {
            echo '<li class="list-unstyled text">' . $suggestion . '</li>';
        }
        echo '</ul>';
    }

    if (!empty($message['message'])) {
        echo '<p class="mt-3 para">' . $message['message'] . '</p>';
    }
    if (!empty($table_number['table_number'])) {
        echo '<p class="mt-3 par">Table <span class="tb">' . $table_number['table_number'] . '</span></p>';
    }

    echo '</div></body>';
}


// Fermer la connexion
$connexion->close();
?>
