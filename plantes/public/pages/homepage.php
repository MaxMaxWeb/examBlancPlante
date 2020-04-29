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


    $sortedPlantList = $categTools->sortByCateg($_GET['id']);

    $plantesList = $planteTools->getAllPlantes();

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




    <div class="container">
        <div class="row">
        <?php foreach ($categories as $category){ ?>

             <button type="btn" class=" mx-3 btn btn-warning">
                 <a href="http://localhost:9090/?id=<?= $category->getId() ?>"> <?= $category->getName() ?> </a>
                </button>
        <?php } ?>
            <button type="btn" class=" mx-3 btn btn-warning"> <a href="http://localhost:9090/"> Reset</a> </button>
        </div>

    </div>





<body>

</body>
</html>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Categorie</th>
    </tr>
    </thead>
    <tbody>
    <?php if(empty($_GET['id'])) {
    foreach ($plantesList as $plante) {?>

        <tr>
            <td> <?= $plante->getId() ?></td>
            <td> <?= $plante->getName() ?> </td>
            <td> <?= $plante->getPrix() ?> </td>
            <td> <?= $plante->getCategorie() ?> </td>
        </tr>


    <?php } ?>
    <?php }
          else { 
              foreach ($sortedPlantList as $plante) {?>

              <tr>
                  <td> <?= $plante->getId() ?></td>
                  <td> <?= $plante->getName() ?> </td>
                  <td> <?= $plante->getPrix() ?> </td>
                  <td> <?= $plante->getCategorie() ?> </td>
              </tr>


          <?php } ?>
            
        <?php } ?>

    </tbody>
</table>

<a href="http://localhost:9090/add_plantes"> Ajoutez une plante ! </a>





