<?php
require __DIR__ . '/App/init.php';

use Model\Abonne;

// faire le formulaire d'ajout d'abonné
// en retour de post créer une nouvelle instance d'Abonne
// ajouter une méthode save() à la classe Abonne
// dans laquelle un objet Abonne va s'enregistrer en bdd
// et l'appeler ici


if(!empty($_POST)) {
   $abonne = new Abonne($_POST['prenom']); // possible grace au __construct();
   $abonne->save(); 

} elseif (isset($_GET['id'])) {
    // préremplir le formulaire
    // créer une méthode static find($id) dans la classe abonne qui retourne
    // un objet Abonne avec id et prenom correspondant
    // à l'abonné en bdd => faire une requête SELECT avec l'id reçu
    // en paramètre

    $abonne = Abonne::find($_GET['id']);
}



include __DIR__ . 'view/abonne-edit.html.php';