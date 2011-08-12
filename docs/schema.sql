SET foreign_key_checks = 0; 
DROP TABLE IF EXISTS `website`;
DROP TABLE IF EXISTS `distributor`;
DROP TABLE IF EXISTS `manufacturer`;
DROP TABLE IF EXISTS `catalog_category_website_linker`;
DROP TABLE IF EXISTS `catalog_product_category_website_linker`;
DROP TABLE IF EXISTS `catalog_category`;
DROP TABLE IF EXISTS `catalog_attribute`;
DROP TABLE IF EXISTS `catalog_product`;
DROP TABLE IF EXISTS `catalog_product_attribute_value`;
DROP TABLE IF EXISTS `catalog_product_uom`;
DROP TABLE IF EXISTS `catalog_product_uom_distributor`;
DROP TABLE IF EXISTS `uom`;
SET foreign_key_checks = 1;

-- ----------------------------------------------
-- website
-- ----------------------------------------------
CREATE TABLE `website` (
   `website_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,PRIMARY KEY (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- manufacturer
-- ----------------------------------------------
CREATE TABLE `manufacturer` (
   `manufacturer_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- distributor
-- ----------------------------------------------
CREATE TABLE `distributor` (
   `distributor_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,PRIMARY KEY (`distributor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- uom
-- ----------------------------------------------
CREATE TABLE `uom` (
   `uom_code` VARCHAR(2) NOT NULL
  ,`description` VARCHAR(45) NOT NULL
  ,PRIMARY KEY (`uom_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- attribute
-- ----------------------------------------------
CREATE TABLE `catalog_attribute` (
   `attribute_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- category
-- ----------------------------------------------
CREATE TABLE `catalog_category` (
   `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------
-- category-website linker
-- ----------------------------------------------
CREATE TABLE `catalog_category_website_linker` (
   `website_id` INT UNSIGNED NOT NULL
  ,`category_id` INT UNSIGNED NOT NULL
  ,`parent_category_id` INT UNSIGNED DEFAULT NULL
  ,UNIQUE KEY (`website_id`,`category_id`,`parent_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_category_website_linker`
ADD FOREIGN KEY (`category_id`) REFERENCES `catalog_category` (`category_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_category_website_linker`
ADD FOREIGN KEY (`parent_category_id`) REFERENCES `catalog_category` (`category_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_category_website_linker`
ADD FOREIGN KEY (`website_id`) REFERENCES `website` (`website_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- product
-- ----------------------------------------------
CREATE TABLE `catalog_product` (
   `product_id` INT UNSIGNED NOT NULL AUTO_INCREMENT
  ,`name` VARCHAR(255) NOT NULL
  ,`manufacturer_id` INT UNSIGNED NOT NULL
  ,`item_number` VARCHAR(255) DEFAULT NULL
  ,PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_product`
ADD FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- product-category-website linker
-- ----------------------------------------------
CREATE TABLE `catalog_product_category_website_linker` (
   `website_id` INT UNSIGNED NOT NULL
  ,`category_id` INT UNSIGNED NOT NULL
  ,`product_id` INT UNSIGNED NOT NULL
  ,UNIQUE KEY (`website_id`,`category_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_product_category_website_linker`
ADD FOREIGN KEY (`category_id`) REFERENCES `catalog_category` (`category_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_category_website_linker`
ADD FOREIGN KEY (`website_id`) REFERENCES `website` (`website_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_category_website_linker`
ADD FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`product_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- product-attribute-value
-- ----------------------------------------------
CREATE TABLE `catalog_product_attribute_value` (
   `product_id` INT UNSIGNED NOT NULL
  ,`attribute_id` INT UNSIGNED NOT NULL
  ,`value` VARCHAR(255) NOT NULL
  ,UNIQUE KEY (`product_id`,`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_product_attribute_value`
ADD FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`product_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_attribute_value`
ADD FOREIGN KEY (`attribute_id`) REFERENCES `catalog_attribute` (`attribute_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- product-uom
-- ----------------------------------------------
CREATE TABLE `catalog_product_uom` (
   `product_id` INT UNSIGNED NOT NULL
  ,`uom_code` VARCHAR(2) NOT NULL
  ,`quantity` INT NOT NULL
  ,`price` DECIMAL(15,5) NOT NULL
  ,`website_id` INT UNSIGNED DEFAULT NULL
  ,`disabled` TINYINT(1) NOT NULL DEFAULT '0'
  ,UNIQUE KEY (`product_id`,`uom_code`, `website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_product_uom`
ADD FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`product_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_uom`
ADD FOREIGN KEY (`uom_code`) REFERENCES `uom` (`uom_code`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_uom`
ADD FOREIGN KEY (`website_id`) REFERENCES `website` (`website_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- product-uom-distributor
-- ----------------------------------------------
CREATE TABLE `catalog_product_uom_distributor` (
   `product_id` INT UNSIGNED NOT NULL
  ,`uom_code` VARCHAR(2) NOT NULL
  ,`distributor_id` INT UNSIGNED NOT NULL
  ,`cost` DECIMAL(15,5) NOT NULL
  ,UNIQUE KEY (`product_id`,`uom_code`,`distributor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `catalog_product_uom_distributor`
ADD FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`product_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_uom_distributor`
ADD FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`distributor_id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `catalog_product_uom_distributor`
ADD FOREIGN KEY (`uom_code`) REFERENCES `uom` (`uom_code`)
ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------------------------
-- INSERTS / DEMO DATA
-- ----------------------------------------------

INSERT INTO `website` 
(`website_id`,  `name`) VALUES
(1,             'store1.dev'),
(2,             'store2.dev');

INSERT INTO `catalog_category` 
(`category_id`,  `name`) VALUES
(1,              'Computer Hardware'),
(2,              'Fans & Heatsinks'),
(3,              'Thermal Compount / Grease');

INSERT INTO `catalog_category_website_linker` 
(`website_id`,  `category_id`,  `parent_category_id`) VALUES
(1,             1,              NULL),
(1,             2,              1),
(1,             3,              2),
(2,             1,              NULL),
(2,             2,              1),
(2,             3,              2);

INSERT INTO `distributor` 
(`distributor_id`,  `name`) VALUES
(1,                 'Newegg'),
(2,                 'Tiger Direct');

INSERT INTO `manufacturer` 
(`manufacturer_id`,  `name`) VALUES
(1,                  'Arctic Cooling');

INSERT INTO `uom`
(`uom_code`,  `description`) VALUES
('EA',        'Each'),
('TB',        'Tube'),
('CA',        'Case');

INSERT INTO `catalog_attribute`
(`attribute_id`,  `name`) VALUES
(1,               'Thermal Conductivity (W/mk)'),
(2,               'Viscosity (poise)'),
(3,               'Density (g/cm3)'),
(4,               'Net Weight');

INSERT INTO `catalog_product` 
(`product_id`,  `name`,                                              `manufacturer_id`,  `item_number`) VALUES
(1,             'Arctic Cooling MX-4 Thermal Compound',              1,                  'MX-4'),
(2,             'Arctic Cooling MX-2 Thermal Compound',              1,                  'MX-2');

INSERT INTO `catalog_product_attribute_value` 
(`product_id`,  `attribute_id`,  `value`) VALUES
(1,             1,               '8.5'),
(1,             2,               '870'),
(1,             3,               '2.5'),
(1,             4,               '4g'),
(2,             2,               '850'),
(2,             3,               '3.96'),
(2,             4,               '30g');

INSERT INTO `catalog_product_uom` 
(`product_id`,  `uom_code`,  `quantity`,  `price`,    `disabled`,  `website_id`) VALUES
(1,             'TB',        1,           12.99000,   0,           NULL),
(1,             'CA',        12,          149.99000,  0,           NULL),
(2,             'TB',        1,           29.99000,   0,           NULL),
(2,             'CA',        12,          349.99000,  0,           NULL);

INSERT INTO `catalog_product_uom_distributor` 
(`product_id`,  `uom_code`,  `distributor_id`,  `cost`) VALUES
(1,             'TB',        1,                 6.64000),
(1,             'TB',        2,                 7.67000),
(1,             'CA',        1,                 89.73000),
(1,             'CA',        2,                 97.93000),
(2,             'TB',        1,                 20.75000),
(2,             'TB',        2,                 22.58000),
(2,             'CA',        1,                 190.15000),
(2,             'CA',        2,                 221.11000);

INSERT INTO `catalog_product_category_website_linker` 
(`website_id`,  `category_id`,  `product_id`) VALUES
(1,             3,              1),
(2,             3,              1),
(1,             3,              2),
(2,             3,              2);
