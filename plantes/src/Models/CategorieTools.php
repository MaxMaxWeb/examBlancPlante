<?php

namespace App\Models;
class CategorieTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }
    public function getAllCategories(){
        $results = $this->databasetools->executeQuery("SELECT * FROM categories");
        $categories = [];
        foreach ($results as $result){
            $categorie = new Categorie();
            $categorie->setId($result['categorie_id']);
            $categorie->setName($result['categ_name']);
            array_push($categories, $categorie);
        }
        return $categories;
    }

    public function sortByCateg($categ){

        $results = $this->databasetools->executeQuery("SELECT * FROM plantes INNER JOIN categories on plantes.catégorie = '$categ' WHERE categories.categorie_id = plantes.catégorie");
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