<?php
    class House
    {
        private $location;
        private $price;
        private $lot;
        private $type;
        private $discount;
        private $total_price;

        public function __construct($location, $price, $lot, $type){
            $this->location = $location;
            $this->price = $price;
            $this->lot = $lot;
            $this->type = $type;

            if($type === "Pre-selling"){
                $this->discount = 0.2;
            }else{
                $this->discount = 0.05;
            }

            $this->total_price = $price*(1 - $this->discount);

            $this->show_all();
        }

        private function show_all(){
            echo "Location: " . $this->location . "<br>";
            echo "Price: " . $this->price . "<br>";
            echo "Lot: " . $this->lot . "<br>";
            echo "Type: " . $this->type . "<br>";
            echo "Discount: " . $this->discount . "<br>";
            echo "Total Price: " . $this->total_price . "<br><hr>";
        }
    }

    $house1 = new House("La Union", 1500000, "100sqm", "Pre-selling");
    $house2 = new House("Metro Manila", 1000000, "150sqm", "Ready for Occupancy");
    $house3 = new House("Baguio", 1200000, "120sqm" , "Pre-selling");
    $house4 = new House("USA", 3500000, "80sqm", "Ready for Occupancy");
    $house5 = new House("China", 1800000, "140sqm", "Ready for Occupancy");
?>