document.addEventListener("DOMContentLoaded", function() {
  var showDayTourBtn = document.getElementById("showDayTourBtn");
  var showNightTourBtn = document.getElementById("showNightTourBtn");
  var showOvernightBtn = document.getElementById("showOvernightBtn");

  var daytourpopup = document.getElementById("daytourpopup");
  var nighttourpopup = document.getElementById("nighttourpopup");
  // var overnighttourpopup = document.getElementById("overnighttourpopup");
  var overnight = document.getElementById("overnight");

  var overlay = document.querySelector(".overlay");
  var closeDayPopupButton = document.getElementById("closeDayPopupButton");
  var closeNightPopupButton = document.getElementById("closeNightPopupButton");
  var closeOvernightBtn = document.getElementById("closeOvernightBtn");

    showDayTourBtn.addEventListener("click", function() {
    daytourpopup.style.display = "block";
    overlay.style.display = "block";
    });
    closeDayPopupButton.addEventListener("click", function() {
    daytourpopup.style.display = "none";
    overlay.style.display = "none";
    });

    showNightTourBtn.addEventListener("click", function() {
    nighttourpopup.style.display = "block";
    overlay.style.display = "block";
    });

    closeNightPopupButton.addEventListener("click", function() {
    overnight.style.display = "none";
    overlay.style.display = "none";
    });
   
    showOvernightBtn.addEventListener("click", function() {
      overnight.style.display = "block";
      overlay.style.display = "block";
    });
  
    closeOvernightBtn.addEventListener("click", function() {
      overnight.style.display = "none";
      overlay.style.display = "none";
    });
});
