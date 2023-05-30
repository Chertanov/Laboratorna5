<?php

$price = $_GET["price_range"];
$hprice = $price + 499;
if ($hprice == 2999)
    $hprice = 9999;

include("database_connect.php");

try{
    $sqlSelect = "select name, price, quantity, quality from items where price >= :category and price <= $hprice";
    

    $sth = $dbh->prepare($sqlSelect);
    $sth -> bindValue(":category", $price);
    $sth->execute();
    $res = $sth->fetchAll();

    echo "<table border='1'>";
    if ($hprice == 9999)
        echo "<tr><th colspan=4>Товари ціною від $price</th></tr>";
    else
    echo "<tr><th colspan=4>Товари ціною від $price до $hprice</th></tr>";
    echo "<tr><td>Назва товару</td><td>Ціна</td><td>Кількість</td><td>Якість</td></tr>";
    foreach($res as $row){
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
    }
    echo "</table>";
}catch(PDOException $ex){
    echo $ex->GetMessage();
}
