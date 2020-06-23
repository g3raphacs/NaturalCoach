<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Connect to database  -->
    <?php require_once('connect.php');?>

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
        <table>
        <caption>Planning des Excursions</caption>
            <thead>
                <tr>
                    <th scope="col">Excursions</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Lieu départ</th>
                    <th scope="col">Lieu Arrivée</th>
                    <th scope="col">Participants</th>
                    <th scope="col">Guides</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>nom</td>
                    <td>01/06/2020</td>
                    <td>05/06/2020</td>
                    <td>le Rif</td>
                    <td>le Haut Atlas</td>
                    <td>3/8<button>+</button></td>
                    <td>1/2<button>+</button></td>
                    <td>48 euros</td>
                    <td><button>Modifier</button><button>Supprimer</button></td>
                </tr>
                <tr>
                    <td><input type="text" name="nom" id="nom"></td>
                    <td><input type="date" name="date-d" id="date-d"></td>
                    <td><input type="date" name="date-f" id="date-f"></td>
                    <td>
                        <select id="lieu-d" name="lieu-d">
                            <option value="1">lieu 1</option>
                            <option value="2">lieu 2</option>
                            <option value="3">lieu 3</option>
                            <option value="4">lieu 4</option>
                            <option value="5">lieu 5</option>
                        </select>
                    </td>
                    <td>
                    <select id="lieu-a" name="lieu-a">
                            <option value="1">lieu 1</option>
                            <option value="2">lieu 2</option>
                            <option value="3">lieu 3</option>
                            <option value="4">lieu 4</option>
                            <option value="5">lieu 5</option>
                        </select>
                    </td>
                    <td>
                        <select id="max-nbre" name="max-nbre">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </td>
                    <td>
                        <select id="guides" name="guides">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                    <td><input type="number" name="prix" id="prix"></td>
                    <td><button>Ajouter une excursion</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>