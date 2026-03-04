-- SANGWA RWIRANGIRA Yvan Reg No:25/30834

-- Database Schema for Service Records
-- Database: musanze_service_db

CREATE DATABASE IF NOT EXISTS musanze_service_db;
USE musanze_service_db;

-- Table for records
CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client VARCHAR(255) NOT NULL,
    service VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL
);

