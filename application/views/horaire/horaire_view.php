<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="horaire" method="post">
    
        <label for="jour">Jour : </label>
        <input type="date" name="jour" id="jour" required><br>
        <label for="datedebut" >Date debut : </label>
        <input type="time" name="heuredebut" id="heuredebut" required><br>
        <label for="datefin">Date fin : </label>
        <input type="time" name="heurefin" id="heurefin" required><br>
        <input type="submit" value="Enregistrer">
        
    </form>
</body>
</html>