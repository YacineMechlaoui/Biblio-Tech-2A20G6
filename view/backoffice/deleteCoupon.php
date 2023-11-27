<?php
include '../../controller/CouponController.php';
$c=new CouponC();

$c->deleteCoupon($_GET['idd']);
header('Location:coupon-list.php');

?>