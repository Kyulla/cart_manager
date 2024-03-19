<?php
    require "./Cart.php";
    session_start();
    echo(var_dump($_GET["function"]));
    echo(var_dump($_SESSION["cart"]));
    if(isset($_GET["function"])){
        $function = $_GET["function"];

        switch($function){
            case("addItem"):
                $_SESSION["cart"] -> addItem(5, 1, 10);
                break;
    
            case("removeItem"):
                $_SESSION["cart"] -> removeItem(5, 1, 10);
                break;
    
            case("checkout"):
                $_SESSION["cart"] -> checkout();
                break;
    
            case("prova"):
                echo("<script><alert>Prova</alert></script>");
                break;
    
            default:
                echo("<script><alert>Caso non gestito</alert></script>");
        }
    }

    else{
        echo("<script><alert>Get non preso</alert></script>");
    }
?>