<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    ::-webkit-scrollbar {
        width: 5px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #A9A9A9;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }


    html {
        font-size: 62.5%;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
        overflow-x: hidden;
    }

    .side-nav {
        background: #6cdc162a;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
        padding: 15px 20px 0; /* Adjust the top padding to create space for header */
        width: 290px;
        position: fixed;
        z-index: 1;
        height: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        margin-left: 5px;
    }

    .sidebar-header img {
        max-width: 35%;
        height: auto;
    }

    .sidebar-header h1 {
        color: #265426;
        font-size: 2em;
        font-weight: 600;
        cursor: default;
        user-select: none;
        text-transform: uppercase;
    }

    .br-text {
        display: block;
        margin-top: 2px;
        font-size: .7em;
        font-weight: normal;
        text-transform: capitalize;
    }

    .nav-item {
        cursor: pointer;
        list-style: none;
        width: 250px;
        margin-top: 15px;
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 8px;
        color: var(--grey-color);
        white-space: nowrap;
        font-size: 20px;
        color: #265426;
    }

    .nav-item:hover:not(.sign-out) {
        background-color: var(--secondaryColor);
        box-shadow: inset 0 0 0 2px #39FF14;
    }

    .nav-item.active {
        background-color: #333;
        color: white;
        background: linear-gradient(179.1deg, rgb(43, 170, 96) 2.3%, rgb(129, 204, 104) 98.3%);
    }

    .sign-out {
        background-color: red;
        color: white;
    }

    .sign-out:hover {
        background: linear-gradient(108.4deg, rgb(253, 44, 56) 3.3%, rgb(176, 2, 12) 98.4%);
    }

    .sign-out-container {
        margin-top: auto;
        margin-bottom: 20px;
    }

    .content {
        margin-left: 290px;
    }

    #dashboard-content, #client-content, #cancelled-content, #package-content, #totalguest-content, #rooms-content, #inclusions-content,  #totalcancelled-content,  #cancelledguest-content{
        padding: 5px;
        border: none;
    }

    .content-item {
        display: none;
        z-index: 1;
        height: 738px;
        overflow-x: scroll;
    }

    #analytics-submenu{
      text-align: center;
    }

    .sign-out-btn{
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <div class="side-nav" id="myTopnav">
        <div class="sidebar-header">
            <img src="../assets/logo/logo.png" class="img-logo">
            <h1>Natura Verde <span class="br-text">Farm and Private Resort</span></h1>
        </div>

        <ul>
            <li id="dashboard-link" class="nav-item" onclick="showContent('dashboard')"><i class="fa-solid fa-house"></i><span style="padding-left: 15px;">Dashboard</span></li>
            <li class="nav-item" onclick="showContent('client')"><i class="fa-solid fa-user"></i><span style="padding-left: 15px;">Client</span></li>
            <li class="nav-item" onclick="showContent('cancelled')"><i class="fa-solid fa-calendar-xmark"></i><span style="padding-left: 15px;">Cancelled</span></li>
            <li class="nav-item" onclick="showContent('package')"><i class="fa-solid fa-person-swimming"></i><span style="padding-left: 15px;">Packages</span></li>
            <li class="nav-item" onclick="showContent('rooms')"><i class="fa-solid fa-bed"></i><span style="padding-left: 15px;">Rooms</span></li>
            <li class="nav-item" onclick="showContent('inclusions')"><i class="fa-solid fa-pen-to-square"></i><span style="padding-left: 15px;">Inclusions</span></li>
            <li class="nav-item" onclick="showContent('edittermsandconditions')"><i class="fa-solid fa-clipboard-list"></i><span style="padding-left: 15px;">Terms and Conditions</span></li>
            <li class="nav-item" onclick="toggleSubMenu()"><i class="fa-solid fa-chart-bar"></i><span style="padding-left: 15px;">Analytics</span></li>
            <ul id="analytics-submenu" class="submenu">
                <li class="nav-item" onclick="showContent('totalguest')"><span style="padding-left: 30px;"><i class="fa-solid fa-chart-line"></i>&nbsp;Total Guests</span></li>
                <li class="nav-item" onclick="showContent('totalcancelled')"><span style="padding-left: 30px;"><i class="fa-solid fa-square-poll-vertical"></i>&nbsp;Cancelled Guest</span></li>
                <li class="nav-item" onclick="showContent('cancelledreasons')"><span style="padding-left: 30px;"><i class="fa-solid fa-chart-pie"></i>&nbsp;Cancellations</span></li>
            </ul>
            <li class="nav-item" onclick="toggleReportsSubMenu()">
            <i class="fa-solid fa-image"></i><span style="padding-left: 15px;">Gallery</span></li>
            <ul id="reports-submenu" class="submenu">
                <li class="nav-item" onclick="showContent('insertCategory')"><span style="padding-left: 30px;"><i class="fa-solid fa-plus"></i>&nbsp;Add Category</span></li>
                <li class="nav-item" onclick="showContent('editgallery')"><span style="padding-left: 30px;"><i class="fa-solid fa-pen"></i>&nbsp;Update Category</span></li>
               
            </ul>
             
        </ul>

        <div class="sign-out-container">
            <li class="nav-item sign-out" onclick="signOut()">
                <i class="fa-solid fa-sign-out-alt"></i><span style="padding-left: 15px;"><a class="sign-out-btn" href="./logout.php">Sign Out</a></span>
            </li>
        </div>
    </div>

    <div class="content">
    <iframe id="dashboard-content" class="content-item" src="dashboard.php" width="100%" height="100%"></iframe>
    <iframe id="client-content" class="content-item" src="guest_reserved/guest_list.php" width="100%" height="100%"></iframe>
    <iframe id="cancelled-content" class="content-item" src="canceled.php"" width="100%" height="100%"></iframe>
    <iframe id="package-content" class="content-item" src="admin-packagePrices.php" width="100%" height="100%"></iframe>
    <iframe id="rooms-content" class="content-item" src="overnightPrice.php" width="100%" height="100%"></iframe>
    <iframe id="inclusions-content" class="content-item" src="manage_inclusions.php" width="100%" height="100%"></iframe>
    <iframe id="analytics-content" class="content-item" src="total_guest/monthlyGuests_admin.php" width="100%" height="100%"></iframe>
    <iframe id="totalguest-content" class="content-item" src="full_guests_stats.php" width="100%" height="100%"></iframe>
    <iframe id="totalcancelled-content" class="content-item" src="guestsCancelled_stats.php" width="100%" height="100%"></iframe>
    <iframe id="cancelledreasons-content" class="content-item" src="cancelledReasons_admin.php" width="100%" height="100%"></iframe>
    <iframe id="insertCategory-content" class="content-item" src="insertCategory.php" width="100%" height="100%"></iframe>
    <iframe id="editgallery-content" class="content-item" src="editgallery.php" width="100%" height="100%"></iframe>
    <iframe id="edittermsandconditions-content" class="content-item" src="edittermsandconditions.php" width="100%" height="100%"></iframe>
    
    </div>

    <script>
function toggleSubMenu() {
        var submenu = document.getElementById("analytics-submenu");
        if (submenu.style.display === "block" || submenu.style.display === "") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    }

    function activateSubMenuItem(item) {
        // Remove the "active" class from all sub-menu items
        var submenuItems = document.getElementsByClassName("nav-item");
        for (var i = 0; i < submenuItems.length; i++) {
            submenuItems[i].classList.remove("active");
        }

        // Add the "active" class to the clicked sub-menu item
        item.classList.add("active");

        // Call the appropriate function or set the content for the clicked sub-menu item
        // Replace this with your actual code to handle the content for the active sub-menu item
        showContent(item.innerText.trim());
    }


        // JavaScript to change the content when a link is clicked
    document.addEventListener("DOMContentLoaded", function () {
        // Select the "Dashboard" link by its ID
        const dashboardLink = document.getElementById("dashboard-link");

        // Add the "active" class to make it active by default
        dashboardLink.classList.add("active");

        // Show the "Dashboard" content by default
        showContent("dashboard");
    });

    function showContent(contentId) {
        const contentItems = document.querySelectorAll('.content-item');
        contentItems.forEach(item => item.style.display = 'none');

        const selectedContent = document.getElementById(contentId + '-content');
        selectedContent.style.display = 'block';

        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => item.classList.remove('active'));

        // Add the "active" class to the clicked navigation item
        const clickedNavItem = document.querySelector(`[onclick="showContent('${contentId}')"]`);
        clickedNavItem.classList.add('active');
    }


        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "side-nav") {
                x.className += " responsive";
            } else {
                x.className = "side-nav";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const navItems = document.querySelectorAll(".nav-item");
            const sideNav = document.querySelector(".side-nav");

            navItems.forEach(navItem => {
                navItem.addEventListener("click", function () {
                    sideNav.classList.toggle("responsive");
                });
            });
        });

        function signOut() {
            // Add your sign out logic here
        }

        function toggleReportsSubMenu() {
    var reportsSubmenu = document.getElementById("reports-submenu");
    if (reportsSubmenu.style.display === "block" || reportsSubmenu.style.display === "") {
        reportsSubmenu.style.display = "none";
    } else {
        reportsSubmenu.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function () {
        const dashboardLink = document.getElementById("dashboard-link");
        dashboardLink.classList.add("active");
        showContent("dashboard");

        // Check if the page is being loaded or refreshed
        if (performance.navigation.type === 1) {
            // Page is being refreshed, close the submenu
            closeSubMenu();
        }
    });

    function closeSubMenu() {
        var submenu = document.getElementById("analytics-submenu");
        if (submenu.style.display === "block" || submenu.style.display === "") {
            submenu.style.display = "none";
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const dashboardLink = document.getElementById("dashboard-link");
        dashboardLink.classList.add("active");
        showContent("dashboard");

        // Check if the page is being loaded or refreshed
        if (performance.navigation.type === 1) {
            // Page is being refreshed, close the submenus
            closeSubMenu("analytics-submenu");
            closeSubMenu("reports-submenu");
        }
    });

    function closeSubMenu(submenuId) {
        var submenu = document.getElementById(submenuId);
        if (submenu.style.display === "block" || submenu.style.display === "") {
            submenu.style.display = "none";
        }
    }
    </script>
</body>

</html>