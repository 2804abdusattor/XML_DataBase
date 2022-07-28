<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if (isset($_POST["id"]) && isset($_POST["mark"]) && isset($_POST["model"]) && isset($_POST["generation"]) && isset($_POST["year"]) && isset($_POST["run"]) && isset($_POST["color"]) && isset($_POST["body_type"]) && isset($_POST["engine_type"]) && isset($_POST["transmission"]) && isset($_POST["gear_type"]) && isset($_POST["generation_id"])) {
	$id = $_POST["id"];
    $mark = $_POST["mark"];
	$model = $_POST["model"];
	$generation = $_POST["generation"];
	$year = $_POST["year"];
	$run = $_POST["run"];
	$color = $_POST["color"];
	$body_type = $_POST["body_type"];
	$engine_type = $_POST["engine_type"];
	$transmission = $_POST["transmission"];
	$gear_type = $_POST["gear_type"];
	$generation_id = $_POST["generation_id"];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=data_light", "root", "root");
        $sql = "INSERT INTO `car`(`id`,`mark`,`model`,`generation`,`year`,`run`,`color`,`body_type`,`engine_type`,`transmission`,`gear_type`,`generation_id`) VALUES ('" . $id . "','" . $mark . "','" . $model . "','" . $generation . "','" . $year . "','" . $run . "','" . $color . "','" . $body_type . "','" . $engine_type. "','" . $transmission . "','" . $gear_type . "','" . $generation_id . "')";
        $affectedRowsNumber = $conn->exec($sql);
        // если добавлена как минимум одна строка
        if($affectedRowsNumber > 0 ){
            echo "Data successfully added: mark=$mark  model= $model";
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
<h3>Create a new User</h3>
<form method="post">
	<p>Id:
    <input type="text" name="id" /></p>
    <p>Mark:
    <input type="text" name="mark" /></p>
    <p>Model:
    <input type="text" name="model" /></p>
    <p>Generation:
    <input type="text" name="generation" /></p>
    <p>Year:
    <input type="text" name="year" /></p>
    <p>Run:
    <input type="text" name="run" /></p>
    <p>Color:
    <input type="text" name="color" /></p>
    <p>Body type:
    <input type="text" name="body_type" /></p>
    <p>Engine type:
    <input type="text" name="engine_type" /></p>
    <p>Transmission:
    <input type="text" name="transmission" /></p>
    <p>Gear type:
    <input type="text" name="gear_type" /></p>
    <p>Generation id:
    <input type="text" name="generation_id" /></p>
    <input type="submit" value="Save">
</form>
</body>
</html>