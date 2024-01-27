-- create_tables.sql

-- ساخت جدول کاربران
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    telegram_username VARCHAR(255) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    game_score INT DEFAULT 0,
    referred_users INT DEFAULT 0
);

-- ساخت جدول سفارشات
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    total_price DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- ساخت جدول امتیازات روزانه
CREATE TABLE IF NOT EXISTS daily_scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    score INT,
    score_date DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
