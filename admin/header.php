<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <title>Header</title>

   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

header{
  width: 100%;
  height: 12vh;
  background: #6cdc162a;
}

#navbar{
  padding: 5px 40px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#navbar ul{
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}

#navbar ul li{
  text-transform: uppercase ;
  padding: 15px 0; 
}

#navbar ul li.items{
  position: relative;
  width: auto;
  margin: 0 26px;
  text-align: center;
  order: 3;
  user-select: none;
}

#navbar ul li.items:after{
  position: absolute;
  content: '';
  left: 0;
  bottom: 5px;
  height: 2px;
  width: 100%;
  background:#6ECB63;
  opacity: 0;
  transition: all 0.2s linear;
  
}

#navbar ul li.items:hover:after{
  opacity: 1;
  bottom: 8px;
  
}

#navbar ul li.natura-title{
  flex: 1;
  color: #243b16;
  font-size: 1.3em;
  font-weight: 600;
  user-select: none;
}

#navbar ul li a{

  font-size: 18px;
  font-style: bold;
  text-decoration: none;
  transition: .4s;
  color: #243b16;
}
/* #booknow-txt{
  border: 3px solid green;
  padding: 13px;
} */
#navbarul li:hover a{
  color: rgb(173, 235, 195);
}

#navbar ul li i{
  font-size: 23px;
}

#navbar ul li.btn-menu{
  display: none;
}

#navbar ul li.btn-menu.hide i:before{
  
  content: '\f00d';
}

.natura-logo{
  width: 80px;
  height: 80px;
  cursor: pointer;
}


@media all and (max-width: 1300px){
  #navbar{
    padding: 5px 30px;
  }
  #navbar ul li.items{
    width: 100%;
    display: none;
  }
  #navbar ul li.items.show{
    display: block;
  }
  #navbar ul li.btn-menu{
    display: block;
  }
  #navbar ul li.items:hover{
    
    border-radius: 5px;
    box-shadow: inset 0 0 5px  #33ff69,
                inset 0 0 10px #36f900;
  }
  #navbar ul li.items:hover:after{
    
    opacity: 0;
  }
}

@media all and (max-width: 900px){
  #navbar{
    padding: 5px 30px;
  }
  #navbar ul li.items{
    width: 100%;
    display: none;
  }
  #navbar ul li.items.show{
    display: block;
  }
  #navbar ul li.btn-menu{
    display: block;
  }
  #navbar ul li.items:hover{
    border-radius: 5px;
    box-shadow: inset 0 0 5px  #33ff69,
                inset 0 0 10px #36f900;
  }
  #navbar ul li.items:hover:after{
    opacity: 0;
  }
}

@media all and (max-width: 700px){
  #navbar{
    padding: 5px 30px;
  }
  #navbar ul li.items{
    width: 100%;
    display: none;
  }
  #navbar ul li.items.show{
    display: block;
  }
  #navbar ul li.btn-menu{
    display: block;
  }
  #navbar ul li.items:hover{
    border-radius: 5px;
    box-shadow: inset 0 0 5px  #33ff69,
                inset 0 0 10px #36f900;
  }
  #navbar ul li.items:hover:after{
    opacity: 0;
  }
  #navbar ul li.natura-title{
    font-size: 18px;
    align-self: center;
  }
}

@media all and (max-width: 400px){
  #navbar ul li.natura-title{
    font-size: 15px;
  }
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .hero {
  padding-top: 102px;
}

</style>

<body>
  
<header>
   
  <div id="navbar">
      <ul>
       <a href="index.php"><img src="../assets/logo/logo.png" alt="" class="natura-logo"></a>
        <li class="natura-title">&ensp;&ensp;&ensp;&ensp;&ensp;Natura Verde <br>Farm and Private Resort</li>
        <li class="items"><a href="dashboard.php"><i class="fa-solid fa-house"></i><span style="padding-left: 10px;">Dashboard</span></a></li>
        <li class="items"><a href="gallery.php"><i class="fa-solid fa-calendar-days"></i><span style="padding-left: 15px;">Calendar</span></a></li>
        <li class="items"><a id="showttakeatourBtn"><i class="fa-solid fa-list-check"></i><span style="padding-left: 15px;">Guest List</span></a></li>
        <li class="items"><a href="about-us.php"><i class="fa-solid fa-chart-line"></i><span style="padding-left: 15px;">Statistics</span></a></li>
        <li class="btn-menu"><a href="#"><i class="fas fa-bars"></i></a></li>
      </ul>
   </div>

  </header>
  
</body>

<script>
      $(document).ready(function(){
        $('.btn-menu').click(function(){
          $('.items').toggleClass("show");
          $('ul li').toggleClass("hide");
        });
      });

      window.onscroll = function() {myFunction()};

      window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</html>