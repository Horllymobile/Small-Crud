<?php 



    function clean_code($data){
        global $conn;
        $clean = htmlspecialchars($data);
        return $conn -> escape_string(trim($clean));
    }

?>