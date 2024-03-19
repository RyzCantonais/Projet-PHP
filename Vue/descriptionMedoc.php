<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du médicament</title>
    <!-- Inclure les styles CSS si nécessaire -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php if (!empty($details)): ?>
        <table class="table">
            <tr>
                <th>Description</th>
                <!-- Ajouter d'autres colonnes si nécessaire -->
            </tr>
            <?php foreach ($details as $medicament): ?>
                <tr>
                    <td><?php echo $medicament["description"]; ?></td>
                    <!-- Ajouter d'autres cellules pour d'autres détails -->
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun détail trouvé pour ce médicament.</p>
    <?php endif; ?>
</body>
</html>
