<?php
require "_load.php";
if (isset($_POST["submit"], $_POST["username"], $_POST["password"], $_POST["restaurant_id"])) {
    $restaurant_id=$_POST["restaurant_id"];
    $user_name =$_POST["username"];
    $password =$_POST["password"];
    $restaurant = get_restaurant($restaurant_id);
    if ($restaurant === false) {
        echo "شناسه رستوران نامعتبر است!!!";
    }else{
        if($user_name===$restaurant["user_name"] && $password===$restaurant["password"]){
            $_SESSION["restaurant_id"]=$restaurant_id;
            $_SESSION["user_name"]=$user_name;
            redirect("edit.php");
        }else{
            echo "نام کاربری یا رمز عبور اشتباه است!!!";
        }

    }


}
?>

<form action="" method="post">
    <input type="text" name="restaurant_id" placeholder="شناسه رستوران">
    <input type="text" name="username" placeholder="نام کااربری">
    <input type="text" name="password" placeholder="رمز عبور">
    <input type="submit" name="submit" value="send">
</form>
