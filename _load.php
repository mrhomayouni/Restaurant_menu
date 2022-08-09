<?php
try{
    $db= new PDO("mysql:host=localhost;dbname=restaurant_menu","root","");
    $db->exec("SET NAMES UTF8");
}catch (PDOException $e){
    echo "error".$e->getMessage();
    exit();
}
function get_restaurant($id){
    global $db;
    $sql="SELECT * FROM `restaurants` WHERE `id`=:id  ";
    $stmt=$db->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->execute();
    $restaurant=$stmt->fetch(PDO::FETCH_ASSOC);
    return $restaurant;
}
function get_food($restaurant_id){
    global $db;
    $sql="SELECT * FROM `foods` WHERE `restaurant_id`=:restaurant_id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam("restaurant_id",$restaurant_id);
    $stmt->execute();
    $foods=$stmt->fetchAll();
    return $foods;

}

















?>