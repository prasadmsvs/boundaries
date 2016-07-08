-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for boundaries
CREATE DATABASE IF NOT EXISTS `boundaries` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `boundaries`;


-- Dumping structure for table boundaries.images
CREATE TABLE IF NOT EXISTS `images` (
  `description` int(11) NOT NULL,
  `image_types_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  PRIMARY KEY (`description`,`image_types_id`),
  KEY `fk_images_image_types1_idx` (`image_types_id`),
  KEY `fk_images_property1_idx` (`property_id`),
  CONSTRAINT `fk_images_image_types1` FOREIGN KEY (`image_types_id`) REFERENCES `image_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_property1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.images: ~0 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;


-- Dumping structure for table boundaries.image_types
CREATE TABLE IF NOT EXISTS `image_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.image_types: ~4 rows (approximately)
/*!40000 ALTER TABLE `image_types` DISABLE KEYS */;
REPLACE INTO `image_types` (`id`, `name`, `description`) VALUES
	(1, 'exterior', 'Exterior area'),
	(2, 'interior', 'Interior area'),
	(3, 'Floor plan', 'Floor plan'),
	(4, 'EC', 'Encumbrance Certificate');
/*!40000 ALTER TABLE `image_types` ENABLE KEYS */;


-- Dumping structure for table boundaries.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `location_types_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_locations_location_types1_idx` (`location_types_id`),
  CONSTRAINT `fk_locations_location_types1` FOREIGN KEY (`location_types_id`) REFERENCES `location_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.locations: ~1 rows (approximately)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
REPLACE INTO `locations` (`id`, `name`, `lat`, `lon`, `parent`, `location_types_id`) VALUES
	(1, 'India', NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;


-- Dumping structure for table boundaries.location_types
CREATE TABLE IF NOT EXISTS `location_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.location_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `location_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `location_types` ENABLE KEYS */;


-- Dumping structure for table boundaries.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table boundaries.property
CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user`),
  CONSTRAINT `user_id` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.property: ~5 rows (approximately)
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
REPLACE INTO `property` (`id`, `name`, `user`, `description`, `image`, `price`, `lat`, `lon`) VALUES
	(8, 'My sweet home', 1, '2BHK home for sale', 'uploads/propertyImage1467470600.jpg', 800000, NULL, NULL),
	(9, 'Land', 1, 'Land at Nagawara for lease', 'uploads/propertyImage1467470883.jpg', 20000, NULL, NULL),
	(10, 'Home', 1, 'House for rent', 'uploads/propertyImage1467470936.jpg', 1000000, NULL, NULL),
	(11, 'property 2', 1, 'pro', 'uploads/propertyImage1467815300.jpg', 3000, NULL, NULL),
	(13, 'property 6', 1, 'prolsjslfj', 'uploads/propertyImage1467815607.jpg', 3000, NULL, NULL),
	(14, 'property 7', 1, 'prolsjslfj', 'uploads/propertyImage1467816110.jpg', 4000, NULL, NULL),
	(15, 'property 8', 1, 'prop 8', 'uploads/propertyImage1467896909.jpg', 300000, 12.7797, 77.7187);
/*!40000 ALTER TABLE `property` ENABLE KEYS */;


-- Dumping structure for table boundaries.property_has_images
CREATE TABLE IF NOT EXISTS `property_has_images` (
  `property_id` int(11) NOT NULL,
  `images_description` int(11) NOT NULL,
  PRIMARY KEY (`property_id`,`images_description`),
  KEY `fk_property_has_images_images1_idx` (`images_description`),
  KEY `fk_property_has_images_property1_idx` (`property_id`),
  CONSTRAINT `fk_property_has_images_images1` FOREIGN KEY (`images_description`) REFERENCES `images` (`description`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_property_has_images_property1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.property_has_images: ~0 rows (approximately)
/*!40000 ALTER TABLE `property_has_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_has_images` ENABLE KEYS */;


-- Dumping structure for table boundaries.property_types
CREATE TABLE IF NOT EXISTS `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.property_types: ~8 rows (approximately)
/*!40000 ALTER TABLE `property_types` DISABLE KEYS */;
REPLACE INTO `property_types` (`id`, `name`, `description`) VALUES
	(1, 'house', 'House'),
	(2, 'office', 'Office'),
	(3, 'flat', 'Flat'),
	(4, 'shop', 'Commercial vendor Shop'),
	(5, 'restaurant', 'Eatery,pub e.t.c'),
	(6, 'plot', 'House Plot'),
	(7, 'land', 'Land'),
	(8, 'parking', 'Parking area');
/*!40000 ALTER TABLE `property_types` ENABLE KEYS */;


-- Dumping structure for table boundaries.property_types_has_property
CREATE TABLE IF NOT EXISTS `property_types_has_property` (
  `property_types_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  PRIMARY KEY (`property_types_id`,`property_id`),
  KEY `fk_property_types_has_property_property1_idx` (`property_id`),
  CONSTRAINT `fk_property_types_has_property_property1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_property_types_has_property_property_types1` FOREIGN KEY (`property_types_id`) REFERENCES `property_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.property_types_has_property: ~0 rows (approximately)
/*!40000 ALTER TABLE `property_types_has_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_types_has_property` ENABLE KEYS */;


-- Dumping structure for table boundaries.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `user_types_id` int(11) NOT NULL,
  `authKey` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_user_types1_idx` (`user_types_id`),
  CONSTRAINT `fk_user_user_types1` FOREIGN KEY (`user_types_id`) REFERENCES `user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `first_name`, `last_name`, `password`, `email`, `address`, `user_types_id`, `authKey`) VALUES
	(1, 'admin', 'admin', 'admin', 'admin@boundaries.in', NULL, 1, '123456');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table boundaries.user_types
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_UNIQUE` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.user_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
REPLACE INTO `user_types` (`id`, `type`) VALUES
	(1, 'Admin');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;


-- Dumping structure for table boundaries.user_types_has_permissions
CREATE TABLE IF NOT EXISTS `user_types_has_permissions` (
  `user_types_id` int(11) NOT NULL,
  `permissions_id` int(11) NOT NULL,
  PRIMARY KEY (`user_types_id`,`permissions_id`),
  KEY `fk_user_types_has_permissions_permissions1_idx` (`permissions_id`),
  KEY `fk_user_types_has_permissions_user_types1_idx` (`user_types_id`),
  CONSTRAINT `fk_user_types_has_permissions_permissions1` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_types_has_permissions_user_types1` FOREIGN KEY (`user_types_id`) REFERENCES `user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table boundaries.user_types_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_types_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_types_has_permissions` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
