<?php
    class Cart{
        public $items;
        public $final_price;

        public function __construct(){
            $this -> reset();
        }

        public function reset(){
            $this -> items = array();
            $this -> final_price = 0;
        }

        //aggiustato addItem nel caso in cui un oggetto è già presente
        public function addItem(int $id, int $quantity, int $price){
            if(empty($this -> items)){
                array_push($this -> items, array("item_id" => $id, "quantity" => $quantity));
            }

            else{
                foreach($this -> items as $key => $item){
                    if($item["item_id"] === $id){
                        $this -> items[$key]["quantity"] += $quantity;
                    }

                    else{
                        array_push($this -> items, array("item_id" => $id, "quantity" => $quantity));
                    }
                }
            }
            $this -> final_price += ($price * $quantity);
        }

        public function removeItem(int $id, int $quantity, int $price){
            foreach($this -> items as $key => $item){
                if($item["item_id"] === $id){
                    if($item["quantity"] === $quantity){
                        unset($this -> items[$key]);
                    }

                    elseif($item["quantity"] > $quantity){
                        $this -> items[$key]["quantity"] -= $quantity;
                    }

                    $this -> final_price -= ($price * $quantity);
                    return;
                }
            }
        }

        public function checkout(){
            if(!empty($this -> items)){
                $this -> reset();
            }
        }
    }
?>