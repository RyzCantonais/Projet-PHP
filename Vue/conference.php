<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Conférence</title>
</head>

<body class="bg-light">
<?php include "./Vue/components/header.component.html"; ?>
    <div class="container mt-5" style="min-height: 100vh">
        <h1>Liste des Conférence</h1><br />
        <table class="table">
            <tbody>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activites as $act): ?>
                                <tr>
                                    <td>
                                        <?php echo $act["id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $act["nom"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $act["description"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $act["date_activité"]; ?>
                                    </td>
                                    <td>
                                    <form method="post" action="index.php?action=REJ">
                                        <input type="hidden" name="id_user" value="<?php echo $act["id"]; ?>">
                                        <button type="submit" name="details" value="Details"
                                            class="btn btn-primary">Rejoindre</button>
                                    </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </tbody>
        </table><br /><br />

        <!--<a href="index.php?action=FORM" class="btn btn-success">Ajouter un pilote</a><br><br>
        <a href="index.php?action=DET" class="btn btn-info">Voir le nombre</a>-->
    </div>
    <?php include "./Vue/components/footer.component.html"; ?>
</body>

</html>