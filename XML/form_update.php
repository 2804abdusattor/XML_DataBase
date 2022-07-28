<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=data_light", "root", "root");
    $sql = "SELECT * FROM car";
    $result = $conn->query($sql);
    echo "<table><tr><th>Марка</th><th>Модель</th><th>Поколения</th><th>Год</th><th>Пробежка</th><th>Цвет</th><th>Тип кузова</th><th>Тип двигателя</th><th>Тип шестерни</th><th>Коробка передач</th><th>Генерация идетификатора</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["mark"] . "</td>";
            echo "<td>" . $row["model"] . "</td>";
            echo "<td>" . $row["generation"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["run"] . "</td>";
            echo "<td>" . $row["color"] . "</td>";
            echo "<td>" . $row["body_type"] . "</td>";
            echo "<td>" . $row["engine_type"] . "</td>";
            echo "<td>" . $row["transmission"] . "</td>";
            echo "<td>" . $row["gear_type"] . "</td>";
            echo "<td>" . $row["generation_id"] . "</td>";
            echo "<td><a href='update_data.php?id=" . $row["id"] . "'>Обновить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
</body>
</html>