<?php
require "_load.php";
if(isset($_GET["food_id"])){
    $food_id=$_GET["food_id"];
    $food=get_food_by_food_id($food_id);
    if(isset($_POST["send"])){
        $new_food_name=$_POST["edited_food_name"];
        $new_food_price=$_POST["edited_food_price"];
        $date=date("y/m/d");
        edit_food($food_id,$new_food_name,$new_food_price,$date);
        redirect("edit.php");
    }
}
?>
<form action="" method="post">
    <input type="text" name="edited_food_name" value="<?=$food["food_name"]?>">
    <input type="text" name="edited_food_price" value="<?=$food["price"]?>">
    <input type="submit" name="send" value="edit">
</form>

