-- Create Database
CREATE DATABASE inventory_system;
USE inventory_system;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    user_group VARCHAR(50) NOT NULL,
    status ENUM('ACTIVE', 'INACTIVE') DEFAULT 'ACTIVE',
    created_date DATE NOT NULL
);

-- Stock Table
CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Purchases Table
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vendor VARCHAR(100) NOT NULL,
    purchase_date DATE NOT NULL,
    status ENUM('PENDING', 'COMPLETED') DEFAULT 'PENDING',
    total DECIMAL(10, 2) NOT NULL
);

-- Insert Sample Data
INSERT INTO users (username, user_group, status, created_date) VALUES
('superadmin', 'Superadmin', 'ACTIVE', '2015-02-27'),
('sameer', 'GENERAL MANAGER', 'ACTIVE', '2015-02-27'),
('sohail', 'Designer', 'ACTIVE', '2015-02-27');

INSERT INTO stock (item, name, price) VALUES
('Qty', 'Xiaomi Black710', 1250.00);

INSERT INTO purchases (vendor, purchase_date, status, total) VALUES
('Imran', '2019-02-14', 'PENDING', 13170.00);
