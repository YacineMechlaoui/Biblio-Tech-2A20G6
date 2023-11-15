function validateSignInForm() {
    var signInEmail = document.getElementById("signInEmail").value;
    var signInPassword = document.getElementById("signInPassword").value;

    // Simple validation example (you can customize this based on your needs)
    if (signInEmail === "" || signInPassword === "") {
        alert("Please fill out all fields.");
        return false;
    }

    // Additional validation logic can be added here

    // If the form is valid, you can proceed with the submission
    alert("Sign In Successful!"); // Replace this with your sign-in logic
    return true;
}

function validateSignUpForm() {
    var signUpName = document.getElementById("signUpName").value;
    var signUpEmail = document.getElementById("signUpEmail").value;
    var signUpPassword = document.getElementById("signUpPassword").value;

    // Simple validation example (you can customize this based on your needs)
    if (signUpName === "" || signUpEmail === "" || signUpPassword === "") {
        alert("Please fill out all fields.");
        return false;
    }

    // Additional validation logic can be added here

    // If the form is valid, you can proceed with the submission
    alert("Sign Up Successful!"); // Replace this with your sign-up logic
    return true;
}
