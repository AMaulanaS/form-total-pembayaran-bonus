CREATE TABLE bonus_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_bonus DECIMAL(10, 2) NOT NULL,
    employee1 VARCHAR(100) NOT NULL,
    percentage1 DECIMAL(5, 2) NOT NULL,
    employee2 VARCHAR(100) NOT NULL,
    percentage2 DECIMAL(5, 2) NOT NULL,
    employee3 VARCHAR(100) NOT NULL,
    percentage3 DECIMAL(5, 2) NOT NULL,
    bonus1 DECIMAL(10, 2) NOT NULL,
    bonus2 DECIMAL(10, 2) NOT NULL,
    bonus3 DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
