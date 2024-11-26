document.addEventListener("DOMContentLoaded", function() {
    var showttakeatourBtn = document.getElementById("showttakeatourBtn");
   
  
    var takeatour = document.getElementById("takeatour");
    
  
    var overlay = document.querySelector(".overlay");
    var closeTakeATourButton = document.getElementById("closeTakeATourButton");
    
      showttakeatourBtn.addEventListener("click", function() {
      takeatour.style.display = "block";
      overlay.style.display = "block";
      });
      closeTakeATourButton.addEventListener("click", function() {
      takeatour.style.display = "none";
      overlay.style.display = "none";
      });
  
  });
  