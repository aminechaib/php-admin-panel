<?php
class CategoryManager {

    private $conn;
    private $categoryTable = "categories";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validate($categoryName,$discreption,$prix) {

        $error = false;
        $errMsg = null;

        if(empty($categoryName && $discreption && $prix)) {
            $errMsg = "Category is required";
            $error = true;
        } 

        $errorInfo = [
            "error" => $error,
            "errMsg" => $errMsg
        ];
        
        return $errorInfo;
    }

    public function create($categoryName,$discreption,$prix) {

        $validate = $this->validate($categoryName,$discreption,$prix);
        $success = false;

        if (!$validate['error']){

            $query = "INSERT INTO ";
            $query .= $this->categoryTable; 
            $query .= " (categoryName,discreption,prix) ";
            $query .= " VALUES (?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sss", $categoryName,$discreption,$prix);
            
            if ($stmt->execute()) {
                $success = true;
                $stmt->close();
            }
        }
         
         $data = [
            'errMsg' => $validate['errMsg'],
            'success' => $success
         ];

         return $data;
    }

    public function get() {

        $data = [];
    
        $query = "SELECT id, categoryName,discreption,prix FROM ";
        $query .= $this->categoryTable;
        
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
    
        $query = "SELECT categoryName,discreption,prix FROM ";
        $query .= $this->categoryTable; 
        $query .= " WHERE id=?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
       
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data= $result->fetch_assoc();
            $stmt->close();
        } 

        return $data;
    }

    public function updateById($id, $categoryName,$discreption,$prix) {

        $validate = $this->validate($categoryName,$discreption,$prix);
        $success = false;

        if (!$validate['error']){

            $query = "UPDATE ";
            $query .= $this->categoryTable;
            $query .= " SET categoryName = ? ,discreption = ? ,prix = ? WHERE id = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssdi", $categoryName,$discreption,$prix, $id);
            
            if ($stmt->execute()) {
                $success = true;
                $stmt->close();
            }
        }
         
         $data = [
            'errMsg' => $validate['errMsg'],
            'success' => $success
         ];

         return $data;
    }

    public function deleteById($id) {

        $query = "DELETE FROM ";
        $query .= $this->categoryTable; 
        $query .= " WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            $stmt->close();
        }
        $stmt->close();
    }
    
}



?>
