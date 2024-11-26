
function validateResetCode() {
    var codeInput = document.getElementById("reset-code");
    var code = codeInput.value;

    // Remove any non-numeric characters from the input
    code = code.replace(/\D/g, '');

    // Update the input field value with the cleaned phone number
    codeInput.value = code;
    checkResetCode();
}

function checkResetCode() {
    var codeInput = document.getElementById("code");
    var codeError = document.getElementById("code-error");
    var code = codeInput.value;

   // Check if the verification code is exactly 6 digits long and contains only numbers
   if (/^\d{6}$/.test(code)) {
    codeError.textContent = ''; // Clear any existing error message
    } else {
        codeError.textContent = 'Reset Code must be 6 digits and contain only numbers'; // Display error message
    }

}