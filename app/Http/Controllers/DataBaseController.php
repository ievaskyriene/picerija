<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
 public function create(){
   
 $user = 'root';
 $pass = '';
 $dsn = "mysql:host=localhost;dbname=picerija;charset=utf8mb4";
 $options = [
 \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
 \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
 \PDO::ATTR_EMULATE_PREPARES => false,
 ];
 try {
 $pdo = new \PDO($dsn, $user, $pass, $options);
 } catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }

 try {
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      email varchar(255) COLLATE utf8mb4_unicode_ci  UNIQUE KEY NOT NULL,
      email_verified_at timestamp NULL DEFAULT NULL,
      password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      created_at timestamp NULL DEFAULT NULL,
      updated_at timestamp NULL DEFAULT NULL
    )
  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$pdo->exec($sql);
} catch(PDOException $e) {
echo $sql . '<br>' . $e->getMessage();
}


//  try {
//     // sql to create table
//     $sql = "CREATE TABLE IF NOT EXISTS customers (
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(64),
//     surname VARCHAR(64),
//     email varchar(255) COLLATE utf8mb4_unicode_ci  UNIQUE KEY NOT NULL,
//     address TEXT,
//     tel VARCHAR(64),
//     created_at TIMESTAMP,
//     updated_at TIMESTAMP
//     )";
//     // use exec() because no results are returned
//     $pdo->exec($sql);
//        echo "Table customers created successfully";
//     } catch(PDOException $e) {
//     echo $sql . "<br>" . $e->getMessage();
//     }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(64) NOT NULL,
        price DECIMAL(10, 2),
        sale DECIMAL(10, 2),
        descrip TEXT,
        created_at TIMESTAMP,
        updated_at TIMESTAMP
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
           echo "Table products created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS categories (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(64),
        parent_id INT(11) NOT NULL DEFAULT 0,
        created_at TIMESTAMP,
        updated_at TIMESTAMP
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
           echo "Table categories created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS tags (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(64),
        action VARCHAR(64),
        created_at TIMESTAMP,
        updated_at TIMESTAMP
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table categories created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS orders (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        status VARCHAR(64),
        name VARCHAR(64),
        surname VARCHAR(64),
        email VARCHAR(255) COLLATE utf8mb4_unicode_ci UNIQUE KEY NOT NULL,
        tel VARCHAR(64),
        price DECIMAL(5, 2),
        -- delivery_price DECIMAL(10, 2),
        created_at TIMESTAMP,
        updated_at TIMESTAMP
        -- FOREIGN KEY (customer_id) REFERENCES customers(id)
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table orders created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS carts (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        order_id INT(11) UNSIGNED,
        product_id INT(11) UNSIGNED,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table orders created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS images (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        alt TEXT,
        nr INT(11),
        product_id INT(11) UNSIGNED,
        image_name VARCHAR(64),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table images created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS product_tags (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(11) UNSIGNED,
        tag_id INT(11) UNSIGNED,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (tag_id) REFERENCES tags(id)
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table orders created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

    try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS product_categories (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(11) UNSIGNED,
        category_id INT(11) UNSIGNED,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (category_id) REFERENCES categories(id)    
        )";
        // use exec() because no results are returned
        $pdo->exec($sql);
            echo "Table orders created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
 }