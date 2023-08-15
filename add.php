<?php
include("./dbconnnect.php");

/*check ว่า insert-member มีการกำหนดค่าแล้วหรือไม่*/
if (isset($_POST['insert-member'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nname = $_POST["nname"];
    $url = $_POST["url"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO member (firstname, lastname, nickname, url, phone, email) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $nname, $url, $phone, $email);
    $stmt->execute();

    $conn->close();
    header("Location: index.php");
    exit();
}
?>