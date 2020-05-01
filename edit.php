<?php 

    require_once('config/login.php');
    require_once('config/functions.php');

    $errorTitle = $errorYear = $errorDesc = '';

    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);//Getting the id from the built in get function

        $query = "SELECT * FROM product WHERE product_id = '$id'";//The query for the sql language where id = the product id

        $result = $conn->query($query);//Querying the database with query function

        if(!$result){//Checking for the result error
            echo "Fata error !!!";
        }
        else{
            $row = $result->fetch_assoc();//Fetching result with mysqli fetch_assoc funtion
        }
    }

    if(isset($_POST['edit'])){
        $id = clean_code($_GET['id']);
        $title = clean_code($_POST['title']);//Cleaning the data input with defined function
        $product_year = clean_code($_POST['product_year']);//same
        $description = clean_code($_POST['description']);//same

        if(empty($title)){//Checking for empty field
            $errorTitle = "Title field is required";//errors for this entry
        }

        if(empty($product_year)){//Checking for empty field
            $errorYear = "Year field is required";//errors for this entry
        }

        if(empty($description)){//Checking for empty field
            $errorDesc = "Description field is required";//errors for this entry
        }

        if(empty($errorTitle) && empty($errorYear) && empty($errorDesc)){

            //Update Query
            $query = "UPDATE product SET title = '$title',
            product_year = '$product_year', 
            description = '$description' 
            WHERE product_id = '$id'";

            $result = $conn->query($query);

            if(!$result){
                echo"Fatal error";
            }
            }else{
                header('Location: index.php');
                $conn->close();
                $result=null;
            }


        }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/Header_Footer/header.php');?>

        <div class="container">
            <form action="" method="POST">
                <div class="input-field">
                    <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($row['title']);?>">
                    <p class="red-text"><?php echo htmlspecialchars($errorTitle);?></p>
                </div>

                <div class="input-field">
                    <input type="text" name="product_year" placeholder="Product Year" value="<?php echo htmlspecialchars($row['product_year']);?>">
                    <p class="red-text"><?php echo htmlspecialchars($errorYear);?></p>
                </div>

                <div class="input-field">
                    <textarea name="description" placeholder="Description"><?php echo htmlspecialchars($row['description']);?></textarea>
                    <p class="red-text"><?php echo htmlspecialchars($errorDesc);?></p>
                </div>
                
                <div class="input-field">
                    <input type="submit" value="Edit" name="edit" class="btn black" style="width: 100%;">
                </div>

            </form>
        </div>

    <?php include('templates/Header_Footer/footer.php');?>
</html>

<?php
    $conn->close();
    $result=null;
    $row=null;
?>