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
        echo("Sessione non presente ");
        var_dump($cart);
      }

      else {
        $cart = $_SESSION["cart"];
        echo("Sessione già presente ");
        var_dump($cart);
      }
    ?>
    <span class="debug">
      <form action="prova.php" method="get">
        <input type="radio" name="function" value="addItem"> Aggiungi item
        <input type="radio" name="function" value="removeItem"> Rimuovi item
        <input type="radio" name="function" value="checkout"> Checkout
        <input type="radio" name="function" value="prova"> prova
        <button>Invio</button>
      </form>
    </span>
    <h2 id="pagina">Pagina 0</h2>
    <button id="-" onclick="cambiaPagina('-')" disabled>Indietro 0</button>
    <button id="+" onclick="cambiaPagina('+')">Avanti 1</button>
    <form action="" method="get"> <div id="display"></div> </form>
    <script src="Main.js"></script>
  </body>
</html>