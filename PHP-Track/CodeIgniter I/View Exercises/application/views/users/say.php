<?php
    if(!is_numeric($number)){
?>
        <p>Sorry. This url does not meet our requirement.</p>
<?php
    }else{
        for($i=0; $i<$number; $i++){
?>
        <p><?= $message ?></p>
<?php
        }
    }
?>