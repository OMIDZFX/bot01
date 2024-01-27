<?php
// admin_panel.php

include 'database.php';

// بررسی درخواست‌های ورودی
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // بررسی ارسال فرم مربوط به ارسال پیام به کاربران
    if (isset($_POST['send_message'])) {
        $message = $_POST['message_text'];
        $image = $_FILES['message_image']['name']; // نام تصویر ارسالی
        $video = $_FILES['message_video']['name']; // نام ویدئو ارسالی
        sendMessageToUsers($message, $image, $video);
    }

    // بررسی ارسال فرم مربوط به نمایش کاربران برتر
    if (isset($_POST['top_users'])) {
        displayTopUsers();
    }

    // بررسی ارسال فرم مربوط به ویرایش بنر رفرال
    if (isset($_POST['edit_referral_banner'])) {
        $bannerText = $_POST['banner_text'];
        $bannerImage = $_FILES['banner_image']['name']; // نام تصویر بنر ارسالی
        editReferralBanner($bannerText, $bannerImage);
    }
}

// تابع ارسال پیام به کاربران
function sendMessageToUsers($message, $image, $video) {
    // ... (مراحل ارسال پیام به کاربران)

    echo "پیام با موفقیت ارسال شد.";
}

// تابع نمایش کاربران برتر
function displayTopUsers() {
    // ... (مراحل نمایش کاربران برتر)

    echo "نمایش کاربران برتر";
}

// تابع ویرایش بنر رفرال
function editReferralBanner($bannerText, $bannerImage) {
    // ... (مراحل ویرایش بنر رفرال)

    echo "ویرایش بنر رفرال با موفقیت انجام شد.";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
</head>
<body>
    <h1>پنل مدیریت</h1>

    <h2>ارسال پیام به کاربران</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="message_text">متن پیام:</label>
        <textarea id="message_text" name="message_text" required></textarea>
        <label for="message_image">تصویر (اختیاری):</label>
        <input type="file" id="message_image" name="message_image">
        <label for="message_video">ویدئو (اختیاری):</label>
        <input type="file" id="message_video" name="message_video">
        <input type="submit" name="send_message" value="ارسال پیام">
    </form>

    <h2>نمایش کاربران برتر</h2>
    <form method="post" action="">
        <input type="submit" name="top_users" value="نمایش کاربران برتر">
    </form>

    <h2>ویرایش بنر رفرال</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="banner_text">متن بنر:</label>
        <input type="text" id="banner_text" name="banner_text" required>
        <label for="banner_image">تصویر بنر (اختیاری):</label>
        <input type="file" id="banner_image" name="banner_image">
        <input type="submit" name="edit_referral_banner" value="ویرایش بنر رفرال">
    </form>

    <!-- ... (سایر بخش‌ها) ... -->
</body>
</html>
