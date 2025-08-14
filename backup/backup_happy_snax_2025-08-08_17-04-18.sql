-- Database Backup for `happy_snax` 
-- Generated: 2025-08-08 17:04:18


-- Structure for table `cleaning_log_cooking`
DROP TABLE IF EXISTS `cleaning_log_cooking`;
CREATE TABLE `cleaning_log_cooking` (
  `clc_id` mediumint(1) NOT NULL AUTO_INCREMENT,
  `clc_date` date NOT NULL,
  `clc_time` time NOT NULL,
  `clc_initial` tinyint(1) NOT NULL,
  `clc_comment` varchar(50) NOT NULL,
  `eq_6` varchar(3) NOT NULL,
  `eq_7` varchar(3) NOT NULL,
  `eq_8` varchar(3) NOT NULL,
  `eq_9` varchar(3) NOT NULL,
  `eq_14` varchar(3) NOT NULL,
  `eq_15` varchar(3) NOT NULL,
  `eq_16` varchar(3) NOT NULL,
  `eq_17` varchar(3) NOT NULL,
  `eq_22` varchar(3) NOT NULL,
  PRIMARY KEY (`clc_id`),
  UNIQUE KEY `ppc_date` (`clc_date`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `cleaning_log_cooking`
INSERT INTO `cleaning_log_cooking` VALUES('1', '2025-05-22', '11:05:22', '1', 'ert', 're', 'ret', 'ert', 'ert', 'ret', 'ert', 'ert', 'ert', 'er');
INSERT INTO `cleaning_log_cooking` VALUES('2', '2025-05-27', '20:30:44', '1', 'dsf', 'jh', 'dfs', 'sdf', 'sd', 'sdf', 'dsf', 'f', 'ds', 'sdf');
INSERT INTO `cleaning_log_cooking` VALUES('3', '2025-06-10', '16:29:41', '1', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'AD', 'ASD', 'ADS', 'ASD', 'ASD');
INSERT INTO `cleaning_log_cooking` VALUES('4', '2025-06-24', '17:27:40', '1', 'e', 'ewe', 'we', 'we', 'we', 'e', 'we', 'we', 'we', 'we');

-- Structure for table `cleaning_log_packing_ff`
DROP TABLE IF EXISTS `cleaning_log_packing_ff`;
CREATE TABLE `cleaning_log_packing_ff` (
  `c_log_cpf_id` int(1) NOT NULL AUTO_INCREMENT,
  `cpf_date` date NOT NULL,
  `cpf_time` time NOT NULL,
  `cpf_initial` tinyint(1) NOT NULL,
  `cpf_comment` varchar(50) NOT NULL,
  `eq_6` varchar(3) NOT NULL,
  `eq_7` varchar(3) NOT NULL,
  `eq_8` varchar(3) NOT NULL,
  `eq_9` varchar(3) NOT NULL,
  `eq_18` varchar(3) NOT NULL,
  `eq_22` varchar(3) NOT NULL,
  `eq_23` varchar(3) NOT NULL,
  PRIMARY KEY (`c_log_cpf_id`),
  UNIQUE KEY `ppc_date` (`cpf_date`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `cleaning_log_packing_ff`
INSERT INTO `cleaning_log_packing_ff` VALUES('1', '2025-05-22', '11:05:22', '1', 'erwe', 're', 'ert', 'e', 'et', 'ert', 'e', '');
INSERT INTO `cleaning_log_packing_ff` VALUES('2', '2025-05-27', '20:31:02', '1', 'dsf', 'sdf', 'sds', 'sd', 'sd', 'sdf', 'dsf', '');
INSERT INTO `cleaning_log_packing_ff` VALUES('3', '2025-06-10', '16:28:41', '1', 'SADSAD', 'asa', 'sa', 'sa', 'Ss', 'AS', 'SDA', '');
INSERT INTO `cleaning_log_packing_ff` VALUES('4', '2025-06-24', '17:27:10', '1', 'ewe', 'eww', 'wew', 'we', 'wee', 'wee', 'we', 'wew');

-- Structure for table `cleaning_log_packing_sf`
DROP TABLE IF EXISTS `cleaning_log_packing_sf`;
CREATE TABLE `cleaning_log_packing_sf` (
  `c_log_cps_id` int(1) NOT NULL AUTO_INCREMENT,
  `cps_date` date NOT NULL,
  `cps_time` time NOT NULL,
  `cps_initial` tinyint(1) NOT NULL,
  `cps_comment` varchar(50) NOT NULL,
  `eq_6` varchar(3) NOT NULL,
  `eq_7` varchar(3) NOT NULL,
  `eq_8` varchar(3) NOT NULL,
  `eq_9` varchar(3) NOT NULL,
  `eq_19` varchar(3) NOT NULL,
  `eq_22` varchar(3) NOT NULL,
  PRIMARY KEY (`c_log_cps_id`),
  UNIQUE KEY `ppc_date` (`cps_date`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `cleaning_log_packing_sf`
INSERT INTO `cleaning_log_packing_sf` VALUES('1', '2025-05-22', '11:05:22', '1', 'sdf', 'dfs', 's', 'sf', 'sdf', 'dfs', 'sdf');
INSERT INTO `cleaning_log_packing_sf` VALUES('2', '2025-05-27', '20:31:12', '1', 'dsf', 'dsf', 'fsd', 'dsf', 'fds', 'f', 'dsf');
INSERT INTO `cleaning_log_packing_sf` VALUES('3', '2025-06-10', '16:29:57', '1', 'SAD', 'AD', 'ASD', 'SAD', 'SAD', 'ASD', 'SAD');
INSERT INTO `cleaning_log_packing_sf` VALUES('4', '2025-06-24', '17:27:27', '1', 'we', 'we', 'we', 'e', 'we', 'we', 'we');

-- Structure for table `equipment`
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `eq_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `eq_code` varchar(5) NOT NULL,
  `eq_name` varchar(30) NOT NULL,
  `eq_location` tinyint(1) NOT NULL,
  `eq_c_log` tinyint(1) NOT NULL,
  `eq_desc` varchar(50) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`eq_id`),
  UNIQUE KEY `eq_name` (`eq_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `equipment`
INSERT INTO `equipment` VALUES('1', 'GHP', 'ENTRY EXIT DOOR', '4', '0', 'ENTRY EXIT DOOR', '1');
INSERT INTO `equipment` VALUES('2', 'GHP', 'WINDOWS', '4', '0', 'WINDOWS', '1');
INSERT INTO `equipment` VALUES('3', 'GHP', 'FLY KILLER ', '4', '0', 'FLY KILLER ', '1');
INSERT INTO `equipment` VALUES('4', 'GHP', 'PARTITION WALL', '4', '0', 'PATITION WALL', '1');
INSERT INTO `equipment` VALUES('5', 'GHP', 'TUBE LIGHTS', '4', '0', 'TUBE LIGHTS', '1');
INSERT INTO `equipment` VALUES('6', 'FHC', 'EQUIPMENTS', '4', '1', 'EQUIPMENT', '1');
INSERT INTO `equipment` VALUES('7', 'FHC', 'TABLES', '4', '1', 'TABLES', '1');
INSERT INTO `equipment` VALUES('8', 'FHC', 'FLOOR', '4', '1', 'FLOOR', '1');
INSERT INTO `equipment` VALUES('9', 'FHC', 'SINKS', '4', '1', 'SINKS', '1');
INSERT INTO `equipment` VALUES('11', 'FHC', 'FOOD STORAGE', '1', '0', 'FOOD STORAGE', '1');
INSERT INTO `equipment` VALUES('12', 'FHC', 'Blue Roll dispenser', '4', '0', 'Blue Roll dispenser', '1');
INSERT INTO `equipment` VALUES('13', 'FHC', 'Hand wash soap dispenser', '4', '0', 'Hand wash soap dispenser', '1');
INSERT INTO `equipment` VALUES('14', 'FHC', 'COOKER', '3', '1', 'COOKER', '1');
INSERT INTO `equipment` VALUES('15', 'FHC', 'STEAM COOKER', '3', '1', 'STEAM COOKER', '1');
INSERT INTO `equipment` VALUES('16', 'FRG', 'FRIDGE-1', '3', '1', 'FRIDGE-1', '1');
INSERT INTO `equipment` VALUES('17', 'FRG', 'FRIDGE-2', '3', '1', 'FRIDGE-2', '1');
INSERT INTO `equipment` VALUES('18', 'FRG', 'FRIDGE-3', '1', '1', 'FRIDGE-3', '1');
INSERT INTO `equipment` VALUES('19', 'FRG', 'FRIDGE-4', '2', '1', 'FRIDGE-4', '1');
INSERT INTO `equipment` VALUES('22', 'FHC', 'UTENCILE', '4', '1', 'UTENCILE', '1');
INSERT INTO `equipment` VALUES('23', 'TEST', 'TEST', '1', '1', 'TEST', '1');

-- Structure for table `goods_in`
DROP TABLE IF EXISTS `goods_in`;
CREATE TABLE `goods_in` (
  `g_id` int(1) NOT NULL AUTO_INCREMENT,
  `date1` date NOT NULL,
  `g_item_id` tinyint(1) NOT NULL,
  `g_sup_id` tinyint(1) NOT NULL,
  `g_amount` float NOT NULL,
  `g_temp` float NOT NULL,
  `g_by_date` date NOT NULL,
  `g_initial` tinyint(1) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `goods_in`
INSERT INTO `goods_in` VALUES('6', '2025-07-01', '2', '1', '44.88', '4.6', '2025-08-02', '1');
INSERT INTO `goods_in` VALUES('7', '2025-07-01', '1', '1', '65', '88', '2025-07-24', '1');
INSERT INTO `goods_in` VALUES('8', '2025-07-01', '1', '1', '65.87', '56.45', '2025-07-16', '1');
INSERT INTO `goods_in` VALUES('9', '2025-07-01', '1', '1', '65.87', '56.45', '2025-07-16', '1');

-- Structure for table `ingredient`
DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
  `ing_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `ing_code` varchar(5) NOT NULL,
  `ing_name` varchar(30) NOT NULL,
  `ing_location` tinyint(1) NOT NULL,
  `ing_ph` tinyint(1) NOT NULL,
  `ing_desc` varchar(50) NOT NULL,
  `ing_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ing_id`),
  UNIQUE KEY `ing_name` (`ing_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `ingredient`
INSERT INTO `ingredient` VALUES('1', 'BRWH', 'Bread (white)', '1', '0', 'Bread (white)', '1');
INSERT INTO `ingredient` VALUES('2', 'BRBR', 'Bread (Brown)', '1', '0', 'Bread (Brown)', '1');
INSERT INTO `ingredient` VALUES('3', 'BRMAL', 'Bread (Malted)', '1', '0', 'Bread (Malted)', '1');
INSERT INTO `ingredient` VALUES('4', 'WRP', 'Wrap', '1', '0', 'Wrap', '1');
INSERT INTO `ingredient` VALUES('5', 'MAY', 'Mayonnaise', '1', '0', 'Mayonnaise', '1');
INSERT INTO `ingredient` VALUES('6', 'PPS', 'Peri Peri sauce', '1', '0', 'Peri Peri sauce', '1');
INSERT INTO `ingredient` VALUES('7', 'SCS', 'Sweet chili sauce', '1', '0', 'Sweet chili sauce', '1');
INSERT INTO `ingredient` VALUES('8', 'THS', 'Thousand island  sauce', '1', '0', 'Thousand island  sauce', '1');
INSERT INTO `ingredient` VALUES('9', 'BS', 'Burger Sauce', '1', '0', 'Burger Sauce', '1');
INSERT INTO `ingredient` VALUES('10', 'MS', 'Mint sauce', '1', '0', 'Mint sauce', '1');
INSERT INTO `ingredient` VALUES('11', 'VHS', 'Very hot sauce', '1', '0', 'Very hot sauce', '1');
INSERT INTO `ingredient` VALUES('12', 'CHS', 'Cheese', '1', '0', 'Cheese', '1');
INSERT INTO `ingredient` VALUES('13', 'CHSLC', 'Cheese Slice ', '1', '0', 'Cheese Slice ', '1');
INSERT INTO `ingredient` VALUES('14', 'RLC', 'Red Lister Cheese', '1', '0', 'Red Lister Cheese', '1');
INSERT INTO `ingredient` VALUES('15', 'TUNA', 'Tuna ', '1', '0', 'Tuna ', '1');
INSERT INTO `ingredient` VALUES('16', 'BBOX', 'Baguette box ', '1', '0', 'Baguette box ', '1');
INSERT INTO `ingredient` VALUES('17', 'SW', 'Sandwich wedges', '1', '0', 'Sandwich wedges', '1');
INSERT INTO `ingredient` VALUES('18', 'EGG', 'Eggs', '3', '1', 'Eggs', '1');
INSERT INTO `ingredient` VALUES('19', 'SBR', 'Spicy breading ', '3', '0', 'Spicy breading ', '1');
INSERT INTO `ingredient` VALUES('20', 'TPD', 'Tandoori Powder', '3', '0', 'Tandoori Powder', '1');
INSERT INTO `ingredient` VALUES('21', 'OIL', 'Oil', '3', '0', 'Oil', '1');
INSERT INTO `ingredient` VALUES('22', 'YGT', 'Yoghurt', '3', '0', 'Yoghurt', '1');
INSERT INTO `ingredient` VALUES('23', 'CHK', 'Chicken Pak Poultry', '3', '1', 'Chicken Pak Poultry', '1');
INSERT INTO `ingredient` VALUES('24', 'CHK', 'Chicken Channel Poultry', '3', '1', 'Chicken Channel Poultry', '1');
INSERT INTO `ingredient` VALUES('25', 'TEST', 'TEST', '2', '2', 'TEST', '1');

-- Structure for table `item`
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(5) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `item_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `prd_name` (`item_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `item`
INSERT INTO `item` VALUES('1', 'Nitm1', 'New Item12', 'New Item12', '1');
INSERT INTO `item` VALUES('2', 'ITM1', 'ITEM1', 'ITEM123', '1');
INSERT INTO `item` VALUES('3', 'FHC', 'TEST', 'fgff', '1');

-- Structure for table `phantom_product`
DROP TABLE IF EXISTS `phantom_product`;
CREATE TABLE `phantom_product` (
  `ph_prd_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `ph_prd_code` varchar(5) NOT NULL,
  `ph_prd_name` varchar(30) NOT NULL,
  `ph_ing_1` tinyint(1) NOT NULL,
  `ph_ing_2` tinyint(1) NOT NULL,
  `ph_ing_3` tinyint(1) NOT NULL,
  `ph_prd_desc` varchar(50) NOT NULL,
  `ph_prd_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ph_prd_id`),
  UNIQUE KEY `prd_name` (`ph_prd_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `phantom_product`
INSERT INTO `phantom_product` VALUES('1', 'CHKTK', 'Chicken Tikka', '24', '0', '0', 'Chicken Tikka1', '1');
INSERT INTO `phantom_product` VALUES('2', 'CHKFR', 'Fry Chicken', '24', '0', '0', 'Fry Chicken', '1');
INSERT INTO `phantom_product` VALUES('3', 'CHKBL', 'Boiled Chicken', '24', '0', '0', 'Boiled Chicken', '1');
INSERT INTO `phantom_product` VALUES('4', 'BOLEG', 'Boiled Egg', '0', '0', '0', 'Boiled Egg', '1');
INSERT INTO `phantom_product` VALUES('5', 'TEST', 'TEST', '24', '23', '18', 'TEST1', '1');

-- Structure for table `pre_production_cooking`
DROP TABLE IF EXISTS `pre_production_cooking`;
CREATE TABLE `pre_production_cooking` (
  `pre_pro_ck_id` int(1) NOT NULL AUTO_INCREMENT,
  `ppc_date` date NOT NULL,
  `ppc_time` time NOT NULL,
  `ppc_initial` tinyint(1) NOT NULL,
  `ppc_comment` varchar(50) NOT NULL,
  `eq_1` tinyint(1) NOT NULL,
  `eq_2` tinyint(1) NOT NULL,
  `eq_3` tinyint(1) NOT NULL,
  `eq_4` tinyint(1) NOT NULL,
  `eq_5` tinyint(1) NOT NULL,
  `eq_6` tinyint(1) NOT NULL,
  `eq_7` tinyint(1) NOT NULL,
  `eq_8` tinyint(1) NOT NULL,
  `eq_9` tinyint(1) NOT NULL,
  `eq_12` tinyint(1) NOT NULL,
  `eq_13` tinyint(1) NOT NULL,
  `eq_14` tinyint(1) NOT NULL,
  `eq_15` tinyint(1) NOT NULL,
  `eq_16` tinyint(1) NOT NULL,
  `eq_17` tinyint(1) NOT NULL,
  `eq_22` tinyint(1) NOT NULL,
  PRIMARY KEY (`pre_pro_ck_id`),
  UNIQUE KEY `ppc_date` (`ppc_date`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `pre_production_cooking`
INSERT INTO `pre_production_cooking` VALUES('4', '2025-05-22', '09:52:13', '4', 'NIL', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('5', '2025-05-27', '16:36:33', '1', 'aaa', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('6', '2025-05-29', '22:52:44', '1', 'aaaa', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('7', '2025-05-30', '23:06:44', '1', 'aa', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('8', '2025-06-09', '16:31:40', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('9', '2025-06-10', '23:38:21', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('10', '2025-06-24', '17:00:54', '1', 'NIL', '1', '1', '1', '2', '1', '2', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('11', '2025-06-29', '14:45:39', '1', 'NIl', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('12', '2025-06-30', '16:32:00', '4', 'bb', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('13', '2025-07-01', '16:09:00', '1', 'NIl', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('14', '2025-07-02', '15:48:00', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_cooking` VALUES('15', '2025-08-01', '04:53:00', '1', 'xdss', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- Structure for table `pre_production_packing_ff`
DROP TABLE IF EXISTS `pre_production_packing_ff`;
CREATE TABLE `pre_production_packing_ff` (
  `pre_pro_pckf_id` int(1) NOT NULL AUTO_INCREMENT,
  `pppf_date` date NOT NULL,
  `pppf_time` time NOT NULL,
  `pppf_initial` tinyint(1) NOT NULL,
  `pppf_comment` varchar(50) NOT NULL,
  `eq_1` tinyint(1) NOT NULL,
  `eq_2` tinyint(1) NOT NULL,
  `eq_3` tinyint(1) NOT NULL,
  `eq_4` tinyint(1) NOT NULL,
  `eq_5` tinyint(1) NOT NULL,
  `eq_6` tinyint(1) NOT NULL,
  `eq_7` tinyint(1) NOT NULL,
  `eq_8` tinyint(1) NOT NULL,
  `eq_9` tinyint(1) NOT NULL,
  `eq_11` tinyint(1) NOT NULL,
  `eq_12` tinyint(1) NOT NULL,
  `eq_13` tinyint(1) NOT NULL,
  `eq_18` tinyint(1) NOT NULL,
  `eq_22` tinyint(1) NOT NULL,
  `eq_23` tinyint(1) NOT NULL,
  PRIMARY KEY (`pre_pro_pckf_id`),
  UNIQUE KEY `ppp_date` (`pppf_date`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `pre_production_packing_ff`
INSERT INTO `pre_production_packing_ff` VALUES('1', '2025-05-22', '09:59:33', '1', 'NIL', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');
INSERT INTO `pre_production_packing_ff` VALUES('2', '2025-05-27', '16:25:25', '1', 'aaa', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');
INSERT INTO `pre_production_packing_ff` VALUES('3', '2025-05-29', '22:53:14', '1', 'aaa', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');
INSERT INTO `pre_production_packing_ff` VALUES('7', '2025-06-09', '16:29:59', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');
INSERT INTO `pre_production_packing_ff` VALUES('8', '2025-06-10', '23:37:36', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');
INSERT INTO `pre_production_packing_ff` VALUES('9', '2025-06-24', '16:58:53', '1', 'NIL', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_packing_ff` VALUES('10', '2025-06-29', '14:41:13', '1', 'Nil', '1', '1', '2', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_packing_ff` VALUES('11', '2025-06-30', '15:59:00', '1', 'AAA', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `pre_production_packing_ff` VALUES('12', '2025-08-01', '04:49:00', '1', 'asas', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- Structure for table `pre_production_packing_sf`
DROP TABLE IF EXISTS `pre_production_packing_sf`;
CREATE TABLE `pre_production_packing_sf` (
  `pre_pro_pcks_id` int(1) NOT NULL AUTO_INCREMENT,
  `ppps_date` date NOT NULL,
  `ppps_time` time NOT NULL,
  `ppps_initial` tinyint(1) NOT NULL,
  `ppps_comment` varchar(50) NOT NULL,
  `eq_1` tinyint(1) NOT NULL,
  `eq_2` tinyint(1) NOT NULL,
  `eq_3` tinyint(1) NOT NULL,
  `eq_4` tinyint(1) NOT NULL,
  `eq_5` tinyint(1) NOT NULL,
  `eq_6` tinyint(1) NOT NULL,
  `eq_7` tinyint(1) NOT NULL,
  `eq_8` tinyint(1) NOT NULL,
  `eq_9` tinyint(1) NOT NULL,
  `eq_12` tinyint(1) NOT NULL,
  `eq_13` tinyint(1) NOT NULL,
  `eq_19` tinyint(1) NOT NULL,
  `eq_22` tinyint(1) NOT NULL,
  PRIMARY KEY (`pre_pro_pcks_id`),
  UNIQUE KEY `ppp_date` (`ppps_date`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `pre_production_packing_sf`
INSERT INTO `pre_production_packing_sf` VALUES('1', '2025-05-22', '10:00:30', '1', 'NIL', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('2', '2025-05-27', '16:26:46', '1', 'aaa', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('3', '2025-06-09', '16:31:20', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('4', '2025-06-10', '23:38:01', '1', 'Nil', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('5', '2025-06-24', '17:00:38', '1', 'NIL', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('6', '2025-06-29', '14:43:42', '1', 'abc', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');
INSERT INTO `pre_production_packing_sf` VALUES('7', '2025-06-30', '20:35:00', '3', 'fgfd', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1');

-- Structure for table `product`
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `prd_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `prd_code` varchar(5) NOT NULL,
  `prd_name` varchar(30) NOT NULL,
  `prd_desc` varchar(50) NOT NULL,
  `prd_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`prd_id`),
  UNIQUE KEY `prd_name` (`prd_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `product`
INSERT INTO `product` VALUES('1', 'SND', 'Sandwich', 'Sandwich', '1');
INSERT INTO `product` VALUES('2', 'BGT', 'Baguette', 'Baguette', '1');
INSERT INTO `product` VALUES('3', 'SAM', 'Samosa', 'Samosa', '1');
INSERT INTO `product` VALUES('4', 'WRP', 'Wrap', 'Wrap', '1');
INSERT INTO `product` VALUES('5', 'TEST', 'TEST', 'TEST', '0');

-- Structure for table `production_check_packing`
DROP TABLE IF EXISTS `production_check_packing`;
CREATE TABLE `production_check_packing` (
  `prd_pk_id` smallint(1) NOT NULL AUTO_INCREMENT,
  `prd_pk_loc` tinyint(1) NOT NULL,
  `prd_pk_date` date NOT NULL,
  `prd_pk_batch` mediumint(1) NOT NULL,
  `prd_id` tinyint(1) NOT NULL,
  `sub_prd_id` tinyint(1) NOT NULL,
  `ph_batch` mediumint(1) NOT NULL,
  `prd_pk_qty` smallint(1) NOT NULL,
  `prd_pk_seal` tinyint(1) NOT NULL,
  `prd_pk_use_date` date NOT NULL,
  `prd_pk_labels` tinyint(1) NOT NULL,
  `prd_pk_appearance` tinyint(1) NOT NULL,
  `prd_pk_chk_by` tinyint(1) NOT NULL,
  PRIMARY KEY (`prd_pk_id`),
  UNIQUE KEY `prd_pk_batch` (`prd_pk_batch`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `production_check_packing`
INSERT INTO `production_check_packing` VALUES('1', '0', '2025-05-22', '52201', '1', '15', '52201', '55', '1', '2025-05-28', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('2', '0', '2025-05-22', '52202', '2', '25', '52203', '65', '1', '2025-05-28', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('3', '1', '2025-05-27', '52701', '2', '4', '0', '4', '1', '2025-06-02', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('4', '1', '2025-05-27', '52702', '2', '3', '0', '43', '1', '2025-06-02', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('5', '2', '2025-05-27', '52703', '3', '28', '0', '56', '1', '2025-06-02', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('6', '1', '2025-06-10', '61001', '2', '3', '61001', '5', '1', '2025-06-16', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('7', '1', '2025-06-10', '61002', '3', '28', '61001', '65', '1', '2025-06-16', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('8', '1', '2025-06-10', '61003', '3', '28', '61001', '65', '1', '2025-06-16', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('9', '2', '2025-06-10', '61004', '1', '1', '61001', '65', '1', '2025-06-16', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('10', '1', '2025-06-24', '62401', '1', '1', '62401', '54', '1', '2025-06-30', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('11', '1', '2025-06-24', '62402', '2', '3', '62401', '66', '1', '2025-06-30', '1', '0', '1');
INSERT INTO `production_check_packing` VALUES('12', '2', '2025-06-24', '62403', '2', '17', '62401', '55', '1', '2025-06-30', '1', '1', '4');
INSERT INTO `production_check_packing` VALUES('13', '1', '2025-06-29', '62901', '1', '10', '62901', '50', '1', '2025-07-05', '1', '1', '2');
INSERT INTO `production_check_packing` VALUES('14', '2', '2025-06-29', '62902', '2', '17', '62902', '66', '1', '2025-07-05', '1', '1', '3');
INSERT INTO `production_check_packing` VALUES('15', '2', '2025-06-30', '63001', '1', '13', '63001', '55', '1', '2025-07-06', '1', '1', '3');
INSERT INTO `production_check_packing` VALUES('16', '2', '2025-06-30', '63002', '3', '30', '63002', '44', '1', '2025-07-06', '1', '1', '3');
INSERT INTO `production_check_packing` VALUES('17', '1', '2025-06-30', '63003', '2', '20', '63002', '55', '1', '2025-07-06', '1', '1', '2');
INSERT INTO `production_check_packing` VALUES('18', '1', '2025-06-30', '63004', '3', '29', '63001', '66', '1', '2025-07-06', '1', '1', '2');
INSERT INTO `production_check_packing` VALUES('19', '2', '2025-07-05', '70501', '1', '15', '0', '122', '1', '2025-07-11', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('20', '1', '2025-07-05', '70502', '1', '14', '0', '556', '1', '2025-07-11', '1', '1', '1');
INSERT INTO `production_check_packing` VALUES('21', '1', '2025-07-05', '70503', '1', '14', '0', '556', '1', '2025-07-11', '1', '1', '1');

-- Structure for table `production_cooking`
DROP TABLE IF EXISTS `production_cooking`;
CREATE TABLE `production_cooking` (
  `prd_ck_id` int(1) NOT NULL AUTO_INCREMENT,
  `prd_ck_date` date NOT NULL,
  `ph_prd_id` tinyint(1) NOT NULL,
  `prd_ck_batch` mediumint(1) NOT NULL,
  `ing_bat_1` varchar(10) NOT NULL,
  `ing_bat_2` varchar(10) NOT NULL,
  `ing_bat_3` varchar(10) NOT NULL,
  `prd_ck_s_time` time NOT NULL,
  `prd_ck_temp` float NOT NULL,
  `prd_ck_f_time` time NOT NULL,
  `prd_col_s_time` time NOT NULL,
  `prd_col_f_time` time NOT NULL,
  `prd_col_temp` float NOT NULL,
  `prd_chk_by` tinyint(1) NOT NULL,
  PRIMARY KEY (`prd_ck_id`),
  UNIQUE KEY `prd_ck_batch` (`prd_ck_batch`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `production_cooking`
INSERT INTO `production_cooking` VALUES('1', '2025-05-22', '1', '52201', '34', '0', '0', '07:30:00', '82', '11:05:22', '11:05:22', '11:05:22', '5', '3');
INSERT INTO `production_cooking` VALUES('2', '2025-05-22', '3', '52202', '34', '0', '0', '11:05:22', '89', '11:11:00', '11:11:07', '11:15:17', '2', '7');
INSERT INTO `production_cooking` VALUES('4', '2025-05-22', '3', '52203', '12345', '0', '0', '11:05:22', '87', '11:15:57', '11:56:03', '16:12:11', '2', '4');
INSERT INTO `production_cooking` VALUES('5', '2025-05-27', '1', '52701', '34', '0', '0', '16:52:08', '82', '16:52:25', '20:30:15', '20:35:19', '4', '2');
INSERT INTO `production_cooking` VALUES('6', '2025-05-31', '1', '53101', '12321', '0', '0', '19:44:37', '0', '00:00:00', '00:00:00', '00:00:00', '0', '1');
INSERT INTO `production_cooking` VALUES('7', '2025-06-09', '1', '60901', 'asdsad', '0', '0', '17:11:45', '83', '17:12:12', '17:17:15', '17:46:23', '4', '1');
INSERT INTO `production_cooking` VALUES('8', '2025-06-10', '2', '61001', '22132', '0', '0', '23:41:45', '84', '23:59:06', '23:50:00', '00:44:16', '5', '3');
INSERT INTO `production_cooking` VALUES('9', '2025-06-10', '2', '61002', '22132', '0', '0', '23:59:18', '89', '12:01:32', '13:00:18', '13:00:24', '4', '4');
INSERT INTO `production_cooking` VALUES('10', '2025-06-10', '2', '61003', '21323', '0', '0', '23:59:32', '89', '13:00:44', '13:00:49', '13:00:51', '3', '7');
INSERT INTO `production_cooking` VALUES('11', '2025-06-24', '1', '62401', 'SDF', '0', '0', '17:01:43', '89', '17:57:25', '18:02:34', '18:56:45', '5', '4');
INSERT INTO `production_cooking` VALUES('12', '2025-06-29', '1', '62901', '4343', '0', '0', '14:46:31', '84', '15:15:49', '15:54:01', '16:38:15', '5', '4');
INSERT INTO `production_cooking` VALUES('13', '2025-06-29', '1', '62902', '4343', '0', '0', '14:48:01', '88', '15:10:01', '15:59:11', '16:33:26', '4', '4');
INSERT INTO `production_cooking` VALUES('14', '2025-06-30', '1', '63001', 'wer', '0', '0', '15:32:00', '87', '16:34:00', '16:59:00', '17:34:00', '5', '4');
INSERT INTO `production_cooking` VALUES('15', '2025-06-30', '2', '63002', '55', '0', '0', '16:30:00', '88', '16:33:00', '16:39:00', '17:34:00', '4', '4');
INSERT INTO `production_cooking` VALUES('16', '2025-07-01', '1', '70101', '433', '0', '0', '16:10:00', '87.45', '00:00:00', '00:00:00', '00:00:00', '0', '2');
INSERT INTO `production_cooking` VALUES('17', '2025-07-01', '2', '70102', '76', '0', '0', '16:30:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '2');
INSERT INTO `production_cooking` VALUES('19', '2025-07-01', '3', '70103', 'eqwe', '0', '0', '16:30:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '1');
INSERT INTO `production_cooking` VALUES('22', '2025-07-01', '4', '70104', '0', '0', '0', '16:44:00', '88', '00:00:00', '00:00:00', '00:00:00', '0', '2');
INSERT INTO `production_cooking` VALUES('23', '2025-07-02', '1', '70201', '324', '0', '0', '15:51:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('24', '2025-07-02', '2', '70202', 'we', '0', '0', '16:04:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('25', '2025-07-02', '4', '70203', '0', '0', '0', '16:05:00', '82', '16:06:00', '16:24:00', '16:13:00', '4', '1');
INSERT INTO `production_cooking` VALUES('26', '2025-07-02', '3', '70204', '324', '0', '0', '16:22:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '4');
INSERT INTO `production_cooking` VALUES('27', '2025-07-02', '1', '70205', 'we', '0', '0', '16:26:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '4');
INSERT INTO `production_cooking` VALUES('28', '2025-07-02', '1', '70206', 'we', '0', '0', '16:26:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '4');
INSERT INTO `production_cooking` VALUES('29', '2025-07-02', '1', '70207', 'we', '0', '0', '16:26:00', '84', '00:00:00', '00:00:00', '00:00:00', '0', '4');
INSERT INTO `production_cooking` VALUES('30', '2025-07-02', '3', '70208', 'we', '0', '0', '16:34:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('31', '2025-07-02', '3', '70209', '324', '0', '0', '16:44:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('32', '2025-08-05', '1', '80501', 'eqqw', '0', '0', '04:54:00', '0', '00:00:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('34', '2025-08-01', '2', '80101', 'eqqw', '0', '0', '04:58:00', '87', '05:14:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('35', '2025-08-01', '2', '80102', '12345', '0', '0', '05:23:00', '88', '05:24:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('36', '2025-08-01', '2', '80103', 'eqwe', '0', '0', '05:27:00', '88', '05:28:00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `production_cooking` VALUES('37', '2025-08-01', '1', '80104', '88', '0', '0', '05:30:00', '88', '05:31:00', '05:31:00', '06:07:00', '4', '0');

-- Structure for table `ref_temprature_log`
DROP TABLE IF EXISTS `ref_temprature_log`;
CREATE TABLE `ref_temprature_log` (
  `ref_id` int(1) NOT NULL AUTO_INCREMENT,
  `ref_eq_id` tinyint(1) NOT NULL,
  `ref_date` date NOT NULL,
  `ref_time` time NOT NULL,
  `ref_temp` float NOT NULL,
  `ref_initial` tinyint(1) NOT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `ref_temprature_log`
INSERT INTO `ref_temprature_log` VALUES('36', '18', '2025-05-27', '08:07:32', '45', '1');
INSERT INTO `ref_temprature_log` VALUES('37', '19', '2025-05-27', '08:07:52', '43', '1');
INSERT INTO `ref_temprature_log` VALUES('38', '16', '2025-05-27', '03:08:03', '54', '1');
INSERT INTO `ref_temprature_log` VALUES('39', '17', '2025-05-27', '02:08:07', '56', '1');
INSERT INTO `ref_temprature_log` VALUES('40', '17', '2025-05-27', '08:08:40', '54', '1');
INSERT INTO `ref_temprature_log` VALUES('44', '16', '2025-05-27', '09:10:18', '4', '1');
INSERT INTO `ref_temprature_log` VALUES('45', '16', '2025-05-29', '08:41:06', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('46', '17', '2025-05-29', '08:41:09', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('47', '18', '2025-05-29', '08:41:11', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('48', '19', '2025-05-29', '08:41:15', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('49', '16', '2025-05-30', '11:06:22', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('50', '17', '2025-05-30', '11:06:24', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('51', '18', '2025-05-30', '11:06:27', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('52', '19', '2025-05-30', '11:06:29', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('53', '16', '2025-05-31', '06:46:22', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('54', '17', '2025-05-31', '06:46:26', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('55', '18', '2025-05-31', '06:46:29', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('56', '19', '2025-05-31', '06:46:33', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('57', '16', '2025-06-17', '12:13:44', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('58', '17', '2025-06-17', '12:16:13', '4', '1');
INSERT INTO `ref_temprature_log` VALUES('59', '18', '2025-06-17', '12:16:17', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('60', '19', '2025-06-17', '12:16:21', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('61', '16', '2025-06-17', '03:54:00', '4', '1');
INSERT INTO `ref_temprature_log` VALUES('62', '17', '2025-06-17', '03:54:06', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('63', '18', '2025-06-17', '03:54:10', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('64', '19', '2025-06-17', '03:54:21', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('65', '18', '2025-06-20', '11:13:14', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('66', '16', '2025-06-20', '11:19:56', '2', '1');
INSERT INTO `ref_temprature_log` VALUES('67', '17', '2025-06-20', '11:19:59', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('68', '19', '2025-06-20', '11:20:02', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('69', '18', '2025-06-29', '02:41:11', '2', '2');
INSERT INTO `ref_temprature_log` VALUES('70', '19', '2025-06-29', '02:43:39', '4', '3');
INSERT INTO `ref_temprature_log` VALUES('71', '16', '2025-06-29', '02:45:05', '4', '4');
INSERT INTO `ref_temprature_log` VALUES('72', '17', '2025-06-29', '02:45:18', '4', '4');
INSERT INTO `ref_temprature_log` VALUES('73', '18', '2025-06-30', '04:26:16', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('74', '19', '2025-06-30', '04:27:34', '4', '3');
INSERT INTO `ref_temprature_log` VALUES('75', '16', '2025-06-30', '04:28:31', '3', '4');
INSERT INTO `ref_temprature_log` VALUES('76', '17', '2025-06-30', '04:28:38', '4', '4');
INSERT INTO `ref_temprature_log` VALUES('77', '16', '2025-07-01', '14:48:00', '5', '4');
INSERT INTO `ref_temprature_log` VALUES('78', '17', '2025-07-01', '14:48:00', '2', '4');
INSERT INTO `ref_temprature_log` VALUES('79', '18', '2025-07-01', '14:53:00', '4.3', '2');
INSERT INTO `ref_temprature_log` VALUES('80', '18', '2025-07-06', '22:33:00', '5', '2');
INSERT INTO `ref_temprature_log` VALUES('81', '18', '2025-07-06', '10:56:00', '4', '2');
INSERT INTO `ref_temprature_log` VALUES('82', '18', '2025-07-08', '01:46:00', '4', '2');
INSERT INTO `ref_temprature_log` VALUES('83', '16', '2025-08-05', '04:42:35', '4', '1');
INSERT INTO `ref_temprature_log` VALUES('84', '17', '2025-08-05', '04:42:41', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('85', '18', '2025-08-05', '04:42:45', '3', '1');
INSERT INTO `ref_temprature_log` VALUES('86', '19', '2025-08-05', '04:42:51', '4', '1');
INSERT INTO `ref_temprature_log` VALUES('87', '16', '2025-08-06', '02:16:00', '3', '4');
INSERT INTO `ref_temprature_log` VALUES('88', '17', '2025-08-06', '02:16:00', '3', '4');

-- Structure for table `sub_product`
DROP TABLE IF EXISTS `sub_product`;
CREATE TABLE `sub_product` (
  `sub_prd_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `prd_id` tinyint(1) NOT NULL,
  `sub_prd_code` varchar(5) NOT NULL,
  `sub_prd_name` varchar(30) NOT NULL,
  `sub_prd_desc` varchar(50) NOT NULL,
  `sub_prd_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sub_prd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `sub_product`
INSERT INTO `sub_product` VALUES('1', '1', 'SCHON', 'Cheese Onion', 'Cheese Onionv', '1');
INSERT INTO `sub_product` VALUES('2', '1', 'SCHSA', 'Cheese Savoury', 'Cheese Savoury', '1');
INSERT INTO `sub_product` VALUES('3', '2', 'BPPCH', 'Peri Peri Chicken', 'Peri Peri Chicken', '1');
INSERT INTO `sub_product` VALUES('4', '2', 'BTMSA', 'Tuna Mayonnaise Salad ', 'Tuna Mayonnaise Salad ', '1');
INSERT INTO `sub_product` VALUES('5', '4', 'SCT', 'Spicy Chicken Tortilla', 'Spicy Chicken Tortilla', '1');
INSERT INTO `sub_product` VALUES('6', '1', 'TMS', 'Tuna Mayonnaise & salad', 'Tuna Mayonnaise & salad', '1');
INSERT INTO `sub_product` VALUES('7', '1', 'TMSC', 'Tuna Mayonnaise sweet corn', 'Tuna Mayonnaise sweet corn', '1');
INSERT INTO `sub_product` VALUES('8', '1', 'PPC', 'Peri Peri Chicken', 'Peri Peri Chicken', '1');
INSERT INTO `sub_product` VALUES('9', '1', 'CM', 'Chicken Mayo', 'Chicken Mayo', '1');
INSERT INTO `sub_product` VALUES('10', '1', 'CTK', 'Chicken Tikka', 'Chicken Tikka', '1');
INSERT INTO `sub_product` VALUES('11', '1', 'EGS', 'Egg Salad', 'Egg Salad', '1');
INSERT INTO `sub_product` VALUES('12', '1', 'CS', 'Cheese salad', 'Cheese salad', '1');
INSERT INTO `sub_product` VALUES('13', '1', 'EGM', 'Egg Mayonnaise', 'Egg Mayonnaise', '1');
INSERT INTO `sub_product` VALUES('14', '1', 'MCK', 'Mexican chicken', 'Mexican chicken', '1');
INSERT INTO `sub_product` VALUES('15', '1', 'BCH', 'Buffalo Chicken', 'Buffalo Chicken', '1');
INSERT INTO `sub_product` VALUES('16', '1', 'CHCK', 'Chilli Chicken ', 'Chilli Chicken ', '1');
INSERT INTO `sub_product` VALUES('17', '2', 'BPPC', 'Peri Peri Chicken ', 'Peri Peri Chicken ', '1');
INSERT INTO `sub_product` VALUES('18', '2', 'BTMS', 'Tuna Mayonnaise Salad ', 'Tuna Mayonnaise Salad \r\n', '1');
INSERT INTO `sub_product` VALUES('19', '2', 'BTS', 'Tuna Sweetcorn', 'Tuna Sweetcorn\r\n', '1');
INSERT INTO `sub_product` VALUES('20', '2', 'BMCS', 'Morroccan Chicken salad ', 'Morroccan Chicken salad \r\n', '1');
INSERT INTO `sub_product` VALUES('21', '2', 'BCMY', 'Chicken mayo', 'Chicken mayo', '1');
INSERT INTO `sub_product` VALUES('22', '2', 'BCO', 'Cheese Onion', 'Cheese Onion', '1');
INSERT INTO `sub_product` VALUES('23', '2', 'BCTK', 'Chicken tikka', 'Chicken tikka', '1');
INSERT INTO `sub_product` VALUES('24', '2', 'BEGM', 'Egg Mayonnaise', 'Egg Mayonnaise\r\n', '1');
INSERT INTO `sub_product` VALUES('25', '2', 'BMC', 'Mexican chicken', 'Mexican chicken\r\n', '1');
INSERT INTO `sub_product` VALUES('26', '2', 'BBCH', 'Buffalo chicken', 'Buffalo chicken\r\n', '1');
INSERT INTO `sub_product` VALUES('27', '4', 'WSCC', 'Sweet chilli chicken', 'Sweet chilli chicken\r\n', '1');
INSERT INTO `sub_product` VALUES('28', '3', 'SMS', 'Meat Samosa', 'Meat Samosa\r\n', '1');
INSERT INTO `sub_product` VALUES('29', '3', 'SCHS', 'Chicken Samosa', 'Chicken Samosa\r\n', '1');
INSERT INTO `sub_product` VALUES('30', '3', 'SVSM', 'Veg Samosa', 'Veg Samosa\r\n', '1');
INSERT INTO `sub_product` VALUES('31', '1', 'TEST', 'TEST', 'TEST', '0');
INSERT INTO `sub_product` VALUES('32', '2', 'TEST', 'TEST', 'TEST', '0');
INSERT INTO `sub_product` VALUES('33', '3', 'TEST', 'TEST', 'TEST', '0');

-- Structure for table `supplier`
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `sup_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `sup_code` varchar(5) NOT NULL,
  `sup_name` varchar(30) NOT NULL,
  `sup_desc` varchar(50) NOT NULL,
  `sup_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sup_id`),
  UNIQUE KEY `prd_name` (`sup_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `supplier`
INSERT INTO `supplier` VALUES('1', 'sup3', 'Sup13', 'sup13', '1');

-- Structure for table `time`
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `id` tinyint(1) NOT NULL,
  `op` varchar(1) NOT NULL,
  `hh` tinyint(1) NOT NULL,
  `mm` tinyint(1) NOT NULL,
  `ss` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `time`
INSERT INTO `time` VALUES('1', '-', '1', '60', '60');

-- Structure for table `traceability_cooking`
DROP TABLE IF EXISTS `traceability_cooking`;
CREATE TABLE `traceability_cooking` (
  `trac_ck_id` int(1) NOT NULL AUTO_INCREMENT,
  `trc_date` date NOT NULL,
  `trc_time` time NOT NULL,
  `trc_initial` tinyint(1) NOT NULL,
  `exp_18` date DEFAULT NULL,
  `bat_18` varchar(10) DEFAULT NULL,
  `com_18` varchar(10) DEFAULT NULL,
  `exp_19` date DEFAULT NULL,
  `bat_19` varchar(10) DEFAULT NULL,
  `com_19` varchar(20) DEFAULT NULL,
  `exp_20` date DEFAULT NULL,
  `bat_20` varchar(10) DEFAULT NULL,
  `com_20` varchar(20) DEFAULT NULL,
  `exp_21` date DEFAULT NULL,
  `bat_21` varchar(10) DEFAULT NULL,
  `com_21` varchar(20) DEFAULT NULL,
  `exp_22` date DEFAULT NULL,
  `bat_22` varchar(10) DEFAULT NULL,
  `com_22` varchar(20) DEFAULT NULL,
  `exp_23` date DEFAULT NULL,
  `bat_23` varchar(10) DEFAULT NULL,
  `com_23` varchar(20) DEFAULT NULL,
  `exp_24` date DEFAULT NULL,
  `bat_24` varchar(10) DEFAULT NULL,
  `com_24` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`trac_ck_id`),
  UNIQUE KEY `trc_date` (`trc_date`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `traceability_cooking`
INSERT INTO `traceability_cooking` VALUES('1', '2025-05-22', '10:41:40', '1', '2025-05-29', '3', '', '2025-05-30', '34', '', '2025-05-29', '43', '', '2025-05-29', '3434', '', '2025-05-28', '34', '', '2025-05-28', '34', '', '2025-05-29', '34', '');
INSERT INTO `traceability_cooking` VALUES('2', '2025-05-27', '20:25:59', '1', '2025-05-29', '112', '', '2025-06-05', '121', '', '2025-06-05', '123213', '', '2025-06-04', '12321', '', '2025-06-03', '123123', '', '2025-06-04', '32', '', '2025-06-05', '555', '');
INSERT INTO `traceability_cooking` VALUES('3', '2025-05-31', '19:36:49', '1', '2025-06-10', '123', '1', '2025-06-18', '223', '11', '2025-06-19', '3422', '1', '2025-06-26', '1213', '1', '2025-06-27', '332133', '1', '2025-06-20', '12321', '1', '2025-07-02', '12321', '1');
INSERT INTO `traceability_cooking` VALUES('4', '2025-06-09', '16:30:26', '1', '2025-06-17', 'ssd', '', '2025-06-18', 'ad', '', '2025-06-17', 'dsasd', '', '2025-06-16', 'asd', '', '2025-06-14', 'dsadsa', '', '2025-06-16', 'asdsad', '', '2025-06-19', 'sad', '');
INSERT INTO `traceability_cooking` VALUES('5', '2025-06-10', '23:38:43', '1', '2025-06-10', '123', '', '2025-06-18', '213', '', '2025-06-26', '321', '', '2025-06-25', '3321', '', '2025-06-22', '22213', '', '2025-06-23', '22132', '', '2025-06-24', '21323', '');
INSERT INTO `traceability_cooking` VALUES('6', '2025-06-24', '17:01:12', '1', '2025-06-26', 'DF', '', '2025-06-27', 'SDFS', '', '2025-06-28', 'SDFSD', '', '2025-06-30', 'SDF', '', '2025-06-26', 'DSF', '', '2025-06-27', 'SDF', '', '2025-06-28', 'SDF', '');
INSERT INTO `traceability_cooking` VALUES('7', '2025-06-29', '14:45:55', '4', '2025-07-02', '213', '', '2025-07-11', '123213', '', '2025-07-10', '123123', '', '2025-07-09', '213123', '', '2025-07-10', '13123', '', '2025-07-08', '4343', '', '2025-07-03', '242132', '');
INSERT INTO `traceability_cooking` VALUES('8', '2025-06-30', '17:29:00', '4', '2025-07-09', 'erwer', '', '2025-07-10', 'ewr', '', '2025-07-10', 'ewwe', '', '2025-07-08', 'rewr', '', '2025-07-10', 'werwer', '', '2025-07-09', 'wer', '', '2025-07-09', 'ewr', '');
INSERT INTO `traceability_cooking` VALUES('9', '2025-07-01', '16:09:00', '1', '2025-07-24', 'weq', '', '2025-07-24', 'we', '', '2025-07-24', 'eqwe', '', '2025-07-18', 'wqe', '', '2025-07-11', 'wqe', '', '2025-07-24', 'eqqw', '', '2025-07-21', 'eqwe', '');
INSERT INTO `traceability_cooking` VALUES('12', '2025-08-05', '04:53:00', '1', '2025-08-24', 'weq', '', '2025-08-24', 'we', '', '2025-08-24', 'eqwe', '', '2025-08-18', 'wqe', '', '2025-08-11', 'wqe', '', '2025-08-24', 'eqqw', '', '2025-08-21', 'eqwe', '');

-- Structure for table `traceability_packing`
DROP TABLE IF EXISTS `traceability_packing`;
CREATE TABLE `traceability_packing` (
  `trac_pack_id` int(1) NOT NULL AUTO_INCREMENT,
  `trp_date` date NOT NULL,
  `trp_time` time NOT NULL,
  `trp_initial` tinyint(1) NOT NULL,
  `exp_1` date NOT NULL,
  `bat_1` varchar(10) NOT NULL,
  `com_1` varchar(20) NOT NULL,
  `exp_2` date NOT NULL,
  `bat_2` varchar(10) NOT NULL,
  `com_2` varchar(20) NOT NULL,
  `exp_3` date NOT NULL,
  `bat_3` varchar(10) NOT NULL,
  `com_3` varchar(20) NOT NULL,
  `exp_4` date NOT NULL,
  `bat_4` varchar(10) NOT NULL,
  `com_4` varchar(20) NOT NULL,
  `exp_5` date NOT NULL,
  `bat_5` varchar(10) NOT NULL,
  `com_5` varchar(20) NOT NULL,
  `exp_6` date NOT NULL,
  `bat_6` varchar(10) NOT NULL,
  `com_6` varchar(20) NOT NULL,
  `exp_7` date NOT NULL,
  `bat_7` varchar(10) NOT NULL,
  `com_7` varchar(20) NOT NULL,
  `exp_8` date NOT NULL,
  `bat_8` varchar(10) NOT NULL,
  `com_8` varchar(20) NOT NULL,
  `exp_9` date NOT NULL,
  `bat_9` varchar(10) NOT NULL,
  `com_9` varchar(20) NOT NULL,
  `exp_10` date NOT NULL,
  `bat_10` varchar(10) NOT NULL,
  `com_10` varchar(20) NOT NULL,
  `exp_11` date NOT NULL,
  `bat_11` varchar(10) NOT NULL,
  `com_11` varchar(20) NOT NULL,
  `exp_12` date NOT NULL,
  `bat_12` varchar(10) NOT NULL,
  `com_12` varchar(20) NOT NULL,
  `exp_13` date NOT NULL,
  `bat_13` varchar(10) NOT NULL,
  `com_13` varchar(20) NOT NULL,
  `exp_14` date NOT NULL,
  `bat_14` varchar(10) NOT NULL,
  `com_14` varchar(20) NOT NULL,
  `exp_15` date NOT NULL,
  `bat_15` varchar(10) NOT NULL,
  `com_15` varchar(20) NOT NULL,
  `exp_16` date NOT NULL,
  `bat_16` varchar(10) NOT NULL,
  `com_16` varchar(20) NOT NULL,
  `exp_17` date NOT NULL,
  `bat_17` varchar(10) NOT NULL,
  `com_17` varchar(20) NOT NULL,
  PRIMARY KEY (`trac_pack_id`),
  UNIQUE KEY `trp_date` (`trp_date`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `traceability_packing`
INSERT INTO `traceability_packing` VALUES('1', '2025-05-22', '10:42:01', '1', '2025-05-29', 'r34', '', '2025-05-22', '34', '', '2025-05-29', '345', '', '2025-05-29', '534', '', '2025-05-28', '3453', '', '2025-05-29', '345', '', '2025-05-29', '345', '', '2025-05-28', '435', '', '2025-05-29', '435', '', '2025-05-28', '435', '', '2025-05-28', '345', '', '2025-05-28', '2', '', '2025-05-27', '43', '', '2025-05-26', '55', '', '2025-06-04', '456', '', '2025-05-29', '345', '', '2025-06-05', '32', '');
INSERT INTO `traceability_packing` VALUES('2', '2025-05-27', '09:27:18', '1', '2025-05-29', '32', '', '2025-05-30', '3434', '', '2025-06-05', '232', '', '2025-05-30', '23434', '', '2025-05-30', '123213', '', '2025-06-05', '324', '', '2025-06-05', '23123', '', '2025-06-04', '443', '', '2025-06-05', '32323', '', '2025-05-30', '3242', '', '2025-06-07', '121', '', '2025-06-06', '23213', '', '2025-05-29', '433423', '', '2025-06-06', '1212', '', '2025-06-06', '1221', '', '2025-06-04', '1212', '', '2025-06-05', '12112', '');
INSERT INTO `traceability_packing` VALUES('3', '2025-06-09', '16:32:02', '1', '2025-06-26', 'sda', '', '2025-06-18', 'asdsd', '', '2025-06-25', 'asd', '', '2025-06-18', 'sad', '', '2025-06-17', 'asd', '', '2025-06-26', 'sad', '', '2025-06-25', 'sad', '', '2025-06-25', 'sdas', '', '2025-06-26', 'asd', '', '2025-06-26', 'asd', '', '2025-06-18', 'asd', '', '2025-06-24', 'dasd', '', '2025-06-20', 'asdasd', '', '2025-06-23', 'asdsa', '', '2025-06-24', 'sad', '', '2025-06-26', 'sad', '', '2025-06-25', 'sadda', '');
INSERT INTO `traceability_packing` VALUES('4', '2025-06-10', '23:39:30', '1', '2025-06-17', '21213', '', '2025-06-18', '32432', '', '2025-06-19', '23423', '', '2025-06-23', '1232321', '', '2025-06-20', '32432', '', '2025-06-18', '12343', '', '2025-06-18', '43412', '', '2025-06-24', '4312321', '', '2025-06-18', '23132', '', '2025-06-19', '1324', '', '2025-06-25', '214123', '', '2025-06-24', '123124', '', '2025-06-19', '42332', '', '2025-06-23', '213423', '', '2025-06-18', '13434', '', '2025-06-20', '2134', '', '2025-06-25', '12343', '');
INSERT INTO `traceability_packing` VALUES('5', '2025-06-24', '16:59:12', '1', '2025-06-25', 'FDS', '', '2025-06-26', 'SDFF', '', '2025-06-26', 'SDF', '', '2025-06-27', 'SDF', '', '2025-06-26', 'SDFS', '', '2025-06-26', 'DFSDF', '', '2025-06-26', 'FSD', '', '2025-06-28', 'FSDF', '', '2025-06-30', 'SDF', '', '2025-06-27', 'FSD', '', '2025-06-30', 'FD', '', '2025-06-28', 'SFD', '', '2025-07-03', 'DSDSF', '', '2025-07-01', 'DSF', '', '2025-07-09', 'SFSDFD', '', '2025-06-27', 'DSF', '', '2025-06-28', 'DSFDS', '');
INSERT INTO `traceability_packing` VALUES('6', '2025-06-29', '14:41:30', '2', '2025-07-02', '2323', '', '2025-07-03', '2323121', '', '2025-07-11', '12321', '', '2025-07-11', '213123', '', '2025-07-05', '1212321', '', '2025-07-11', '34123', '', '2025-07-11', '213123', '', '2025-07-02', '4334', '', '2025-07-05', '3554', '', '2025-07-11', '1234', '', '2025-07-12', '4543432', '', '2025-07-12', '21312312', '', '2025-07-11', '3123', '', '2025-07-10', '21321', '', '2025-07-12', '123', '', '2025-07-10', '1322', '', '2025-07-12', '12312', '');
INSERT INTO `traceability_packing` VALUES('7', '2025-06-30', '16:38:00', '2', '2025-07-03', 'dsf', '', '2025-07-09', 'sd', '', '2025-07-10', 'sf', '', '2025-07-10', 'sdf', '', '2025-07-11', 'sdf', '', '2025-07-10', 'sf', '', '2025-07-11', 'fd', '', '2025-07-09', 'ewr', '', '2025-07-10', 'wer', '', '2025-07-10', 'wer', '', '2025-07-10', 'dsf', '', '2025-07-10', 'dsfedf', '', '2025-07-10', 'dfsd', '', '2025-07-11', 'csdf', '', '2025-07-09', 'sdf', '', '2025-07-09', 'wewe', '', '2025-07-09', 'ds', '');
INSERT INTO `traceability_packing` VALUES('8', '2025-08-05', '04:50:00', '1', '2025-08-06', 'dsf', '', '2025-08-13', 'sd', '', '2025-08-20', 'sf', '', '2025-08-28', 'sdf', '', '2025-08-11', 'sdf', '', '2025-08-10', 'sf', '', '2025-08-11', 'fd', '', '2025-08-09', 'ewr', '', '2025-08-10', 'wer', '', '2025-08-10', 'wer', '', '2025-08-10', 'dsf', '', '2025-08-10', 'dsfedf', '', '2025-08-10', 'dfsd', '', '2025-08-11', 'csdf', '', '2025-08-09', 'sdf', '', '2025-08-09', 'wewe', '', '2025-08-09', 'ds', '');

-- Structure for table `user`
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_pass` varchar(10) NOT NULL,
  `u_type` varchar(10) NOT NULL,
  `u_loc` tinyint(1) NOT NULL,
  `u_status` tinyint(1) NOT NULL,
  `u_comment` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for table `user`
INSERT INTO `user` VALUES('1', 'abdullah', '123', 'admin', '5', '1', 'Nil');
INSERT INTO `user` VALUES('2', 'packing1', '12345', 'normal', '1', '1', 'Nil');
INSERT INTO `user` VALUES('3', 'hans2', '123', 'normal', '2', '1', 'Nil');
INSERT INTO `user` VALUES('4', 'hans3', '123', 'normal', '3', '1', 'Nil');
INSERT INTO `user` VALUES('7', 'supervisor', '123', 'supervisor', '4', '1', 'Nil');
INSERT INTO `user` VALUES('8', 'Packing_1', '123', 'normal', '1', '1', 'Dummy Paking User');
INSERT INTO `user` VALUES('9', 'admin', '123', 'admin', '4', '1', 'Nil');
INSERT INTO `user` VALUES('10', 'TEST1', '1231', 'admin', '3', '1', 'TEST1');
