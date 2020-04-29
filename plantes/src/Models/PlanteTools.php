<?php

namespace App\Models;
class PlanteTools

{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function getAllPlantes(){
        $results = $this->databasetools->executeQuery("SELECT * FROM plantes INNER JOIN categories ON plantes.catégorie = categories.categorie_id");

    $plantes = [];
    foreach ($results as $result){
    $plante = new Plante() ;
    $plante->setId($result['plante_id']);
    $plante->setName($result['plante_name']);
    $plante->setPrix($result['prix']);
    $plante->setCategorie($result['categ_name']);
    array_push($plantes, $plante);



}
return $plantes;

}



}