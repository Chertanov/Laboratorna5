<?php

$category_name = $_GET["category_name"];

include("database_connect.php");

try{
    $sqlSelect = "select name, price, quantity, quality from items join category on items.FID_Category=category.ID_Category where category.c_name = :category;";
    

    $sth = $dbh->prepare($sqlSelect);
    $sth -> bindValue(":category", $category_name);
    $sth->execute();
    $res = $sth->fetchAll();

    echo "<table border='1'>";
    echo "<tr><th colspan=4>Товари категорії $category_name</th></tr>";
    echo "<tr><td>Назва товару</td><td>Ціна</td><td>Кількість</td><td>Якість</td></tr>";
    foreach($res as $row){
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
    }
    echo "</table>";
}catch(PDOException $ex){
    echo $ex->GetMessage();
}
