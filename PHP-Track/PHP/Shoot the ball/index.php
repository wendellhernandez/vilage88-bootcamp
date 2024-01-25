<?php

$fail = 0;
$success = 0;

echo "Practice starts...<br>";

for($i=1; $i<=1000; $i++){
    $random = rand(1,2);
    

    if($random === 1){
        echo "Attempt #$i: Shooting the ball... Success! ... ";
        $success++;
    }else{
        echo "Attempt #$i: Shooting the ball... Epic Fail! ... ";
        $fail++;
    }

    echo "Got $success x success and $fail x epic fail(s) so far <br>";
}

?>