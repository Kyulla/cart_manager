<!DOCTYPE html>
<html lang="it">
  <head>
	<link href="./style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href=""/>
	<meta name="description" content="e-commerce">
	<meta name="keywords" content="e-commerce">
	<meta name="author" content="Alessandro Colla">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>e-commerce</title>
  </head>
  <body>
    <?php
      include "./Cart.php";
      session_start();

      if(!isset($_SESSION["cart"])){
        $cart = new Cart();
        $_SESSION["cart"] = $cart;
      }

      else {
        $cart = $_SESSION["cart"];
      }
    ?>
    <span class="debug">
      <button onclick="location='./prova.php?function=getItems'">Carrello</button>
      <button onclick="location='./prova.php?function=checkout'">Checkout</button>
    </span>
    <h2 id="pagina">Pagina 0</h2>
    <button id="-" onclick="cambiaPagina('-')" disabled>Indietro 0</button>
    <button id="+" onclick="cambiaPagina('+')">Avanti 1</button>
    <div id="display"></div>
    <script src="Main.js"></script>
  </body>
</html>