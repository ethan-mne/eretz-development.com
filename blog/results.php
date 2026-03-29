<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <!-- Add links to Bootstrap CSS files here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add a link to your external style file here -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="text-center mb-4">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50.000000px" height="87.000000px"
                viewBox="0 0 50.000000 87.000000" preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,87.000000) scale(0.100000,-0.100000)" fill="#754d2a" stroke="none">
                    <path
                        d="M162 847 c-19 -6 -53 -29 -77 -53 -69 -67 -77 -108 -73 -381 3 -212 5 -231 25 -269 95 -178 330 -178 426 1 20 37 22 57 25 260 4 245 -3 302 -48 363 -56 77 -177 112 -278 79z m148 -17 c49 -13 109 -66 131 -114 16 -36 19 -69 19 -280 0 -223 -1 -243 -21 -283 -27 -56 -62 -83 -109 -83 -66 0 -138 67 -160 150 -16 58 -7 178 18 233 17 37 18 47 7 47 -20 0 -61 -66 -75 -120 -26 -98 -3 -204 57 -261 49 -47 73 -59 119 -59 28 0 35 -3 27 -11 -6 -6 -38 -11 -71 -12 -74 0 -139 34 -180 95 l-27 41 -3 230 -3 230 33 -35 c18 -19 61 -50 96 -68 84 -45 132 -98 132 -148 0 -40 -12 -63 -45 -80 -11 -6 -15 -12 -9 -12 19 0 78 45 92 70 23 44 8 100 -36 142 -22 20 -37 40 -34 43 4 3 0 4 -8 0 -19 -7 -137 70 -163 106 -30 42 -25 98 12 131 17 15 40 28 51 28 11 0 20 4 20 9 0 20 76 26 130 11z" />
                    <path
                        d="M257 779 c12 -13 26 -35 32 -49 9 -23 10 -22 10 14 1 22 -2 36 -6 33 -3 -4 -18 0 -32 9 l-26 17 22 -24z" />
                    <path
                        d="M407 519 c12 -13 26 -35 32 -49 9 -23 10 -21 10 18 1 26 -3 41 -9 37 -5 -3 -20 -1 -32 6 l-23 12 22 -24z" />
                    <path d="M50 348 c0 -17 7 -27 20 -31 18 -5 18 -4 3 22 -10 14 -18 28 -20 30 -2 2 -3 -7 -3 -21z" />
                </g>
            </svg>
        </div>
        <div class="result-container container" style="padding-top:150px;">
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

    echo '<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="container text-center">';

    if (!empty($suggestions)) {
        
        echo '<ul class="list-group">';
        foreach ($suggestions as $suggestion) {
            echo '<li class="list-unstyled restext">' . $suggestion . '</li>';
        }
        echo '</ul>';
    }

    if (!empty($message['message'])) {
        echo '<p class="mt-3 para">' . $message['message'] . '</p>';
    }
    if (!empty($table_number['table_number'])) {
        echo '<p class="mt-3 par">TABLE </p>';
        echo '<p class="tb">' . $table_number['table_number'] . '</p>';
    }

    echo '</div></body>';
}

// Fermer la connexion
$connexion->close();
            ?>
        </div>
    </div>

    <!-- Add links to Bootstrap JS files here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
