// show and hide password
function capitalizeInput(input) {
    input.value = input.value.toUpperCase();
  }
  
var a;
function pass(){
    if(a == 1){
        document.getElementById('password').type='password';
        document.getElementById('pass-icon').src='assets/icons/eye-close.png';
        a=0;
    }else{
        document.getElementById('password').type='text';
        document.getElementById('pass-icon').src='assets/icons/eye-open.png';
        a=1;
    }
}

// ---------------------------------------- //
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
function validateAge() {
    var AgeInput = document.getElementsByName("age")[0];
    var Age = AgeInput.value;

    // Remove any non-numeric characters from the input
    Age = Age.replace(/\D/g, '');

    // Update the input field value with the cleaned phone number
    AgeInput.value = Age;
}

function checkAge() {
    var AgeInput = document.getElementsByName("age")[0];
    var AgeError = document.getElementById("age-error");
    var Age = AgeInput.value;

    // Check if the phone number is 11 digits long
    if (Age.length === 2) {
        AgeError.textContent = ''; // Clear any existing error message
    } else {
        AgeError.textContent = 'Age must be 2 digits.'; // Display error message
    }
}

function validatePhoneNumber() {
    var phoneNumberInput = document.getElementsByName("phonenumber")[0];
    var phoneNumber = phoneNumberInput.value;

    // Remove any non-numeric characters from the input
    phoneNumber = phoneNumber.replace(/\D/g, '');

    // Update the input field value with the cleaned phone number
    phoneNumberInput.value = phoneNumber;
}

function checkPhoneNumber() {
    var phoneNumberInput = document.getElementsByName("phonenumber")[0];
    var phoneNumberError = document.getElementById("phonenumber-error");
    var phoneNumber = phoneNumberInput.value;

    // Check if the phone number is 11 digits long
    if (phoneNumber.length === 11) {
        phoneNumberError.textContent = ''; // Clear any existing error message
    } else {
        phoneNumberError.textContent = 'Phone number must be 11 digits.'; // Display error message
    }
    

}