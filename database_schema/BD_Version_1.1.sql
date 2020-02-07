-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para mensakas
CREATE DATABASE IF NOT EXISTS `mensakas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `mensakas`;

-- Volcando estructura para tabla mensakas.address
CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned DEFAULT NULL,
  `id_supplier` int(10) unsigned DEFAULT NULL,
  `id_rider` int(10) unsigned DEFAULT NULL,
  `address` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `zipcode` int(5) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_address`),
  KEY `FK_address_customers` (`id_customer`),
  KEY `FK_address_suppliers` (`id_supplier`),
  KEY `FK_address_riders` (`id_rider`),
  KEY `FK_address_country` (`id_country`),
  KEY `FK_address_state` (`id_state`),
  CONSTRAINT `FK_address_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_address_customers` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_address_riders` FOREIGN KEY (`id_rider`) REFERENCES `riders` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_address_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id_state`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_address_suppliers` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.address: ~0 rows (aproximadamente)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rider` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `id_address_delivery` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`),
  KEY `FK_cart_riders` (`id_rider`),
  KEY `FK_cart_language` (`id_lang`),
  KEY `FK_cart_customers` (`id_customer`),
  KEY `FK_cart_suppliers` (`id_supplier`),
  CONSTRAINT `FK_cart_customers` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_language` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_riders` FOREIGN KEY (`id_rider`) REFERENCES `riders` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_suppliers` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.cart: ~0 rows (aproximadamente)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.cart_product
CREATE TABLE IF NOT EXISTS `cart_product` (
  `id_cart_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cart` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_cart_product`),
  KEY `FK_cart_product_cart` (`id_cart`),
  KEY `FK_cart_product_products` (`id_product`),
  CONSTRAINT `FK_cart_product_cart` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_product_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.cart_product: ~0 rows (aproximadamente)
DELETE FROM `cart_product`;
/*!40000 ALTER TABLE `cart_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_product` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.country
CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_zone` int(10) unsigned NOT NULL DEFAULT '0',
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iso_code` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `call_prefix` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_country`),
  KEY `FK_country_zones` (`id_zone`),
  KEY `FK_country_language` (`id_lang`),
  CONSTRAINT `FK_country_language` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_country_zones` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.country: ~0 rows (aproximadamente)
DELETE FROM `country`;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `secure_key` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `phone` int(9) NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reset_password_token` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `reset_password_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de clientes incluyendo los visitantes';

-- Volcando datos para la tabla mensakas.customers: ~0 rows (aproximadamente)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id_employee` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_profile` int(10) unsigned NOT NULL DEFAULT '0',
  `dni` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '999999999A',
  `fistname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` int(9) NOT NULL,
  `passwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_passwd_gen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discharge_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_connection` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reset_password_token` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_employee`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  KEY `profile_employee_fk` (`id_profile`),
  CONSTRAINT `profile_employee_fk` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para gestionar los socios de la cooperativa';

-- Volcando datos para la tabla mensakas.employees: ~0 rows (aproximadamente)
DELETE FROM `employees`;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.insurance
CREATE TABLE IF NOT EXISTS `insurance` (
  `id_insurance` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(75) COLLATE utf8_bin NOT NULL DEFAULT '''Mapfre''',
  `number_policy` int(9) NOT NULL DEFAULT '0',
  `company_phone` int(12) NOT NULL DEFAULT '0',
  `id_employee` int(10) unsigned NOT NULL,
  `expiration_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_insurance`),
  KEY `id_employee_insurance` (`id_employee`),
  CONSTRAINT `id_employee_insurance` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de las pólizas de los vehículos utilizados para repartir en la empresa';

-- Volcando datos para la tabla mensakas.insurance: ~0 rows (aproximadamente)
DELETE FROM `insurance`;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id_invoice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `delivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tax_rule` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_invoice`),
  UNIQUE KEY `number` (`number`),
  KEY `taxes_invoice` (`tax_rule`),
  KEY `order_invoice` (`id_order`),
  KEY `customer_invoice` (`id_customer`),
  CONSTRAINT `customer_invoice` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_invoice` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taxes_invoice` FOREIGN KEY (`tax_rule`) REFERENCES `tax_rules` (`id_tax_rule`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.invoices: ~0 rows (aproximadamente)
DELETE FROM `invoices`;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.language
CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `iso_code` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas dentro de la aplicación';

-- Volcando datos para la tabla mensakas.language: ~3 rows (aproximadamente)
DELETE FROM `language`;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id_language`, `name`, `active`, `iso_code`, `default`) VALUES
	(1, 'Español', 1, 'es', 1);
INSERT INTO `language` (`id_language`, `name`, `active`, `iso_code`, `default`) VALUES
	(2, 'English', 1, 'en', 0);
INSERT INTO `language` (`id_language`, `name`, `active`, `iso_code`, `default`) VALUES
	(3, 'Català', 0, 'ca', 0);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_rider` int(10) unsigned NOT NULL,
  `id_cart` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_messages`),
  KEY `FK_messages_orders` (`id_order`),
  KEY `FK_messages_suppliers` (`id_supplier`),
  KEY `FK_messages_riders` (`id_rider`),
  CONSTRAINT `FK_messages_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_messages_riders` FOREIGN KEY (`id_rider`) REFERENCES `riders` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_messages_suppliers` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.messages: ~0 rows (aproximadamente)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rider` int(10) unsigned NOT NULL DEFAULT '0',
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',
  `id_customer` int(10) unsigned NOT NULL DEFAULT '0',
  `id_cart` int(10) unsigned NOT NULL DEFAULT '0',
  `id_address_delivery` int(10) unsigned NOT NULL DEFAULT '0',
  `current_state` int(10) unsigned NOT NULL DEFAULT '0',
  `secure_key` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `payment` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `shipping_number` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `total_paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `invoice_num` int(10) unsigned NOT NULL DEFAULT '0',
  `invoice_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_order`),
  KEY `rider_order` (`id_rider`),
  KEY `lang_order` (`id_lang`),
  KEY `customer_order` (`id_customer`),
  CONSTRAINT `customer_order` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lang_order` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rider_order` FOREIGN KEY (`id_rider`) REFERENCES `riders` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de pedidos';

