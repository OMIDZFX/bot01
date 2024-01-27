<?php
// game.php

include 'database.php';

// بررسی درخواست‌های ورودی
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // بررسی ارسال فرم مربوط به بازی تتریس
    if (isset($_POST['play_tetris'])) {
        $score = playTetris();
        echo "امتیاز کسب شده در بازی تتریس: $score";
    }
}

// تابع شبیه‌سازی بازی تتریس و امتیازدهی
function playTetris() {
    // در اینجا بازی تتریس شبیه‌سازی شده و امتیاز کسب شده محاسبه می‌شود
    $score = rand(1, 100);

    // افزودن امتیاز به اطلاعات کاربر در دیتابیس
    global $conn;
    $userId = 1; // باید شناسه واقعی کاربر جاری باشد
    $columnName = 'daily_score'; // می‌توانید نام ستون مربوط به امتیازهای روزانه را تغییر دهید

    $query = "UPDATE users SET $columnName = $columnName + $score WHERE id = $userId";
    runQuery($query);

    return $score;
}

// تابع اجرای کوئری در دیتابیس
function runQuery($query) {
    global $conn;
    return $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازی</title>
</head>
<body>
    <h1>بازی</h1>

    <h2>بازی تتریس</h2>
    <form method="post" action="">
        <input type="submit" name="play_tetris" value="شروع بازی تتریس">
    </form>

    <!-- ... (سایر بخش‌ها) ... -->
</body>
</html>
