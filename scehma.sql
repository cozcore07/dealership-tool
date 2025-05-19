CREATE DATABASE dealership_tool;
USE dealership_tool;

CREATE TABLE dealers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255),
  dealer_name VARCHAR(100)
);

CREATE TABLE deals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dealer_id INT,
  sale_price DECIMAL(10,2),
  cost_price DECIMAL(10,2),
  salesperson VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
