function capitalizeInput(input) {
    input.value = input.value.toUpperCase();
  }
document.addEventListener("DOMContentLoaded", function () {
    var firstnameInput = document.getElementById("firstname");
    var middlenameInput = document.getElementById("middlename");
    var lastnameInput = document.getElementById("lastname");

    firstnameInput.addEventListener("input", sanitizeInput);
    middlenameInput.addEventListener("input", sanitizeInput);
    lastnameInput.addEventListener("input", sanitizeInput);

    function sanitizeInput() {
        var inputValue = this.value;
        var sanitizedValue = inputValue.replace(/[^A-Za-z\s]/g, ''); // Remove non-alphabetic and non-space characters
        sanitizedValue = sanitizedValue.slice(0, 50); // Limit to 50 characters

        if (inputValue !== sanitizedValue) {
            this.value = sanitizedValue;
        }
    }
});