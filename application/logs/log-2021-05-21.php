<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-21 00:06:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: Select SUM(sale_transaction_sale_price) from mt_sale_transaction Where sale_transaction_registered_sale_id=
ERROR - 2021-05-21 00:07:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: Select SUM(sale_transaction_sale_price) from mt_sale_transaction Where sale_transaction_registered_sale_id=
ERROR - 2021-05-21 00:14:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1 - Invalid query: Select SUM(sale_transaction_sale_price) from mt_sale_transaction Where sale_transaction_registered_sale_id=
ERROR - 2021-05-21 02:11:22 --> Severity: Warning --> Illegal string offset 'where' D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 287
ERROR - 2021-05-21 02:11:22 --> Severity: Warning --> Illegal string offset 'where' D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 292
ERROR - 2021-05-21 02:11:22 --> Severity: error --> Exception: Cannot use string offset as an array D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 292
ERROR - 2021-05-21 03:06:33 --> Query error: Not unique table/alias: 'mt_sale' - Invalid query: SELECT *
FROM `mt_sale`
JOIN `mt_sale` ON `mt_sale`.`sale_id` =  `mt_registered_sale`.`registered_sale_sale_id`
WHERE `mt_sale`.`sale_status` = 1
ERROR - 2021-05-21 03:22:36 --> Severity: error --> Exception: syntax error, unexpected '$data' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\views\admin\signup\detail.php 31
ERROR - 2021-05-21 03:22:51 --> Query error: Not unique table/alias: 'mt_registered_sale' - Invalid query: SELECT *
FROM `mt_sale`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_signup`.`signup_id`
WHERE `registered_sale_status` = 1
AND `mt_sale`.`sale_status` = 1
ERROR - 2021-05-21 03:23:10 --> Query error: Not unique table/alias: 'mt_registered_sale' - Invalid query: SELECT *
FROM `mt_sale`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signup`.`signup_id`
WHERE `registered_sale_status` = 1
AND `mt_sale`.`sale_status` = 1
ERROR - 2021-05-21 03:24:51 --> Severity: error --> Exception: syntax error, unexpected ';' D:\XAMMP\htdocs\divine_dev\application\views\admin\signup\detail.php 31
ERROR - 2021-05-21 03:52:38 --> Severity: error --> Exception: syntax error, unexpected '$params' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\views\admin\signup\detail.php 32
ERROR - 2021-05-21 03:52:46 --> Severity: error --> Exception: syntax error, unexpected '$sale_con' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\views\admin\signup\detail.php 33
ERROR - 2021-05-21 00:55:01 --> 404 Page Not Found: 404/index
ERROR - 2021-05-21 04:02:58 --> Severity: error --> Exception: syntax error, unexpected '$sale_con' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\views\admin\signup\detail.php 36
ERROR - 2021-05-21 04:20:07 --> Query error: Not unique table/alias: 'mt_sale' - Invalid query: SELECT *
FROM `mt_sale`
JOIN `mt_sale` ON `mt_sale`.`sale_id` = `mt_registered_sale`.`registered_sale_sale_id`
WHERE `registered_sale_status` = 1
AND `registered_sale_user_type` = 1
AND `mt_sale`.`sale_status` = 1
ERROR - 2021-05-21 04:20:39 --> Query error: Not unique table/alias: 'mt_registered_sale' - Invalid query: SELECT *
FROM `mt_registered_sale`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
WHERE `registered_sale_status` = 1
AND `registered_sale_user_type` = 1
AND `mt_registered_sale`.`registered_sale_status` = 1
ERROR - 2021-05-21 04:23:25 --> Query error: Not unique table/alias: 'mt_registered_sale' - Invalid query: SELECT *
FROM `mt_registered_sale`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
WHERE `registered_sale_id` = 51
AND `mt_registered_sale`.`registered_sale_status` = 1
ERROR - 2021-05-21 04:24:07 --> Query error: Not unique table/alias: 'mt_registered_sale' - Invalid query: SELECT *
FROM `mt_registered_sale`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
WHERE `registered_sale_id` = 51
AND `mt_registered_sale`.`registered_sale_status` = 1
ERROR - 2021-05-21 01:51:08 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) or const (T_CONST) D:\XAMMP\htdocs\divine_dev\application\controllers\admin\Signup.php 202
ERROR - 2021-05-21 04:52:14 --> Severity: error --> Exception: Call to a member function get_rules() on null D:\XAMMP\htdocs\divine_dev\application\core\MY_Controller.php 536
ERROR - 2021-05-21 01:52:29 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) or const (T_CONST) D:\XAMMP\htdocs\divine_dev\application\controllers\admin\Signup.php 205
ERROR - 2021-05-21 05:06:11 --> Severity: Warning --> Illegal string offset 'where' D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 287
ERROR - 2021-05-21 05:06:11 --> Severity: Warning --> Illegal string offset 'where' D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 292
ERROR - 2021-05-21 05:06:11 --> Severity: error --> Exception: Cannot use string offset as an array D:\XAMMP\htdocs\divine_dev\application\core\MY_Model.php 292
ERROR - 2021-05-21 05:09:46 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT *
FROM `mt_financial_data`
WHERE `financial_data_id` = Array
 LIMIT 1
