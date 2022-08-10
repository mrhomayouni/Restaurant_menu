<?php
session_start();
try{
    $db= new PDO("mysql:host=localhost;dbname=restaurant_menu","root","");
    $db->exec("SET NAMES UTF8");
}catch (PDOException $e){
    echo "error".$e->getMessage();
    exit();
}

function redirect($path){
    header("Location:".$path);
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

function get_food_by_restaurant_id($restaurant_id){
    global $db;
    $sql="SELECT * FROM `foods` WHERE `restaurant_id`=:restaurant_id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam("restaurant_id",$restaurant_id);
    $stmt->execute();
    $foods=$stmt->fetchAll();
    return $foods;
}
function delete_food($id){
    global $db;
    $sql="DELETE FROM `foods` WHERE `id`=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->execute();
}
function get_food_by_food_id($id){
    global $db;
    $sql="SELECT `id`, `food_name`, `price`, `picture`, `restaurant_id` FROM `foods` WHERE `id`=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindparam("id",$id);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
function edit_food($food_id,$food_name,$price,$last_update){
    global $db;
    $sql="UPDATE `foods` SET `food_name`=:food_name,`price`=:price,
                   `last_update`=:last_update WHERE `id`=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindparam("id",$food_id);
    $stmt->bindparam("food_name",$food_name);
    $stmt->bindparam("price",$price);
    $stmt->bindparam("last_update",$last_update);
    $stmt->execute();
}
function add_food($food_name,$price,$restaurant_id){
    global $db;
    $sql="INSERT INTO `foods`(`food_name`, `price`, `restaurant_id`)
 VALUES (:food_name,:price,:restaurant_id)";
    $stmt=$db->prepare($sql);
    $stmt->bindParam("food_name",$food_name);
    $stmt->bindparam("price",$price);
    $stmt->bindParam("restaurant_id",$restaurant_id);
    $stmt->execute();
}


?>