<?php

include("./dbconnnect.php");

/*check ว่า insert-member มีการกำหนดค่าแล้วหรือไม่*/
if (isset($_POST["edit-member"])) {
    $query = $_POST["edit-member"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nname = $_POST["nname"];
    $url = $_POST["url"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "UPDATE member SET firstName = ?, lastName = ?, nickName = ?, url = ?, phone = ?, email = ? WHERE mid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $fname, $lname, $nname, $url, $phone, $email, $query);
    $stmt->execute();

    $conn->close();
    header("Location: index.php");
    exit();
}
?>