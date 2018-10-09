<!DOCTYPE html>
<html>
<title>Próbka kodu</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/css/styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Aplikacja testowa</b></h3>
  </div>
  <div class="w3-bar-block">
  	<p>Menu główne</p>
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Strona główna</a>
    <a href="tabela" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tabela z danymi</a>


  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Proste zadanie</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

<!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>{$strona['nazwa']}</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>{$strona['opis_big']}</p>
  </div>

  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    
