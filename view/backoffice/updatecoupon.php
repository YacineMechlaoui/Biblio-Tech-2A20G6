<?php
include '../../controller/CouponController.php';
include '../../model/Coupon.php';
$error = "";

$CouponC = new CouponC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $code = isset($_POST['code']) ? $_POST['code'] : null;
    $discount_percent = isset($_POST['discount_percent']) ? $_POST['discount_percent'] : null;
    $expiration_date = isset($_POST['expiration_date']) ? $_POST['expiration_date'] : null;
    $is_used = isset($_POST['is_used']) ? $_POST['is_used'] : null;

    if ($id && $code && $discount_percent && $expiration_date !== null && $is_used !== null) {

        $coupon = new Coupon($id, $code, $discount_percent, $expiration_date, $is_used);

        $updateSuccess = $CouponC->updateCoupon($coupon, $id);

        if ($updateSuccess) {
            header('Location: coupon-list.php');
            exit(); 
        } else {
            $error = "La mise à jour du coupon a échoué.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

if (isset($_POST['id'])) {
    $coupon = $CouponC->showCoupon($_POST['id']);
} else {

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="coupon-list.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id">ID :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="code">Code :</label></td>
                    <td>
                        <input type="text" id="code" name="code" value="<?php echo $coupon['code'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="discount_percent">Discount_percent :</label></td>
                    <td>
                        <input type="text" id="discount_percent" name="discount_percent" value="<?php echo $coupon['discount_percent'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="expiration_date">Expiration_date :</label></td>
                    <td>
                        <input type="text" id="expiration_date" name="expiration_date" value="<?php echo $coupon['expiration_date'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="is_used">Is_used :</label></td>
                    <td>
                        <input type="text" id="is_used" name="is_used" value="<?php echo $coupon['is_used'] ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>
