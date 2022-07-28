<?php
if(isset($_POST["id"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=data_light", "root", "root");
        $sql = "DELETE FROM car WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $_POST["id"]);
        $stmt->execute();
        header("Location: delete_index.php");
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
  ?>