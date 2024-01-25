<?php
    function create_image($rand){
        if(isset($_GET['text'])){
            //let the browser know that this is an image
            header("Content-type: image/png");

            $string = $_GET['text']; // text to put on image

            $image = imagecreatefrompng('assets/nikke.png'); //image to put in background

            $font_color = imagecolorallocate(
                $image, 
                255, 255, 255 //rgb for white
            );

            $font_size = 100;

            //add the string to the image
            imagestring(
                $image, 
                $font_size, 
                250, // x coordinate from top left
                10, // y coordinate from top left
                $string . ' ' . $rand, // text to put on image
                $font_color
            );

            //send the image
            imagepng($image);

            //best practice
            imagedestroy($image);
        }
    }

    create_image(rand(1,100));
?>