-- Volcando datos para la tabla mensakas.orders: ~0 rows (aproximadamente)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders_details
CREATE TABLE IF NOT EXISTS `orders_details` (
  `id_order_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `id_order_invoice` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `product_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `product_quantity` int(2) NOT NULL DEFAULT '0',
  `id_tax_rule` int(10) unsigned NOT NULL DEFAULT '0',
  `total_price` decimal(20,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_order_detail`),
  KEY `FK_orders_details_orders` (`id_order`),
  KEY `FK_orders_details_invoices` (`id_order_invoice`),
  KEY `FK_orders_details_suppliers` (`id_supplier`),
  KEY `FK_orders_details_products` (`id_product`),
  KEY `FK_orders_details_tax_rules` (`id_tax_rule`),
  CONSTRAINT `FK_orders_details_invoices` FOREIGN KEY (`id_order_invoice`) REFERENCES `invoices` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_details_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_details_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_details_suppliers` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_details_tax_rules` FOREIGN KEY (`id_tax_rule`) REFERENCES `tax_rules` (`id_tax_rule`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.orders_details: ~0 rows (aproximadamente)
DELETE FROM `orders_details`;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders_history
CREATE TABLE IF NOT EXISTS `orders_history` (
  `id_order_history` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL DEFAULT '0',
  `id_employee` int(10) unsigned NOT NULL DEFAULT '0',
  `id_order_state` int(10) unsigned NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order_history`),
  KEY `order_history_fk` (`id_order`),
  KEY `employee_order_history_fk` (`id_employee`),
  CONSTRAINT `employee_order_history_fk` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_history_fk` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='historial del estado de pedidos';

-- Volcando datos para la tabla mensakas.orders_history: ~0 rows (aproximadamente)
DELETE FROM `orders_history`;
/*!40000 ALTER TABLE `orders_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_history` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders_rider
CREATE TABLE IF NOT EXISTS `orders_rider` (
  `id_order_rider` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `id_rider` int(10) unsigned NOT NULL,
  `id_order_invoice` int(10) unsigned NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order_rider`),
  KEY `FK_orders_rider_orders` (`id_order`),
  KEY `FK_orders_rider_rider` (`id_rider`),
  KEY `FK_orders_rider_invoices` (`id_order_invoice`),
  CONSTRAINT `FK_orders_rider_invoices` FOREIGN KEY (`id_order_invoice`) REFERENCES `invoices` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_rider_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_rider_rider` FOREIGN KEY (`id_rider`) REFERENCES `riders` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.orders_rider: ~0 rows (aproximadamente)
DELETE FROM `orders_rider`;
/*!40000 ALTER TABLE `orders_rider` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_rider` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders_state
CREATE TABLE IF NOT EXISTS `orders_state` (
  `id_orders_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `send_email` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_orders_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.orders_state: ~0 rows (aproximadamente)
DELETE FROM `orders_state`;
/*!40000 ALTER TABLE `orders_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_state` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.orders_state_lang
CREATE TABLE IF NOT EXISTS `orders_state_lang` (
  `id_order_state` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `state` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id_order_state`),
  KEY `FK__language` (`id_lang`),
  CONSTRAINT `FK__language` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__orders_state` FOREIGN KEY (`id_order_state`) REFERENCES `orders_state` (`id_orders_state`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.orders_state_lang: ~0 rows (aproximadamente)
DELETE FROM `orders_state_lang`;
/*!40000 ALTER TABLE `orders_state_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_state_lang` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.products
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_supplier` int(10) unsigned NOT NULL DEFAULT '0',
  `id_category_default` int(10) unsigned NOT NULL DEFAULT '0',
  `id_tax_rules` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `show_price` tinyint(1) NOT NULL DEFAULT '0',
  `minimal_quantity` int(10) NOT NULL DEFAULT '1',
  `price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `additional_shipping_cost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gluten_contains` tinyint(1) NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`),
  KEY `categories_fk` (`id_category_default`),
  KEY `suppliers_fk` (`id_supplier`),
  KEY `taxes_fk` (`id_tax_rules`),
  CONSTRAINT `categories_fk` FOREIGN KEY (`id_category_default`) REFERENCES `products_categories` (`id_product_categories`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `suppliers_fk` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taxes_fk` FOREIGN KEY (`id_tax_rules`) REFERENCES `tax_rules` (`id_tax_rule`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de productos a la venta de los restaurantes';

-- Volcando datos para la tabla mensakas.products: ~0 rows (aproximadamente)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id_product_categories` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `is_root_category` tinyint(1) NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product_categories`),
  KEY `parent_category_fk` (`id_parent`),
  CONSTRAINT `parent_category_fk` FOREIGN KEY (`id_parent`) REFERENCES `products_categories` (`id_product_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestionar los productos mediante categorías';

-- Volcando datos para la tabla mensakas.products_categories: ~0 rows (aproximadamente)
DELETE FROM `products_categories`;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.products_categories_lang
CREATE TABLE IF NOT EXISTS `products_categories_lang` (
  `id_product_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL DEFAULT '0',
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_product_category`),
  KEY `id_lang_product_category_fk` (`id_lang`),
  KEY `FK_products_categories_lang_products` (`id_product`),
  CONSTRAINT `FK_products_categories_lang_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_lang_product_category_fk` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas según categoría';

-- Volcando datos para la tabla mensakas.products_categories_lang: ~0 rows (aproximadamente)
DELETE FROM `products_categories_lang`;
/*!40000 ALTER TABLE `products_categories_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_categories_lang` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.products_lang
CREATE TABLE IF NOT EXISTS `products_lang` (
  `id_products_lang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL DEFAULT '0',
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_products_lang`),
  KEY `id_product_lang_table_fk` (`id_product`),
  KEY `id_lang_product_lang_table_fk` (`id_lang`),
  CONSTRAINT `id_lang_product_lang_table_fk` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_product_lang_table_fk` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas para cada producto';

-- Volcando datos para la tabla mensakas.products_lang: ~0 rows (aproximadamente)
DELETE FROM `products_lang`;
/*!40000 ALTER TABLE `products_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_lang` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id_profile` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para gestionar los diferentes roles dentro de la cooperativa';

-- Volcando datos para la tabla mensakas.profiles: ~4 rows (aproximadamente)
DELETE FROM `profiles`;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id_profile`, `added_at`, `updated_at`) VALUES
	(1, '2020-02-06 19:03:40', '2020-02-06 19:03:40');
INSERT INTO `profiles` (`id_profile`, `added_at`, `updated_at`) VALUES
	(2, '2020-02-06 19:06:25', '2020-02-06 19:06:25');
INSERT INTO `profiles` (`id_profile`, `added_at`, `updated_at`) VALUES
	(3, '2020-02-06 19:06:29', '2020-02-06 19:06:29');
INSERT INTO `profiles` (`id_profile`, `added_at`, `updated_at`) VALUES
	(4, '2020-02-06 19:06:33', '2020-02-06 19:06:33');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.profiles_lang
CREATE TABLE IF NOT EXISTS `profiles_lang` (
  `id_profile_lang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_profile` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name_profile` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Translate not found',
  `decription_profile` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Translate not found',
  PRIMARY KEY (`id_profile_lang`),
  KEY `id_profile` (`id_profile`),
  KEY `lang_fk` (`id_lang`),
  CONSTRAINT `lang_fk` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_fk` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas para los perfiles de usuario';

-- Volcando datos para la tabla mensakas.profiles_lang: ~12 rows (aproximadamente)
DELETE FROM `profiles_lang`;
/*!40000 ALTER TABLE `profiles_lang` DISABLE KEYS */;
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(1, 1, 1, 'Administración', 'Gestión administrativa de la empresa');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(3, 1, 2, 'Administration', 'Administration operations for enterprise');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(5, 1, 3, 'Administració', 'Gestió administrativa de l\'empresa');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(6, 2, 1, 'Desarrollador', 'Desarrollador de la aplicación');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(7, 2, 2, 'Developer', 'Application developer');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(8, 2, 3, 'Desenvolupador', 'Desenvolupador de la aplicació');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(9, 3, 1, 'Repartidor', 'Repartidor de calle');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(10, 3, 2, 'Rider', 'Street rider');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(11, 3, 3, 'Repartidor', 'Repartidor de carrer');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(13, 4, 1, 'Recursos Humanos', 'Contratación de personal y gestión de socios');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(14, 4, 2, 'Human resources', 'Partner management');
INSERT INTO `profiles_lang` (`id_profile_lang`, `id_profile`, `id_lang`, `name_profile`, `decription_profile`) VALUES
	(15, 4, 3, 'Recursos Humans', 'Gestió de socis ');
/*!40000 ALTER TABLE `profiles_lang` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.riders
CREATE TABLE IF NOT EXISTS `riders` (
  `id_rider` int(10) unsigned NOT NULL,
  `id_employee` int(10) unsigned NOT NULL,
  `id_vehicle` int(10) unsigned NOT NULL,
  `id_rider_zone` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `max_travel` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rider`),
  KEY `employee_rider_id` (`id_employee`),
  KEY `vehicle_rider_id` (`id_vehicle`),
  KEY `zone_rider_id` (`id_rider_zone`),
  CONSTRAINT `employee_rider_id` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vehicle_rider_id` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicles` (`id_vehicle`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zone_rider_id` FOREIGN KEY (`id_rider_zone`) REFERENCES `zones` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='gestionar a los repartidores';

-- Volcando datos para la tabla mensakas.riders: ~0 rows (aproximadamente)
DELETE FROM `riders`;
/*!40000 ALTER TABLE `riders` DISABLE KEYS */;
/*!40000 ALTER TABLE `riders` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.state
CREATE TABLE IF NOT EXISTS `state` (
  `id_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_country` int(10) unsigned NOT NULL,
  `id_zone` int(10) unsigned NOT NULL,
  `name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_state`),
  KEY `id_state` (`id_state`),
  KEY `FK_state_country` (`id_country`),
  KEY `FK_state_zones` (`id_zone`),
  CONSTRAINT `FK_state_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_state_zones` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.state: ~0 rows (aproximadamente)
DELETE FROM `state`;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
/*!40000 ALTER TABLE `state` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id_supplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_category_supplier` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(75) COLLATE utf8_bin NOT NULL,
  `address` varchar(155) COLLATE utf8_bin NOT NULL,
  `zipcode` int(5) NOT NULL DEFAULT '0',
  `city` varchar(155) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `phone` int(9) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_supplier`),
  UNIQUE KEY `email` (`email`),
  KEY `supplier_category` (`id_category_supplier`),
  CONSTRAINT `supplier_category` FOREIGN KEY (`id_category_supplier`) REFERENCES `suppliers_categories` (`id_supplier_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de los restaurantes (proveedores) que trabajan con la cooperativa';

-- Volcando datos para la tabla mensakas.suppliers: ~0 rows (aproximadamente)
DELETE FROM `suppliers`;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.suppliers_categories
CREATE TABLE IF NOT EXISTS `suppliers_categories` (
  `id_supplier_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(10) NOT NULL DEFAULT '0',
  `is_root_category` tinyint(1) NOT NULL DEFAULT '0',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_supplier_category`),
  KEY `id_parent_category_supplier` (`id_parent`),
  CONSTRAINT `id_parent_category_supplier` FOREIGN KEY (`id_parent`) REFERENCES `suppliers_categories` (`id_supplier_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='categorías de restaurantes';

-- Volcando datos para la tabla mensakas.suppliers_categories: ~0 rows (aproximadamente)
DELETE FROM `suppliers_categories`;
/*!40000 ALTER TABLE `suppliers_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers_categories` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.suppliers_categories_lang
CREATE TABLE IF NOT EXISTS `suppliers_categories_lang` (
  `id_suppliers_categories_lang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `id_lang` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_suppliers_categories_lang`),
  KEY `id_category_suppliers_lang_fk` (`id_category`),
  KEY `id_lang_supplier` (`id_lang`),
  CONSTRAINT `id_category_suppliers_lang_fk` FOREIGN KEY (`id_category`) REFERENCES `suppliers_categories` (`id_supplier_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_lang_supplier` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de traducciones para las categorías de proveedor';

-- Volcando datos para la tabla mensakas.suppliers_categories_lang: ~0 rows (aproximadamente)
DELETE FROM `suppliers_categories_lang`;
/*!40000 ALTER TABLE `suppliers_categories_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers_categories_lang` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.tax_rules
CREATE TABLE IF NOT EXISTS `tax_rules` (
  `id_tax_rule` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(10,3) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tax_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de impuestos según producto transportado';

-- Volcando datos para la tabla mensakas.tax_rules: ~4 rows (aproximadamente)
DELETE FROM `tax_rules`;
/*!40000 ALTER TABLE `tax_rules` DISABLE KEYS */;
INSERT INTO `tax_rules` (`id_tax_rule`, `rate`, `active`, `name`) VALUES
	(1, 21.000, 1, 'IVA ES 21%');
INSERT INTO `tax_rules` (`id_tax_rule`, `rate`, `active`, `name`) VALUES
	(2, 10.000, 1, 'IVA ES 10%');
INSERT INTO `tax_rules` (`id_tax_rule`, `rate`, `active`, `name`) VALUES
	(3, 4.000, 1, 'IVA ES 4%');
INSERT INTO `tax_rules` (`id_tax_rule`, `rate`, `active`, `name`) VALUES
	(4, 0.000, 0, 'IVA ES 0%');
/*!40000 ALTER TABLE `tax_rules` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.type_vehicle
CREATE TABLE IF NOT EXISTS `type_vehicle` (
  `id_type_vehicle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_bin NOT NULL DEFAULT '''Motorbike''',
  `specs` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_type_vehicle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestionar los tipos de vehículo utilizados para repartir';

-- Volcando datos para la tabla mensakas.type_vehicle: ~6 rows (aproximadamente)
DELETE FROM `type_vehicle`;
/*!40000 ALTER TABLE `type_vehicle` DISABLE KEYS */;
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(1, 'Patinete', 'Sin motor', '2020-02-06 19:41:08', '2020-02-06 19:41:08');
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(2, 'Bicicleta', 'Sin motor', '2020-02-06 19:41:08', '2020-02-06 19:41:08');
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(3, 'Ciclomotor', '50 cc', '2020-02-06 19:41:08', '2020-02-06 19:41:08');
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(4, 'Moto ', '125 cc', '2020-02-06 19:41:08', '2020-02-06 19:41:08');
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(5, 'Moto grande', 'Superior a 125 cc', '2020-02-06 19:41:08', '2020-02-06 19:41:08');
INSERT INTO `type_vehicle` (`id_type_vehicle`, `name`, `specs`, `created_at`, `updated_at`) VALUES
	(6, 'Coche', NULL, '2020-02-06 19:41:08', '2020-02-06 19:41:08');
/*!40000 ALTER TABLE `type_vehicle` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.vehicles
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id_vehicle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_vehicle` int(10) unsigned NOT NULL DEFAULT '0',
  `brand_vehicle` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Insert brand vehicle',
  `model_vehicle` varchar(75) COLLATE utf8_bin NOT NULL DEFAULT 'Insert model vehicle',
  `license_plate` varchar(10) COLLATE utf8_bin DEFAULT 'AA0000ZZ',
  `vin` varchar(17) COLLATE utf8_bin DEFAULT 'AA0000ZZ',
  `policy_number` int(9) DEFAULT NULL,
  `id_insurance` int(10) unsigned DEFAULT NULL,
  `id_employee` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vehicle`),
  KEY `employee_vehicle_id` (`id_employee`),
  KEY `insurance_id` (`id_insurance`),
  KEY `type_vehicle_id` (`type_vehicle`),
  CONSTRAINT `employee_vehicle_id` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `insurance_id` FOREIGN KEY (`id_insurance`) REFERENCES `insurance` (`id_insurance`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `type_vehicle_id` FOREIGN KEY (`type_vehicle`) REFERENCES `type_vehicle` (`id_type_vehicle`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de los vehículos que los riders utilizan para trabajar';

-- Volcando datos para la tabla mensakas.vehicles: ~0 rows (aproximadamente)
DELETE FROM `vehicles`;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;

-- Volcando estructura para tabla mensakas.zones
CREATE TABLE IF NOT EXISTS `zones` (
  `id_zone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `zipcode` int(5) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla mensakas.zones: ~0 rows (aproximadamente)
DELETE FROM `zones`;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
