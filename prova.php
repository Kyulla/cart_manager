<?php
    require "./Cart.php";
    session_start();
    if(isset($_GET["function"])){
        $items = $_SESSION["cart"];
        $function = $_GET["function"];
        $prova = [5, 1, 10];

        switch($function){
            case("addItem"):
                if(isset($_GET["data-item"])){
                    $parametri = json_decode($_GET["data-item"], true);
                    if($parametri !== null){
                        $item_id = $parametri[0];
                        $quantity = $parametri[1];
                        $price = $parametri[2];
                        
                        $items -> addItem($item_id, $quantity, $price);
                        echo("<script>location='./';</script>");
                    }
                    
                    else{
                        echo ("Errore nella decodifica JSON");
                    }
                }
                else{
                    echo("Get data-item non preso");
                }
                break;
    
            case("removeItem"):
                if(isset($_GET["data-item"])){
                    $parametri = json_decode($_GET["data-item"], true);
                    if($parametri !== null){
                        $item_id = $parametri[0];
                        $quantity = $parametri[1];
                        $price = $parametri[2];
                        
                        $items -> removeItem($item_id, $quantity, $price);
                        echo("<script>location='./prova.php?function=getItems';</script>");
                    }
                    
                    else{
                        echo ("Errore nella decodifica JSON");
                    }
                }
                else{
                    echo("Get data-item non preso");
                }
                break;
    
            case("checkout"):
                echo("<a href='./'><button>Home</button></a>");
                $items -> checkout();
                break;
    
            case("getItems"):
                if(empty($items -> getItems())){
                    echo("<a href='./'><button>Home</button></a><br><h3>Nessun elemento nel carrello</h3>");
                }
                else{
                    echo("<a href='./'><button>Home</button></a><br></ul>");
                    foreach($items -> getItems() as $item){
                        $stringed_item_infos = urlencode(json_encode([$item['item_id'], 1, $item['item_id']]));
                        $delete_url = "prova.php?function=removeItem&data-item=" . $stringed_item_infos;
                        echo("<li>Nome prodotto: ".$item['item_id']." quantità: ".$item['quantity']." <button onclick=\"location='$delete_url'\">Togli 1</button></li>");

                    }
                    echo("</ul>");
                }
                break;
    
            default:
                echo("<script><alert>Function non gestita</alert></script>");
                break;
        }
    }

    else{
        echo("<script><alert>Get function non preso</alert></script>");
    }
?>