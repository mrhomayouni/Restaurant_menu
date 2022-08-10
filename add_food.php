<?php
require "_load.php";
if(isset($_POST["new_food_name"],$_POST["name_food_price"],$_POST["add"])){
    $restaurant_id=$_SESSION["restaurant_id"];
    $new_food_name=$_POST["new_food_name"];
    $new_food_price=$_POST["name_food_price"];
    add_food($new_food_name,$new_food_price,$restaurant_id);
    redirect("edit.php");
}

?>
<form action="" method="post">
    <input type="text" name="new_food_name" placeholder="نام غذا را وارد کنید">
    <input type="text" name="name_food_price" placeholder="قیمت غذا را وارد کنید">
    <input type="submit" value="add" name="add">
</form>


