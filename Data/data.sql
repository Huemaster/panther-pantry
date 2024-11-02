CREATE DATABASE IF NOT EXISTS Inventory;
USE Inventory;

DROP TABLE IF EXISTS food_items;
CREATE TABLE food_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    restock_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO food_items (name, quantity, restock_date) VALUES
('Rice', 50, '2024-11-15'),
('Beans', 30, '2024-11-10'),
('Pasta', 0, '2024-11-20'),
('Tomatoes', 25, NULL);