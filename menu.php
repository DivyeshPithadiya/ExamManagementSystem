<!DOCTYPE html>
<html>
<head>

<style>
body {
  font-family: "Lato", sans-serif;
}


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;

}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
  margin-top:20;
}

.sidenav a:hover {
  color: #9d0806;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 40px;
  margin-left: 50px;
}

#main {

  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Home</a>
  <a href="userlogin.php">Faculty Login</a>
  <a href="showLab.php">Practical/Oral Time Table</a>
  <a href="showTT.php">Term Test Time Table</a>
  <a href="noticeShow.php">Notice Board</a>
  <a href="login.php">Admin Login / Admin Panel</a>

</div>

<div id="main">
  <span  style=" $size:250px; font-size:30px;cursor:pointer;position:absolute;top:60;left:40;float:left;" onclick="openNav()">&#9776;</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 