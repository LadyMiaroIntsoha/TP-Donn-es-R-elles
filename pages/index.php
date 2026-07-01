<?php
    include('../inc/functions.php');
    $tri = isset($_GET['tri']) && $_GET['tri'] === 'DESC' ? 'DESC' : 'ASC';
    $tri_suivant = $tri === 'ASC' ? 'DESC' : 'ASC';
    $tri_icone = $tri === 'ASC' ? '↑' : '↓';
    $tri_legende = $tri === 'ASC' ? 'décroissant' : 'croissant';
    $departments = get_all_departments($tri);
?>		
<html>
    <head>
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Les news</title>
    </head>
    <body>
        <nav class="navbar">
            <ul>
                <li><a href="search.php">🔍 Rechercher un employé</a></li>
                <li><a href="stats.php">📊 Statistiques par emploi</a></li>
                <li><a href="dept_form.php">➕ Ajouter un département</a></li>
                <li><a href="emp_form.php">➕ Ajouter un employé</a></li>
                <li><a href="augmenter_salaire.php">Augmenter les salaires</a></li>
                <li><a href="augmenter_salaire.php">💰 Augmenter les salaires</a></li>
            </ul>
        </nav>

            <div class="container">
                <h1>Liste des départements</h1>
                <div class =" btn btn-secondary mt"><a href="index.php?tri=<?php echo $tri_suivant;?>">Mettre en ordre <?php echo $tri_legende;?>
                    <?php echo $tri_icone;?>
                </a> </div>
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>Department Number</th>
                    <th>Department Name</th>
                    <th>Manager actuel</th>
                    <th>Nombre d'employés</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $line) {?>
                    <tr>
                        <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></td>
                        <td><?=$line['dept_name']?></td>
                        <td><?= $line['manager_name'] ?? '—' ?></td>
                        <td><?= $line['nb_employees'] ?></td>
                        <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    </body>
</html>
