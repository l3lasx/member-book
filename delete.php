<?php
include("./dbconnnect.php");

if (isset($_POST["del-member"])) {
    $query = $_POST["del-member"];

    $sql = "DELETE FROM member WHERE mid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $query);
    $stmt->execute();

    $conn->close();
    header("Location: index.php");
    exit();
}
?>