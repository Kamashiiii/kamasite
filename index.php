<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>kamasite</title>
</head>

<body>
    <h1>Kamasite</h1>







    <?php
    include("./functions.php");
    include("./db.php");
    include("./showplayer.php");

    $listPlayers = [
        "Skorlex",
        "Le_Pape",
        "Spetnix",
        "xPeyo",
        "HmmRekt",
        "ThorFall_",
        "horri",
        "KaoriMiyazono",
        "Posey",
        "pehi",
        "SuperJuif",
        "Akouilles",
        "Kentokk",
        "Orlexes",
        "Bitosaure",
        "LaLimaceSauvage",
        "Alexony_"
    ];

    // Si tu veux réinsérer
    //insertPlayers($listPlayers,$conn);

    showPlayersBedwars($conn);
    
    ?>
</body>
      <script src='./main.js'></script>
</html>