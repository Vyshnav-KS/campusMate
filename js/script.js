/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function topNavfn() {
    var x = document.getElementById("myTopnavbar");
    if (x.className === "topNavbar") {
      x.className += " responsive";
    } else {
      x.className = "topNavbar";
    }
  } 