<?php
include('database_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товари в магазині </title>
</head>
<body>
    <form action='1st_task.php' method='get'>
        <label for="vendor_name">Please, choose vendor name:</label></br>
        <select name="vendor_name" id="vendor_name">
            <?php
            try{
                foreach($dbh->query('SELECT DISTINCT v_name from vendors') as $row){
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
            }catch(PDOException $ex){
                echo $ex->GetMessage();
            }
            ?>
        <input type=submit></input>
    </form>
    </br>
    </br>
    <form action='2nd_task.php' method='get'>
        <label for="category_name">Please, choose category name:</label></br>
        <select name="category_name" id="category_name">
            <?php
            try{
                foreach($dbh->query('SELECT DISTINCT c_name from category') as $row){
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
            }catch(PDOException $ex){
                echo $ex->GetMessage();
            }
            ?>
        <input type=submit></input>
    </form>
    </br>
    </br>
    <form action='3rd_task.php' method='get'>
    <label for="price_range">Please, choose price range:</label></br>
        <select name="price_range" id="price_range">
            <option value=999>1000-1499</option>
            <option value=1500>1500-1999</option>
            <option value=2000>2000-2499</option>
            <option value=2500>2500+</option>
        <input type=submit></input>
    </form>
</body>
</html>