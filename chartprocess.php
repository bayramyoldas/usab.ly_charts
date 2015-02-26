<?php
if(isset($_POST["piechart_elements"])){
    
    $capture_field_vals ="";
    foreach($_POST["piechart_elements"] as $key => $text_field){
        $capture_field_vals .= $text_field .", ";
    }
    
    echo $capture_field_vals;
}
?>