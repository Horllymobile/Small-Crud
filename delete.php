<?php

    require_once('config/login.php');
    require_once('config/functions.php');
    
    if(isset($_GET['id'])){
        $id = clean_code($_GET['id']);
        $query = "DELETE FROM product WHERE product_id = '$id'";

        $result = $conn->query($query);

        if(!$result){
            echo "Fatal error" . $conn->error;
        }else{
            header('Location: index.php');
            $conn->close();
            $result = null;
        }
    }
?>