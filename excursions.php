<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div id="navbar">
        <menu>
            <li><a href="dashboard.php">Planning</a></li>
            <li><a href="excursions.php">Excursions</a></li>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Randonneurs</a></li>
            <li><a href="#">Regions</a></li>
        </menu>
    </div>

    <div id="rightPage">
        <h1>Nouvelle Excursion</h1>
        <div>
            <Label for="nom">Nom</Label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <Label for="nom">Date Départ</Label>
            <input type="text" name="date-d" id="date-d">
        </div>
        <div>
            <Label for="nom">Date Arrivée</Label>
            <input type="text" name="date-a" id="date-a">
        </div>
        <div>
            <Label for="nom">Lieu Départ</Label>
            <input type="text" name="date-d" id="date-d">
        </div>
        <div>
            <Label for="nom">Lieu Arrivée</Label>
            <input type="text" name="date-a" id="date-a">
        </div>
        <div>
            <Label for="nom">Tarif</Label>
            <input type="text" name="date-a" id="date-a">
        </div>
        <div>
            <Label for="nom">Participants Max</Label>
            <input type="text" name="date-a" id="date-a">
        </div>
        <button>Valider</button>
    </div>
</body>
</html>