<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
?>
<html>
    <head>
        <meta charset="utf-8">
       <link rel="stylesheet" href="../assets/css/style.css">
        <title>Statistiques par emploi</title>
    </head>
    <body>
        <nav class="navbar">
            <ul>
            <li><a href="index.php">&larr; Retour aux départements</a></li>
            <li><a href="search.php" >🔍 Rechercher un employé</a></li>
            <li><a href="stats.php" class="active">📊 Statistiques par emploi</a></li>
            <li><a href="dept_form.php">➕ Ajouter un département</a></li>
            <li><a href="emp_form.php">➕ Ajouter un employé</a></li>
            </ul>
        </nav>
         <div class="container">
            <h2 class="mt">Statistiques par emploi</h2>
    <table class="table" border="1">
        <thead>
        <tr>
            <th>Emploi</th>
            <th>Hommes</th>
            <th>Femmes</th>
            <th>Total</th>
            <th>Salaire moyen</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($stats as $row) { ?>
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['nb_hommes'] ?></td>
                <td><?= $row['nb_femmes'] ?></td>
                <td><?= $row['nb_total'] ?></td>
                <td><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
        </div>
    </body>
</html>
