<?php

require_once('config/login.php');

$query = "SELECT * FROM product ORDER BY rating DESC";

$result = $conn->query($query);
if (!$result) {
    echo "Fatal error";
} else {
    $row = $result->num_rows;
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/Header_Footer/header.php'); ?>



<div class="container">
    <div class="row">
        <form action="" method="get">
            <div class="input-field">
                <input type="search" name="Search" id="">
            </div>
            <div class="input-field center">
                <input type="submit" class="btn black" name="submit"  value="Search" id="">
            </div>
        </form>
    </div>
    <div class="row" style="margin:5px;">
        <?php for ($j = 0; $j < $row; ++$j) : ?>
            <div class="col l3 pink" style="margin:5px; width:200px;">
                <?php $result->data_seek($j); ?>
                <p> Title: <?php echo ' ' . htmlspecialchars($result->fetch_assoc()['title']); ?> </p>
                <?php $result->data_seek($j); ?>
                <p> Production Year: <?php echo ' ' . htmlspecialchars($result->fetch_assoc()['product_year']); ?> </p>
                <?php $result->data_seek($j); ?>
                <p> Description: <?php echo ' ' . htmlspecialchars($result->fetch_assoc()['description']); ?> </p>
                <?php $result->data_seek($j); ?>
                <p> Rating: <?php echo ' ' . htmlspecialchars($result->fetch_assoc()['rating']); ?> </p>
                <?php $result->data_seek($j); ?>
                <a href="edit.php?id=<?php echo htmlspecialchars($result->fetch_assoc()['product_id']); ?>" class="btn-floating center" role="button">Edit</a>
                <?php $result->data_seek($j); ?>
                <a href="delete.php?id=<?php echo htmlspecialchars($result->fetch_assoc()['product_id']); ?>" class="btn-floating center" role="button">Del</a>
            </div>
        <?php endfor ?>
    </div>
</div>

<?php include('templates/Header_Footer/footer.php'); ?>

</html>