<?php
require "_load.php";
$flag = false;
if (isset($_SESSION["restaurant_id"])) {
    $restaurant_id = $_SESSION["restaurant_id"];
    $restaurant = get_restaurant($restaurant_id);
    if ($restaurant !== false) {
        $foods = get_food_by_restaurant_id($restaurant_id);
        $flag = true;
    } else {
        echo "شناسه رستوران نامعتبر است!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        a{
            text-decoration: none
        }
    </style>
</head>
<?php if ($flag == true) { ?>
    <body style="direction: rtl;text-align: center;display:flex;justify-content: center;align-content: center; flex-direction: column">
    <span style="font-size: 50px"> <?= $restaurant["name"] ?> </span>
    <span style="font-size: 25px"> user: <?= $_SESSION["user_name"] ?>  </span>
    <table style="border: 2px solid blue">
        <tr>
            <th>&nbsp;&nbsp;&nbsp;</th>
            <th>نام غذا</th>
            <th>قیمت</th>
            <th>تصویر</th>
        </tr>
        <?php
        $i = 0;
        foreach ($foods as $food) {
            $i++;
            ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $food["food_name"] ?></td>
                <td><?= $food["price"] ?></td>
                <td><span style='font-size:20px;'>&#9203;</span></td>
                <td><a href="edit_food.php?food_id=<?=$food['id']?>">&#128394; </a> </td>
                <td><a href="delete_food.php?food_id=<?=$food['id']?>"> &#10060;</a> </td>

            </tr>
        <?php } ?>
    </table>
    <a href="add_food.php"> افزودن غذای جدید </a>

    </body>
<?php } ?>

</html>

