function openNav() {
  console.log("openNav called"); // added this line
  var sideNav = document.getElementById("mySidenav");
  var overlay = document.getElementById("myOverlay");

  if (sideNav.style.width === "0px" || sideNav.style.width === "") {
      sideNav.style.width = "250px";
      overlay.style.width = "100%";
      overlay.style.display = "block";
  } else {
      sideNav.style.width = "0";
      overlay.style.width = "0%";
      overlay.style.display = "none";
  }
}




