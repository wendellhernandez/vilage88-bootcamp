<?php
    class Character
    {
        protected $name;
        protected $health;
        protected $stamina;
        protected $manna;

        public function __construct($name){
            $this->name = $name;
            $this->health = 100;
            $this->stamina = 100;
            $this->manna = 100;
        }

        public function walk(){
            $this->stamina--;

            return $this;
        }

        public function run(){
            $this->stamina -= 3;

            return $this;
        }

        public function showStats(){
            echo "name: $this->name <br>";
            echo "health: $this->health <br>";
            echo "stamina: $this->stamina <br>";
            echo "manna: $this->manna <br><hr>";
        }
    }

    class Shaman extends Character
    {
        public function __construct($name){
            parent::__construct($name);

            $this->health = 150;
        }

        public function heal(){
            $this->health += 5;
            $this->stamina += 5;
            $this->manna += 5;

            return $this;
        }
    }

    class Swordsman extends Character
    {
        public function __construct($name){
            parent::__construct($name);

            $this->health = 170;
        }

        public function slash(){
            $this->manna -= 10;

            return $this;
        }

        public function showStats(){
            echo "I am powerful <br>";

            parent::showStats();
        }
    }

    $character = new Character("character");
    $shaman = new Shaman("shaman");
    $swordsman = new Swordsman("swordsman");

    $character->walk()->walk()->walk()->run()->run()->showStats();
    $shaman->walk()->walk()->walk()->run()->run()->heal()->showStats();
    $swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats();
    $character->slash()->heal();
?>