<?php
function Insert()
{
$conn = mysqli_connect("localhost", "root", "root", "data_light");

$affectedRow = 0;

$xml = simplexml_load_file("data_light.xml") or die("Error: Cannot create object");

foreach ($xml->children() as $row) {
	foreach ($row->children() as $row1) {
		$id = $row1->id;
	    $mark = $row1->mark;
	    $model = $row1->model;
	    $generation = $row1->generation;
	    $year = $row1->year;
	    $run = $row1->run;
	    $color = $row1->color;
	    $body_type = $row1->body_type;
	    $engine_type = $row1->engine_type;
	    $transmission = $row1->transmission;
	    $gear_type = $row1->gear_type;
	    $generation_id = $row1->generation_id;

	    $sql = "INSERT INTO `car`(`id`,`mark`,`model`,`generation`,`year`,`run`,`color`,`body_type`,`engine_type`,`transmission`,`gear_type`,`generation_id`) VALUES ('" . $id . "','" . $mark . "','" . $model . "','" . $generation . "','" . $year . "','" . $run . "','" . $color . "','" . $body_type . "','" . $engine_type. "','" . $transmission . "','" . $gear_type . "','" . $generation_id . "')";

	    $result = mysqli_query($conn, $sql);

	    if (! empty($result)) {
	        $affectedRow ++;
	    } else {
	        $error_message = mysqli_error($conn) . "\n";
	    }

	}

}
?>
<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}

}
?>