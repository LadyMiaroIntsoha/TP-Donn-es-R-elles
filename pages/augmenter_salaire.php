<?php
    include('../inc/functions.php');
    $erreur = '';
    $success = false;
    $raise = '';
    if(isset($_POST['valider'])){
        $raise = $_POST['raise'] ?? '';
        if($raise ==='' || !is_numeric($raise) || $raise < 0){
            $erreur = 'Veuillez entrer un pourcentage valide.';
        } else {
            raise_salaries($raise);
            $success = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augmenter salaire</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
        <nav class="navbar">
        <ul>
            <li><a href="index.php">&larr; Retour aux départements</a></li>
            <li><a href="search.php">🔍 Rechercher un employé</a></li>
            <li><a href="stats.php">📊 Statistiques par emploi</a></li>
            <li><a href="dept_form.php">➕ Ajouter un département</a></li>
            <li><a href="emp_form.php">➕ Ajouter un employé</a></li>
            <li><a href="augmenter_salaire.php" class="active">💰 Augmenter les salaires</a></li>
        </ul>
    </nav>

        <div class="container">
        <h1 class="mt">Augmenter les salaires</h1>
 
        <?php if ($success) { ?>
            <div class="alert alert-success">Le salaire de tous les employés a été augmenté de <?= htmlspecialchars($raise) ?> %.</div>
        <?php } ?>
        <?php if ($erreur !== '') { ?>
            <div class="alert alert-error"><?= htmlspecialchars($erreur) ?></div>
        <?php } ?>
 
        <div class="card">
            <form action="augmenter_salaire.php" method="post" class="form-inline">
                <div class="form-group">
                    <button type="submit" name="valider" class="btn">Augmenter</button>
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" name="raise" min="1"
                           value="<?= htmlspecialchars($raise) ?>"> %
                </div>
            </form>
        </div>
    </div>

</body>
</html>