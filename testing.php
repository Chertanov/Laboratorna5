<?php
$dsn = "mysql:host=localhost; dbname=lb_pdo_goods";
$user = "root";
$password = "";

try{
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_PERSISTENT=>True));
    //$smth = $dbh->query("Select name, price from items");
    //if (!$smth){
    //    print_r($dbh->errorinfo());
    //    //print_r($smth->errorInfo());
    //}
    //else{
    $smth = $dbh->prepare("Select price, name from items");
    $smth -> execute();
    $smth -> bindColumn("name",$item2);
    //$item1 = $smth -> fetchColumn();
    if ($smth){
    print_r($smth->errorInfo());}

    class shop_item{}

    echo "<br>";
    //print_r($item1);
    print_r($item2);
    echo "<br>";
    echo "<br>";
    //print_r($result = $smth -> fetchObject("shop_item"));
    $rows = $smth -> fetchall(PDO::FETCH_CLASS, 'shop_item');
    //$rows = $smth -> fetchall(PDO::FETCH_KEY_PAIR);
    //$rows = $smth -> fetchall(PDO::FETCH_COLUMN,1);
    //$rows = $smth -> fetchall(PDO::FETCH_COLUMN);
    foreach($rows as $row){
        print_r($row);
        echo "</br>";
    }//}
    echo "</br>";
    print_r($rows["1500"]);

}
catch(PDOException $error){
    echo $error->GetMessage();
}