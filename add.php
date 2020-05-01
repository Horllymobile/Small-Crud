<?php

    require_once('config/login.php');
    require_once('config/functions.php');

    $errorTitle = $errorYear = $errorDesc = $errorRating = '';

    if(isset($_POST['submit'])){
        $title = clean_code($_POST['title']);//Cleaning the data input with defined function
        $product_year = clean_code($_POST['product_year']);//same
        $description = clean_code($_POST['description']);//same
        $rating = clean_code($_POST['rating']);//same

        if(empty($title)){//Checking for empty field
            $errorTitle = "Title field is required";//errors for this entry
        }

        if(empty($product_year)){//Checking for empty field
            $errorYear = "Year field is required";//errors for this entry
        }

        if(empty($description)){//Checking for empty field
            $errorDesc = "Description field is required";//errors for this entry
        }

        if(empty($rating)){//Checking for empty field
            $errorDesc = "Description field is required";//errors for this entry
        }

        if(empty($errorTitle) && empty($errorYear) && empty($errorDesc) && empty($errorRating)){

            //INSERT Query
            $query = "INSERT INTO product (title,product_year,description,rating) VALUES('$title','$product_year','$description','$rating')";

            $result = $conn->query($query);

            if(!$result){
                echo"Fatal error " . $conn->error;
            }else{
                header('Location: index.php');
                $conn->close();
                $result = null;
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/Header_Footer/header.php'); ?>

<div class="container">
    <form action="add.php" method="POST">
        <div class="input-field">
            <input type="text" name="title" placeholder="Title">
            <p class="red-text"><?php echo htmlspecialchars($errorTitle); 
                                ?></p>
        </div>

        <div class="input-field">
            <input type="text" name="product_year" placeholder="Product Year">
            <p class="red-text"><?php echo htmlspecialchars($errorYear);
                                ?></p>
        </div>

        <div class="input-field">
            <input type="number" name="rating" placeholder="rating">
            <p class="red-text"><?php 
            echo htmlspecialchars($errorRating);
                                ?></p>
        </div>

        <div class="input-field">
            <textarea name="description" placeholder="Description"></textarea>
            <p class="red-text"><?php 
            echo htmlspecialchars($errorDesc);
                                ?></p>
        </div>
        <div class="input-field">
            <input type="submit" class="btn black" name="submit" value="Add Product">
        </div>
    </form>
</div>

<?php include('templates/Header_Footer/footer.php'); ?>

</html>