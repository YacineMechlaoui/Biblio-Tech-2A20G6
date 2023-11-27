<?php
include '../../controller/CouponController.php';
include '../../model/Coupon.php';
$CouponC= new CouponC();
if(
isset($_POST['code'])&&
isset($_POST['discount_percent'])&&
isset($_POST['expiration_date'])&&
isset($_POST['is_used']))
{
    if(!empty($_POST['code'])&&
    !empty($_POST['discount_percent'])&&
    !empty($_POST['expiration_date'])&&
    !empty($_POST['is_used'])
    )
{
$coupon=new coupon(NULL,$_POST['code'],$_POST['discount_percent'],$_POST['expiration_date'],$_POST['is_used']);
$CouponC->addCoupon($coupon);
header('Location:coupon-list.php');
}
else
echo'Missing information';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Validation de Coupon</title>
  <script>
    function validateForm() {
      var code = document.getElementsByName("code")[0].value;
      var discountPercent = document.getElementsByName("discount_percent")[0].value;
      var expirationDate = document.getElementsByName("expiration_date")[0].value;
      var isUsed = document.getElementsByName("is_used")[0].value;

      if (code === "" || discountPercent === "" || expirationDate === "" || isUsed === "") {
        alert("Veuillez remplir tous les champs.");
        return false;
      }

      if (isNaN(parseFloat(discountPercent)) || parseFloat(discountPercent) < 0 || parseFloat(discountPercent) > 100) {
        alert("Le pourcentage de réduction doit être un nombre entre 0 et 100.");
        return false;
      }

      var today = new Date();
      var inputDate = new Date(expirationDate);

      if (inputDate <= today) {
        alert("La date d'expiration doit être dans le futur.");
        return false;
      }

      if (isUsed !== "true" && isUsed !== "false") {
        alert("La valeur du champ IsUsed doit être 'true' ou 'false'.");
        return false;
      }

      return true; // Soumettre le formulaire si la validation réussit
    }
  </script>
</head>
<body>
  <form action="" method="POST" onsubmit="return validateForm()">
    Code: <input type="text" name="code"><br>
    DiscountPercent: <input type="text" name="discount_percent"><br>
    ExpirationDate: <input type="date" name="expiration_date"><br>
    IsUsed: <input type="text" name="is_used"><br>
    <input type="submit" value="Save">
    <input type="reset" value="Annuler">
  </form>
</body>
</html>
