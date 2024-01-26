<?php
    class HTML_Generator
    {
        public function render_input($array){
            foreach($array as $key => $value){
?>
                <label>
                    <?= $key ?> 
                    <input type="text" value="<?= $value ?>">
                </label>
<?php       }
        }

        public function render_list($array, $type){
            if($type === "ordered"){
                $list = "ol";
            }else{
                $list = "ul";
            }

            foreach($array as $arr){
?>
                <<?= $list ?>>
                    <li><?= $arr ?></li>
                </<?= $list ?>>
<?php       }
        }
    }

    $items = ["name" => "Bag", "price" => "250", "stocks" => "10"];
    $fruits = ["Apple", "Banana", "Cherry"];

    $html_generator = new HTML_Generator();

    $html_generator->render_input($items);
    $html_generator->render_list($fruits, "ordered");
    $html_generator->render_list($fruits, "unordered");
?>