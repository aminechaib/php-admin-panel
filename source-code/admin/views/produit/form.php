

<?php 
require_once('scripts/Produit.php');
$produit= new Produit($conn);

$msg = '';
$errMsg = '';
$id = null;

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}

/* create admin profile  */
if(isset($_POST['create'])) {
 
  $produitName        = $_POST['produitName'];
  $prix         = $_POST['prix'];
  $disc           = $_POST['disc'];


  $create = $produit->create($produitName, $prix, $disc);

  if($create['success']) {
    $msg = "Admin Profile is created successfully";
  }

  if($create['uploadProfileImage']) {
    $profileImageErr = $create['uploadProfileImage'];
    
  }

  if($create['errMsg']) {
   
    $produitNameErr = $create['errMsg']['produitName'];
    $prixErr = $create['errMsg']['prix'];
    $discErr = $create['errMsg']['disc'];
  }

}



/* update admin profile  */
if(isset($_POST['update'])) {
 
    $produitName        = $_POST['produitName'];
    $prix         = $_POST['prix'];
    $disc           = $_POST['disc'];
   
  
    $update = $produit->updateById($id, $produitName, $prix, $disc);
  
    if($update['success']) {
      $msg = "Admin Profile is updated successfully";
    }
  
    if($update['uploadProfileImage']) {
      $profileImageErr = $update['uploadProfileImage'];
      
    }
    
  
    if($update['errMsg']) {
     
      $produitNameErr = $update['errMsg']['produitName'];
      $prixErr = $update['errMsg']['prix'];
      $discErr = $update['errMsg']['disc'];
    }
  
  }
  /* edit admin profile */
if($id) {
  $getProduit = $produit->getById($id);
   
}
?>
<div class="row">
    <div class="col-sm-6">
     <h3 class="mb-4">Admin Profile Form</h3>
     <?php echo $msg; ?>
    </div>
    <div class="col-sm-6 text-end">
        <a href="dashboard.php?page=admin-profile-list" class="btn btn-success">Admin list</a>
    </div>
</div>


<form method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label>produit Name</label>
      <input type="text" class="form-control" name="produitName" value="<?= $getProduit['produitName'] ?? ''; ?>">
       <p class="text-danger"><?= $produitNameErr ?? ''; ?></p>
       
       <label>Last Name</label>
      <input type="text" class="form-control" name="prix" value="<?= $getProduit['prix'] ?? ''; ?>">
       <p class="text-danger"><?= $prixErr ?? ''; ?></p>
       

       <label>Discreption</label>
      <input type="text" class="form-control" name="disc" value="<?= $getProduit['disc'] ?? ''; ?>">
       <p class="text-danger"><?= $discErr ?? ''; ?></p>
       <label >Profile Image</label>
       
        <input type="file" class="form-control" name="profileImage" >
        <?php 
         if(isset($getProduit['profileImage'])){

        ?>
            <img src="public/images/admin-profile/<?=$getProduit['profileImage']; ?>" width="100px">
        <?php
        }
        ?>
        
        <p class="text-danger"><?=  $profileImageErr ?? ''; ?></p>

    </div>

    <button type="submit" class="btn btn-success" name="<?= $id ? 'update' : 'create'; ?>">Save</button>
  </form>