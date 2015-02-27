<?php
include ("config/db.php");

if(isset($_POST["piechart_elements"]) && isset($_POST["piechart_element_values"]) && isset($_POST["piechart_title"])){
    
    $piechart_elements ="";
    $piechart_values ="";
    $piechart_title = $_POST["piechart_title"];
    foreach($_POST["piechart_elements"] as $key => $text_field){
        $piechart_elements .= $text_field .", ";
    }

    foreach($_POST["piechart_element_values"] as $key => $text_field){
        $piechart_values .= $text_field .", ";
    }
    
  //  echo $_POST['piechart_element_title'] . ' ' . $_POST['piechart_value_title'] .'<br>' . $piechart_elements . '<br>' . $piechart_values;
}

#connect to db
$id = 1;
try {
	$conn = new PDO (DSN, DB_USER, DB_PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $stmt = $conn->prepare('INSERT INTO piechart (chart_title, element_name, element_value) VALUES(:chart_title, :element_name, :element_value)');
	  $stmt->execute(array(
	  	':chart_title' => 	$piechart_title,
	    ':element_name'	 => $piechart_elements,
	    ':element_value' => $piechart_values
	  ));
	 
	  # Affected Rows?
	  echo $stmt->rowCount(); // 1

	$stmt = $conn->prepare('SELECT * FROM piechart WHERE id = :id');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	$stmt->execute();
} catch (PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

?>