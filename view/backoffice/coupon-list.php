<?php
include '../../controller/CouponController.php';
$c=new CouponC();
$tab=$c->listCoupon();


?>

<center><h1>Coupons list</h1>
<h1><a href="add-coupon.php">Add a Coupon</h1></center>
<table border="1" width="70%" align="center">
    <tr>
<th>CouponID</th>
<th>Code</th>
<th>Discount_Percent</th>
<th>Expiration_Date</th>
<th>Is_Used</th>

</tr>
<?php
foreach ($tab as $coupon)
{
?>
<tr><td><?php echo $coupon['id']?> </td>
<td><?=  $coupon['code'] ?></td>
<td><?=  $coupon['discount_percent']?> </td>
<td><?= $coupon['expiration_date'] ?></td>
<td><?=  $coupon['is_used'] ?></td>
<td align="center">
                <form method="POST" action="updateCoupon.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $coupon['id']; ?> name="id">
                </form>
            </td>
<td><a href="deleteCoupon.php?idd=<?php echo $coupon['id'];?>">delete</td>

<?php }?>

</table>
