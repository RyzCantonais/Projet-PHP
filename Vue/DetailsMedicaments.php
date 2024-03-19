<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vue/bootstrap.min.css" />
    <link rel="shortcut icon" href="./Vue/max.ico" type="image/x-icon">
    <title>Liste des médicaments de GSB</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1>Liste des médicaments de GSB</h1><br />
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <form method="post" action="index.php?action=MAJ">
                        <!--<input type="hidden" name="codeMedocAction" value="<?php echo $medoc["id"]; ?>" />-->
                        <?php foreach ($medicaments as $medoc): ?>
                            <tr>
                                <td>
                                    <?php echo $medoc["id"]; ?>
                                </td>
                                <td>
                                    <?php echo $medoc["nom"]; ?>
                                </td>
                                <!-- Autres colonnes -->
                                </tr>
                        <?php endforeach; ?>

                    </form>
            </tbody>
        </table><br /><br />

        <a href="index.php?action=FORM" class="btn btn-success">Ajouter un pilote</a><br><br>
        <a href="index.php?action=DET" class="btn btn-info">Voir le nombre</a>
    </div>
</body>

</html>