ERROR - 2021-05-21 05:44:42 --> Query error: Unknown column 'mt_financial_data_id.financial_data_user_id' in 'on clause' - Invalid query: SELECT *
FROM `mt_financial_data`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_id` = `mt_financial_data_id`.`financial_data_user_id`
WHERE `financial_data_user_id` = '989'
AND `mt_financial_data`.`financial_data_status` = 1
ERROR - 2021-05-21 05:44:56 --> Query error: Unknown column 'mt_financial_data_id.financial_data_user_id' in 'on clause' - Invalid query: SELECT *
FROM `mt_financial_data`
JOIN `mt_registered_sale` ON `mt_registered_sale`.`registered_sale_id` = `mt_financial_data_id`.`financial_data_user_id`
WHERE `financial_data_user_id` = '989'
AND `mt_financial_data`.`financial_data_status` = 1
ERROR - 2021-05-21 17:54:01 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ')' D:\XAMMP\htdocs\divine_dev\application\controllers\admin\Signup.php 176
ERROR - 2021-05-21 21:13:22 --> Query error: Unknown column 'registered_sale_user_id' in 'where clause' - Invalid query: SELECT *
FROM `mt_financial_data`
WHERE `registered_sale_user_id` = '989'
AND `registered_sale_user_type` = 1
AND `registered_sale_volunteer_id` = 0
AND `financial_data_user_id` = '989'
AND `financial_data_user_type` = 1
AND `mt_financial_data`.`financial_data_status` = 1
ERROR - 2021-05-21 21:13:47 --> Query error: Unknown column 'registered_sale_user_id' in 'where clause' - Invalid query: SELECT *
FROM `mt_financial_data`
WHERE `registered_sale_user_id` = '989'
AND `registered_sale_user_type` = 1
AND `registered_sale_volunteer_id` = 0
AND `financial_data_user_id` = '989'
AND `mt_financial_data`.`financial_data_status` = 1
ERROR - 2021-05-21 21:19:15 --> Severity: error --> Exception: Too few arguments to function Signup::update_financial(), 0 passed in D:\XAMMP\htdocs\divine_dev\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\controllers\admin\Signup.php 164
ERROR - 2021-05-21 21:21:17 --> Severity: error --> Exception: Too few arguments to function Signup::update_financial(), 0 passed in D:\XAMMP\htdocs\divine_dev\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\controllers\admin\Signup.php 164
ERROR - 2021-05-21 23:41:47 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT *
FROM `mt_financial_data`
WHERE `financial_data_id` = Array
 LIMIT 1
