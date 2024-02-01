

<?php 

  require_once('scripts/Produit.php');

  $produit= new Produit($conn);
  $produitlist = $produit->get();


 
?>
<div class="row">
    <div class="col-sm-6">
     <h3 class="mb-4">Produit List</h3>
    </div>
    <div class="col-sm-6 text-end">
        <a href="dashboard.php?page=produit-form" class="btn btn-success">Add New</a>
    </div>
</div>

<div class="table-responsive-sm">
<table class="table table-hover">
    <thead>
      <tr>
      <th>S.N</th>
        <th>produit photo</th>
        <th>nome de produit</th>
        <th>prix</th>
        <th>Discreption</th>
        <th colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($produitlist)) {
           
        $sn = 1;
       foreach($produitlist as $data){
        ?>
      <tr>
      <td><?= $sn; ?></td>
        <td><img src="public/images/produit/<?= $data['profileImage']; ?>" width="100px"></td>
        <td>
          <?= $data['produitName'];?> <br>
        
        </td>
        <td>  <?= $data['prix']; ?></td>
        <td><?= $data['disc']; ?></td>
        <td class="text-center">
            <a href="dashboard.php?page=produit-form&id=<?= $data['id']; ?>" class="text-success">
                <i class="fa fa-edit"></i>
            </a>
        </td>

        <td  class="text-center">
            <a href="javascript:void(0)" onclick="confirmProduitDelete(<?=$data['id']; ?>)" class="text-danger">
              <i class="fa fa-trash-o"></i>
            </a>
        </td>
       
      </tr>
       <?php 
        $sn++; }
        } else {
       ?>
     <tr>
        <td colspan="3">No category Found</td>
       
      </tr>
       <?php } ?>
      
      
    </tbody>
  </table>
</div>

<script src="public/js/ajax/delete-produit.js"></script>