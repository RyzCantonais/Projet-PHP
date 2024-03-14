<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vue/bootstrap.min.css" />
    <link rel="shortcut icon" href="./Vue/max.ico" type="image/x-icon">
    <title>Liste des Pilotes F1</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Liste des Pilotes F1</h1><br />
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Ecurie</th>
                    <th>Points</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicaments as $medoc): ?>
                    <form method="post" action="index.php?action=MAJ">
                        <input type="hidden" name="codeMedocAction" value="<?php echo $medoc["Code"]; ?>" />
                        <tr>
                            <td><?php echo $medoc["Code"]; ?></td>
                            <td><?php echo $medoc["Prenom"]; ?></td>
                            <td><?php echo $medoc["Nom"]; ?></td>
                            <td><?php echo $medoc["Ecurie"]; ?></td>
                            <td><?php echo $medoc["Points"]; ?></td>
                            <td><input type="submit" name="actionPil" value="Modifier" class="btn btn-primary" /></td>
                            <td><input type="submit" name="actionPil" value="Supprimer" class="btn btn-danger" /></td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </tbody>
        </table><br /><br />

        <a href="index.php?action=FORM" class="btn btn-success">Ajouter un pilote</a><br><br>
        <a href="index.php?action=DET" class="btn btn-info">Voir le nombre</a>
    </div>
</body>
</html>