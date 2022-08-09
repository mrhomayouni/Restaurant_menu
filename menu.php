<?php
require "_load.php";
$flag = false;
if (isset($_GET["restaurant_id"])) {
    $restaurant_id = $_GET["restaurant_id"];
    $restaurant = get_restaurant($restaurant_id);
    if ($restaurant !== false) {
        $foods = get_food($restaurant_id);
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
</head>
<?php if ($flag == true) { ?>
    <body style="direction: rtl;text-align: center;display:flex;justify-content: center;align-content: center; flex-direction: column">
    <span style="font-size: 50px"> <?= $restaurant["name"] ?> </span>
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

            </tr>
        <?php } ?>
    </table>

    </body>
<?php } ?>

</html>

