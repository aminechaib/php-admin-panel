<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">


<?php 
require_once('scripts/Produit.php');
$produit= new Produit($conn);

$msg = '';
$errMsg = '';
$id = null;

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}

/* create admin profile  */if(isset($_POST['create']) || isset($_POST['update'])) {
    $produitName = $_POST['produitName'];
    $prix = $_POST['prix'];
    $disc = $_POST['disc'];

   
    $create = $produit->create($produitName, $prix, $disc);

    if($create['success']) {

        ?>
        <script type="text/javascript">
    window.location = "http://localhost/php-admin-panel/source-code/admin/dashboard.php?page=produit-list";
    window.location = "http://localhost/php-admin-panel/source-code/admin/dashboard.php?page=produit-form";
</script>

        <?php
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

/* update admin profile */
if(isset($_POST['update'])) {
    $produitName = $_POST['produitName'];
    $prix = $_POST['prix'];
    $disc = $_POST['disc'];

   
    $update = $produit->updateById($id, $produitName, $prix, $disc);

    if($update['success']) {
        ?>
                <script type="text/javascript">
    window.location = "http://localhost/php-admin-panel/source-code/admin/dashboard.php?page=produit-list";
    window.location = "http://localhost/php-admin-panel/source-code/admin/dashboard.php?page=produit-form";
</script>
        <?php
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
     <h3 class="mb-4">Produit Form</h3>
     <?php echo $msg; ?>
    </div>
    <div class="col-sm-6 text-end">
        <a href="dashboard.php?page=produit-list" class="btn btn-success">Produit list</a>
    </div>
</div>


<form method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label>produit Name</label>
      <input type="text" class="form-control" name="produitName" maxlength="30" value="<?= $getProduit['produitName'] ?? ''; ?>">
       <p class="text-danger"><?= $produitNameErr ?? ''; ?></p>
       
       <label>Prix</label>
      <input type="text" class="form-control"  maxlength="8" name="prix" value="<?= $getProduit['prix'] ?? ''; ?>">
       <p class="text-danger"><?= $prixErr ?? ''; ?></p>
       

       <label>Discreption</label>
      <input type="text" class="form-control" maxlength="80" name="disc" value="<?= $getProduit['disc'] ?? ''; ?>">
       <p class="text-danger"><?= $discErr ?? ''; ?></p>
       <label >Produit Image</label>
       
        <input type="file" class="form-control" name="profileImage" >
        <?php 
         if(isset($getProduit['profileImage'])){

        ?>
            <img src="public/images/produit/<?=$getProduit['profileImage']; ?>" width="100px">
        <?php
        }
        ?>
        
        <p class="text-danger"><?=  $profileImageErr ?? ''; ?></p>

    </div>

    <button type="submit" class="btn btn-success" name="<?= $id ? 'update' : 'create'; ?>">Save</button>
  </form>