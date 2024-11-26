document.addEventListener("DOMContentLoaded", function() {
    var popupButtons = document.querySelectorAll(".showOvernightBtn");
    var overlay = document.querySelector(".overlay");

    // var showOvernightBtn = document.getElementById("");
    // var overnight = document.getElementById("overnight");
    // var closeOvernightBtn = document.getElementById("closeOvernightBtn");

    popupButtons.forEach(function(button) {
        var popupId = button.getAttribute("data-popup");
        var popup = document.getElementById(popupId);
        var closeBtn = popup.querySelector(".close-btn");
    
        button.addEventListener("click", function() {
          popup.style.display = "block";
          overlay.style.display = "block";
        });
    
        closeBtn.addEventListener("click", function() {
          popup.style.display = "none";
          overlay.style.display = "none";
        });
    });
});
  


    
    //   showOvernightBtn.addEventListener("click", function() {
    //     overnight.style.display = "block";
    //     overlay.style.display = "block";
    //   });
    
    //   closeOvernightBtn.addEventListener("click", function() {
    //     overnight.style.display = "none";
    //     overlay.style.display = "none";
    //   });
