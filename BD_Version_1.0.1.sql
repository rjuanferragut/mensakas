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
  UNIQUE KEY `email` (`email`),
  KEY `profile_employee_fk` (`id_profile`),
  CONSTRAINT `profile_employee_fk` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para gestionar los socios de la cooperativa';

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id_invoice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_order` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `delivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tax_rule` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_invoice`),
  UNIQUE KEY `number` (`number`),
  KEY `taxes_invoice` (`tax_rule`),
  KEY `order_invoice` (`id_order`),
  CONSTRAINT `order_invoice` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taxes_invoice` FOREIGN KEY (`tax_rule`) REFERENCES `tax_rules` (`id_tax_rule`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.language
CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `iso_code` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas dentro de la aplicación';

-- La exportación de datos fue deseleccionada.

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
  CONSTRAINT `lang_order` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rider_order` FOREIGN KEY (`id_rider`) REFERENCES `rider` (`id_rider`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de pedidos';

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.products_categories_lang
CREATE TABLE IF NOT EXISTS `products_categories_lang` (
  `id_product_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_product_category`),
  KEY `id_lang_product_category_fk` (`id_lang`),
  CONSTRAINT `id_lang_product_category_fk` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas según categoría';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.products_lang
CREATE TABLE IF NOT EXISTS `products_lang` (
  `id_products_lang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned NOT NULL DEFAULT '0',
  `id_lang` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_products_lang`),
  KEY `id_product_lang_table_fk` (`id_product`),
  KEY `id_lang_product_lang_table_fk` (`id_lang`),
  CONSTRAINT `id_lang_product_lang_table_fk` FOREIGN KEY (`id_lang`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_product_lang_table_fk` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de idiomas para cada producto';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id_profile` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla para gestionar los diferentes roles dentro de la cooperativa';

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.rider
CREATE TABLE IF NOT EXISTS `rider` (
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id_supplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_category_supplier` int(10) NOT NULL DEFAULT '0',
  `email` varchar(75) COLLATE utf8_bin NOT NULL,
  `address` varchar(155) COLLATE utf8_bin NOT NULL,
  `zipcode` int(5) NOT NULL DEFAULT '0',
  `city` varchar(155) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `phone` int(9) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_supplier`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de los restaurantes (proveedores) que trabajan con la cooperativa';

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.suppliers_categories_lang
CREATE TABLE IF NOT EXISTS `suppliers_categories_lang` (
  `id_suppliers_categories_lang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_suppliers_categories_lang`),
  KEY `id_category_suppliers_lang_fk` (`id_category`),
  CONSTRAINT `id_category_suppliers_lang_fk` FOREIGN KEY (`id_category`) REFERENCES `suppliers_categories` (`id_supplier_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de traducciones para las categorías de proveedor';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.tax_rules
CREATE TABLE IF NOT EXISTS `tax_rules` (
  `id_tax_rule` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(10,3) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tax_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestión de impuestos según producto transportado';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.type_vehicle
CREATE TABLE IF NOT EXISTS `type_vehicle` (
  `id_type_vehicle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_bin NOT NULL DEFAULT '''Motorbike''',
  `specs` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_type_vehicle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Gestionar los tipos de vehículo utilizados para repartir';

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla mensakas.zones
CREATE TABLE IF NOT EXISTS `zones` (
  `id_zone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `zipcode` int(5) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
