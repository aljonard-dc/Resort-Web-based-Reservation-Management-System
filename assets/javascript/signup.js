// show and hide password

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
    var fullnameInput = document.getElementById("fullname");

    fullnameInput.addEventListener("input", function () {
        var inputValue = this.value;
        var sanitizedValue = inputValue.replace(/[^A-Za-z\s]/g, ''); // Remove non-alphabetic and non-space characters
        sanitizedValue = sanitizedValue.slice(0, 50); // Limit to 50 characters

        if (inputValue !== sanitizedValue) {
            this.value = sanitizedValue;
        }
    });
});

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