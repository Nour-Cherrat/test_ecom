<?php
require_once "config.php";

$firstname = $lastname = $address = $city = $email = $phone = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO orders (firstname, lastname, address, city, email, phone) VALUES (?, ?, ?, ?, ?, ?)";

    $result = mysqli_prepare($link, $sql);

    mysqli_stmt_bind_param($result, "ssssss", $firstname, $lastname, $address, $city, $email, $phone);

    if (mysqli_stmt_execute($result)) {
        header("location: success.html");
        exit();
    } else {
        echo "Something went wrong: " . mysqli_error($link);
    }

    mysqli_stmt_close($result);
}

mysqli_close($link);
?>
