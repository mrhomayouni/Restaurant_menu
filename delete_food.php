<?php
require "_load.php";
if(isset($_GET["food_id"])){
    delete_food($_GET["food_id"]);
    redirect("edit.php");
}
