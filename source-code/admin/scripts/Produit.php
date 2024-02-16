

<?php
class Produit {

    private $conn;
    private $produitTable = 'produit';
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validate($produitName, $prix, $disc ) {

        $error = false;
        $errMsg = null;
        $produitNameErr = '';
        $prixErr = '';
        $discErr = '';
  
       
        if(empty($produitName)) {
            $produitNameErr = "First Name is required";
            $error = true;
        } 
        if(empty($prix)) {
            $prixErr = "Last Name is required";
            $error = true;
        } elseif (!is_numeric($prix)) {
            $prixErr = "Prix must be a number";
            $error = true;
        }
        if(empty($disc)) {
            $discErr = "disc is required";
            $error = true;
        } 
      

        $errorInfo = [
            "error" => $error,
            "errMsg" => [
                "produitName" => $produitNameErr,
                "prix" => $prixErr,
                "disc" => $discErr,
               
            ]
        ];
        
        return $errorInfo;
    }
    



    public function uploadProfileImage($id= null) {
  
        $error = false;
        $thumbnailErr ='';
        $profileImageErr = '';
        $uploadTo = "public/images/produit/"; 
        $allowFileType = array('jpg','png','jpeg');
        $fileName = $_FILES['profileImage']['name'];

        if(empty($fileName) && null !== $id) {

            $get = $this->getById($id);
            if(isset($get['profileImage'])) {
                $fileName = $get['profileImage'];
            }
       
        } else {
        
        $tempPath = $_FILES["profileImage"]["tmp_name"];
    
        $basename = basename($fileName);
        $originalPath = $uploadTo.$basename; 
        $fileType = pathinfo($originalPath, PATHINFO_EXTENSION); 
     
        if(!empty($fileName)){ 
           if(in_array($fileType, $allowFileType)){ 

             if(!move_uploaded_file($tempPath, $originalPath)){ 
                $thumbnailErr = 'Profile Not uploaded ! try again';
                $error = true;
            }
         }else{  
            $thumbnailErr = 'Profile type is not allowed'; 
            $error = true;
         }
       } else {
             $thumbnailErr = 'Profile is required'; 
            $error = true;
       }  
     }
    $thumbnailInfo = [
        "error" => $error, 
        "profileImageErr" => $thumbnailErr, 
        "profileImage" => $fileName
    ];

    return  $thumbnailInfo;
}    



    public function create($produitName, $prix, $disc) {
        $validate = $this->validate($produitName, $prix, $disc);
        $success = false;
        if (!$validate['error']) {
            $uploadProfileImage = $this->uploadProfileImage();

            if (!$uploadProfileImage['error']) {
                //  table name for admin profiles
                $query = "INSERT INTO " . $this->produitTable . " (produitName, prix, disc, profileImage) VALUES ( ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($query);
    
                $stmt->bind_param("ssss", $produitName, $prix, $disc, $uploadProfileImage['profileImage']);
    
                if ($stmt->execute()) {
                    $success = true;
                    $stmt->close();
                }
            }
        }
    
        $data = [
            'errMsg' => $validate['errMsg'],
            'uploadProfileImage' => $uploadProfileImage['profileImageErr'] ?? 'Unable to upload profile due to other fields facing errors',
            'success' => $success
        ];
    
        return $data;
    }
    

        public function get() {

        $data = [];
    
        $query = "SELECT id, produitName, prix, disc, profileImage FROM ";
        $query .= $this->produitTable;

        $result = $this->conn->query($query);
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->free();
        }
    
        return $data;
    }

    public function getById($id) {

        $data = [];
    
        $query = "SELECT id, produitName, prix, disc, profileImage FROM ";
        $query .= $this->produitTable;
        $query .= " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
       
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
        } 

        return $data;
    }

    public function updateById($id, $produitName, $prix, $disc) {

        $validate = $this->validate($produitName, $prix, $disc);
        $success = false;
    
        if (!$validate['error']) {
            $uploadProfileImage = $this->uploadProfileImage($id);
           
            if (!$uploadProfileImage['error']) {
            // Replace 'content' with the correct table name for admin profiles
                $query = "UPDATE " . $this->produitTable . " SET produitName = ?, prix = ?, disc = ? , profileImage = ? WHERE id = ?";
                $stmt = $this->conn->prepare($query);
            
                $stmt->bind_param("ssssi", $produitName, $prix, $disc, $uploadProfileImage['profileImage'], $id);
            
                if ($stmt->execute()) {
                    $success = true;
                    
                } 
           }
        }
        
        $data = [
            'success' => $success,
            'errMsg' => $validate['errMsg'],
            'uploadProfileImage' => $uploadProfileImage['profileImageErr'] ?? 'Unable to upload profile due to other fields facing errors',
        ];

        
        return $data;
    }
    
    public function deleteById($id) {

        $query = "DELETE FROM ";
        $query .= $this->produitTable;
        $query .= " WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
       
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    
}



?>
