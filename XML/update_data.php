<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=data_light", "root", "root");
}
catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = $_GET["id"];
    $sql = "SELECT * FROM car WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $id);
    // выполняем выражение и получаем пользователя по id
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $mark = $row["mark"];
            $model = $row["model"];
            $generation = $row["generation"];
            $year = $row["year"];
            $run = $row["run"];
            $color = $row["color"];
            $body_type = $row["body_type"];
            $engine_type = $row["engine_type"];
            $transmission = $row["transmission"];
            $gear_type = $row["gear_type"];
            $generation_id = $row["generation_id"];
        }
        echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Имя:
                    <input type='text' name='mark' value='$mark' /></p>
                    <p>Возраст:
                    <input type='text' name='model' value='$model' /></p>
                    <input type='text' name='generation' value='$generation' /></p>
                    <input type='text' name='year' value='$year' /></p>
                    <input type='text' name='run' value='$run' /></p>
                    <input type='text' name='color' value='$color' /></p>
                    <input type='text' name='body_type' value='$body_type' /></p>
                    <input type='text' name='engine_type' value='$engine_type' /></p>
                    <input type='text' name='transmission' value='$transmission' /></p>
                    <input type='text' name='gear_type' value='$gear_type' /></p>
                    <input type='number' name='generation_id' value='$generation_id' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && isset($_POST["mark"]) && isset($_POST["model"])&& isset($_POST["generation"])&& isset($_POST["year"])&& isset($_POST["run"])&& isset($_POST["color"])&& isset($_POST["body_type"])&& isset($_POST["engine_type"])&& isset($_POST["transmission"])&& isset($_POST["gear_type"])&& isset($_POST["generation_id"])) {

    $sql = "UPDATE car SET mark = :mark, model = :model, generation = :generation, year = :year, run = :run, color = :color, body_type = :body_type, engine_type = :engine_type, transmission = :transmission, gear_type = :gear_type, generation_id = :generation_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $_POST["id"]);
    $stmt->bindValue(":mark", $_POST["mark"]);
    $stmt->bindValue(":model", $_POST["model"]);
    $stmt->bindValue(":generation", $_POST["generation"]);
    $stmt->bindValue(":year", $_POST["year"]);
    $stmt->bindValue(":run", $_POST["run"]);
    $stmt->bindValue(":color", $_POST["color"]);
    $stmt->bindValue(":body_type", $_POST["body_type"]);
    $stmt->bindValue(":engine_type", $_POST["engine_type"]);
    $stmt->bindValue(":transmission", $_POST["transmission"]);
    $stmt->bindValue(":gear_type", $_POST["gear_type"]);
    $stmt->bindValue(":generation_id", $_POST["generation_id"]);

    $stmt->execute();
    header("Location: index.php");
}
else{
    echo "Некорректные данные";
}
?>
</body>
</html>