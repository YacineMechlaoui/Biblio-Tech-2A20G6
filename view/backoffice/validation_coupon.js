// 

function validateCoupon() {
    var code = document.getElementById("code").value;
    var discount_percent = document.getElementById("discount_percent").value;
    var expiration_date = document.getElementById("expiration_date").value;
    var isUsed = document.getElementById("isUsed").checked;
  
    if (code === "" || discount_percent === "" || expiration_date === "") {
      alert("Veuillez remplir tous les champs.");
      return;
    }
  
    if (!/^\d{4}-\d{2}-\d{2}$/.test(expiration_date)) {
      alert("La date d'expiration doit être au format YYYY-MM-DD.");
      return;
    }
  
    if (isNaN(parseFloat(discount_percent)) || parseFloat(discount_percent) < 0 || parseFloat(discount_percent) > 100) {
      alert("Le pourcentage de réduction doit être un nombre entre 0 et 100.");
      return;
    }
  
    
  }
  