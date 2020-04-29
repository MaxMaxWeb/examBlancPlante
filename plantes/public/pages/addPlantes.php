<?php
use App\Models\CategorieTools;
use App\Models\PlanteTools;
use App\Tools\DatabaseTools;
use App\Models\Categorie;


use App\Models\Plante;

$dbTools = new DatabaseTools("mysql", "magasin", "root", "root");

$planteTools = new PlanteTools($dbTools);
$categTools = new CategorieTools($dbTools);

$categories = $categTools->getAllCategories();
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="number" name="prix">
    <select name="categName">
        <?php foreach ($categories as $category){ ?>
            <option> <?= $category->getName() ?></option>

        <?php } ?>

    </select>
    <input type="submit" value="ajouter">
</form>

</body>
</html>
