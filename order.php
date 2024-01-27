<?php
// order.php

include 'database.php';

// بررسی درخواست‌های ورودی
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // بررسی ارسال فرم مربوط به ثبت سفارش
    if (isset($_POST['place_order'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $totalPrice = placeOrder($productId, $quantity);

        if ($totalPrice > 0) {
            echo "سفارش با موفقیت ثبت شد. مبلغ کل: $totalPrice تومان";
        } else {
            echo "خطا در ثبت سفارش. لطفاً دوباره تلاش کنید.";
        }
    }
}

// تابع ثبت سفارش و محاسبه مبلغ کل
function placeOrder($productId, $quantity) {
    // در اینجا ثبت سفارش و محاسبه مبلغ کل انجام می‌شود
    $productPrice = getProductPrice($productId);
    $totalPrice = $productPrice * $quantity;

    // ... (مراحل ثبت سفارش و افزودن به دیتابیس)

    return $totalPrice;
}

// تابع دریافت قیمت محصول از دیتابیس یا سایر منابع
function getProductPrice($productId) {
    // در اینجا قیمت محصول از دیتابیس یا سایر منابع خوانده می‌شود
    // این تابع باید بر اساس شناسه محصول واقعی اطلاعات را بخواند

    return rand(50, 200); // قیمت مصنوعی به عنوان مثال
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سفارش</title>
</head>
<body>
    <h1>سفارش</h1>

    <h2>ثبت سفارش</h2>
    <form method="post" action="">
        <label for="product_id">شناسه محصول:</label>
        <input type="text" id="product_id" name="product_id" required>
        <label for="quantity">تعداد:</label>
        <input type="number" id="quantity" name="quantity" required>
        <input type="submit" name="place_order" value="ثبت سفارش">
    </form>

    <!-- ... (سایر بخش‌ها) ... -->
</body>
</html>
