CREATE DATABASE elegance_clothin;

USE elegance_clothin;

--table for users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
);

-- Table for products
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(255) NOT NULL,
  description TEXT NOT NULL
);

-- Table for cart
CREATE TABLE cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

--Insert into products 

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Classic T-shirt', 1500.00, 'classic tshirt.jpeg', 'Comfortable woolen T shirt .'),
(2, 'Bemin jeans Jacket', 4000.00, 'demin jean jacket with fur.jpeg', 'stylish jean jacket'),
(3, 'Fancy Formal Dress', 6000.00, 'classy.jpeg', 'Emerald colored formal'),
(4, 'Black Tow combo', 8000.00, 'black tow.jpg', 'Stylish black combo'),
(5, 'Saree', 3500.00, '1saree.jpeg', 'red saree'),
(6, 'lehenga', 8000.00, 'lehenga.jpg', 'Maharani Lehenga'),
(8, 'Cosplay', 10000.00, 'tokyo.jpg', 'Tokyo revenger Mikey costume'),
(9, 'Ace cosplay', 8800.00, 'ace.jpg', 'One piece ace cosplay'),
(11, 'Blazer', 5500.00, 'fit.jpeg', 'Mens Luxury Slim Fit Blazer'),
(12, 'Formal pants', 3500.00, 'formAL.jpg', 'Men Summer Office Formal Pants');