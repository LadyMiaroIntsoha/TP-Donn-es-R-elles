<?php
    include('../inc/functions.php');

    $departments = get_all_departments();

    // Récupération des critères (?? '' évite le warning si le champ est absent)
    $dept_no = $_GET['dept_no'] ?? '';
    $name    = $_GET['name']    ?? '';
    $age_min = $_GET['age_min'] ?? '';
    $age_max = $_GET['age_max'] ?? '';

    // On ne lance la recherche que si le formulaire a été soumis
    $submitted = isset($_GET['dept_no']);
    $results   = $submitted ? search_employees($dept_no, $name, $age_min, $age_max) : array();
?>
<html>
    <head>
        <meta charset="utf-8">
       <link rel="stylesheet" href="../assets/css/style.css">
        <title>Recherche d'employés</title>
    </head>
    <body>
        <nav class="navbar">
            <ul>
            <li><a href="index.php">&larr; Retour aux départements</a></li>
            <li><a href="search.php" class="active">🔍 Rechercher un employé</a></li>
            <li><a href="stats.php">📊 Statistiques par emploi</a></li>
            <li><a href="dept_form.php">➕ Ajouter un département</a></li>
            <li><a href="emp_form.php">➕ Ajouter un employé</a></li>
            </ul>
        </nav>

        <div class="container">
            <h2 class="mt">Recherche d'employés</h1>
                <div class="card">
                <form method="get" action="search.php" class="form-inline">
        <div class="form-group">
            <label for="dept">Département :</label>
            <select class="form-control" id="dept" name="dept_no">
                <option value="">— Tous —</option>
                <?php foreach ($departments as $d) { ?>
                    <option value="<?= $d['dept_no'] ?>" <?= $dept_no === $d['dept_no'] ? 'selected' : '' ?>>
                        <?= $d['dept_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group"> <label for="name">Nom de l'employé :</label> <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($name) ?>"></div> 
        <div class="form-group"><label for="age_min">Âge min :</label> <input class="form-control" type="number" name="age_min" value="<?= htmlspecialchars($age_min) ?>"></div>
        <div class="form-group"><label for="age_max">Âge max :</label> <input class="form-control" type="number" name="age_max" value="<?= htmlspecialchars($age_max) ?>"></div>
        <div class="form-group">
            <button type="submit" class="btn">Rechercher</button>
        </div>
    </form>

    <?php if ($submitted) { ?>
        <h2 class="mt"><?= count($results) ?> résultat(s)<?= count($results) === 200 ? ' (limité à 200)' : '' ?></h2>
        <table class="table border="1">
            <thead>
            <tr>
                <th>N°</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Genre</th>
                <th>Âge</th>
                <th>Département</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $emp) { ?>
                <tr>
                    <td><a href="fiche.php?emp_no=<?= urlencode($emp['emp_no']) ?>"><?= $emp['emp_no'] ?></a></td>
                    <td><?= $emp['first_name'] ?></td>
                    <td><?= $emp['last_name'] ?></td>
                    <td><?= $emp['gender'] ?></td>
                    <td><?= $emp['age'] ?></td>
                    <td><?= $emp['dept_name'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    <?php } ?>
</div>
    </div>
    </body>
</html>
