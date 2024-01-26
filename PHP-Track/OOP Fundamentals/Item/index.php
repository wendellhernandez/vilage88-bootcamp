<?php
    class Item
    {
        private $name;
        private $price;
        private $stock;
        private $sold;

        public function __construct($name, $price, $stock, $sold = 0){
            $this->name = $name;
            $this->price = $price;
            $this->stock = $stock;
            $this->sold = $sold;
        }

        public function logDetails(){
            echo "name: $this->name <br>
            price: $this->price <br>
            stock: $this->stock <br>
            sold: $this->sold <br><hr>";
        }

        public function buy(){
            echo "Buying  <br>";
            $this->stock--;
            $this->sold++;
        }

        public function return(){
            echo "Returning  <br>";
            if($this->stock > 0){
                $this->stock++;
                $this->sold--;
            }else{
                echo "Sorry. We are out of stock  <br>";
            }
        }
    }

    $item1 = new Item("Facebook" , "500" , "35");
    $item2 = new Item("Apple" , "700" , "45");
    $item3 = new Item("Tesla" , "600" , "55");

    //Item 1
    $item1->buy();
    $item1->buy();
    $item1->buy();
    $item1->return();
    $item1->logDetails();

    //Item 2
    $item2->buy();
    $item2->buy();
    $item2->return();
    $item2->return();
    $item2->logDetails();

    //Item 3
    $item3->return();
    $item3->return();
    $item3->return();
    $item3->logDetails();
?>