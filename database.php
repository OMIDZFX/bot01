<?php
// database.php

// اطلاعات اتصال به دیتابیس
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// توابع مرتبط با دیتابیس

// اجرای کوئری
function runQuery($query) {
    global $conn;
    return $conn->query($query);
}

// دریافت یک ردیف از نتیجه کوئری
function getSingleResult($query) {
    $result = runQuery($query);
    return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}

// دریافت چند ردیف از نتیجه کوئری
function getMultipleResults($query) {
    $result = runQuery($query);
    return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// بستن اتصال به دیتابیس
function closeConnection() {
    global $conn;
    $conn->close();
}
?>
