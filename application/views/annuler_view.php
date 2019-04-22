<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="annuler_rdv" method="post">
    <label for="motif">Motif</label>
    <input type="text" name ="motif">
    <label for="date">Date</label>
    <input type="date" name ="date">
    <label for="heure">Heure</label>
    <input type="text" name ="heure">
    <label for="duree">Durée</label>
    <input type="text" name ="duree">
    <label for="commentaire">Commentaire</label>
    <input type="text" name ="commentaire">
    <input type="submit" value = "Annuler">
    </form>
</body>
</html>