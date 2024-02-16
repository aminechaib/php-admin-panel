<?php
require_once('../../../database.php');
require_once('../Produit.php');

 /* delete category */
 if (isset($_POST['produitId'])) {
    $id = $_POST['produitId'];
    $produit = new Produit($conn);
    $delete = $produit->deleteById($id);
    echo $delete;
  }

?>