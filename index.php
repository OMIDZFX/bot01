<?php
// index.php

include 'database.php';

// بررسی درخواست‌های ورودی
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // بررسی ارسال فرم مربوط به عضویت
    if (isset($_POST['register'])) {
        $telegramNumber = $_POST['telegram_number'];

        // بررسی شماره تلگرام و اضافه کردن به دیتابیس اگر شرایط صحیح باشد
        if (isValidTelegramNumber($telegramNumber)) {
            $userId = addUser($telegramNumber);
            if ($userId > 0) {
                echo "ثبت نام با موفقیت انجام شد. شناسه کاربری: $userId";
            } else {
                echo "خطا در ثبت نام. لطفاً دوباره تلاش کنید.";
            }
        } else {
            echo "شماره تلگرام معتبر نیست.";
        }
    }
}

// تابع بررسی معتبر بودن شماره تلگرام
function isValidTelegramNumber($number) {
    // بررسی پیش شماره +98
    if (substr($number, 0, 3) != '+98') {
        return false;
    }

    // بررسی طول شماره
    if (strlen($number) != 13) {
        return false;
    }

    // بررسی کاراکترهای مجاز برای بقیه قسمت‌های شماره
    $digits = substr($number, 3);
    if (!ctype_digit($digits)) {
        return false;
    }

    return true;
}

// تابع اضافه کردن کاربر به دیتابیس
function addUser($telegramNumber) {
    global $conn;

    // ... (کدهای اضافه کردن کاربر به دیتابیس)
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ربات تلگرام</title>
</head>
<body>
    <h1>ربات تلگرام</h1>

    <h2>عضویت</h2>
    <form method="post" action="">
        <label for="telegram_number">شماره تلگرام (+98xxxxxxxxxx):</label>
        <input type="text" id="telegram_number" name="telegram_number" required>
        <input type="submit" name="register" value="عضویت">
    </form>

    <!-- ... (سایر بخش‌ها) ... -->
</body>
</html>
