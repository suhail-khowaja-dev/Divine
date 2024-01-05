<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-28 21:35:07 --> Severity: Warning --> Invalid argument supplied for foreach() D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php 340
ERROR - 2021-04-28 21:40:01 --> Severity: error --> Exception: Too few arguments to function Model_sale::getexportsaleconsignor(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php on line 322 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 103
ERROR - 2021-04-28 21:42:07 --> Severity: error --> Exception: Too few arguments to function Model_sale::getexportsaleconsignor(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php on line 322 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 103
ERROR - 2021-04-28 21:42:20 --> Severity: error --> Exception: Too few arguments to function Model_sale::getexportsaleconsignor(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php on line 322 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 103
ERROR - 2021-04-28 21:44:21 --> Severity: error --> Exception: Too few arguments to function Model_sale::getexportsaleconsignor(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php on line 322 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 103
ERROR - 2021-04-28 18:47:36 --> Severity: error --> Exception: syntax error, unexpected '$sale_id' (T_VARIABLE), expecting ',' or ')' D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 110
ERROR - 2021-04-28 18:47:45 --> Severity: error --> Exception: syntax error, unexpected '$sale_id' (T_VARIABLE), expecting ',' or ')' D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 110
ERROR - 2021-04-28 21:48:07 --> Severity: error --> Exception: Too few arguments to function Model_sale::getexportsaleconsignor(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Contact_us.php on line 322 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 103
ERROR - 2021-04-28 19:00:52 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 110
ERROR - 2021-04-28 22:12:07 --> Query error: Unknown column 'mt_registered_sale' in 'field list' - Invalid query: SELECT `mt_registered_sale`, `mt_sale`.`sale_location`, `mt_sale`.`sale_street`, `mt_sale`.`sale_city`, `mt_sale`.`sale_state`, `mt_sale`.`sale_zip`, `mt_sale`.`sale_start_date`, `mt_sale`.`sale_end_date`
FROM `mt_registered_sale`
JOIN `mt_signup` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signup`.`signup_id`
JOIN `mt_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
WHERE `mt_registered_sale`.`registered_sale_status` = 1
AND `mt_signup`.`signup_type` = 1
ERROR - 2021-04-28 22:13:38 --> Query error: Not unique table/alias: 'mt_sale' - Invalid query: SELECT `mt_sale`.`sale_location`, `mt_sale`.`sale_street`, `mt_sale`.`sale_city`, `mt_sale`.`sale_state`, `mt_sale`.`sale_zip`, `mt_sale`.`sale_start_date`, `mt_sale`.`sale_end_date`
FROM `mt_sale`
JOIN `mt_signup` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signup`.`signup_id`
JOIN `mt_sale` ON `mt_registered_sale`.`registered_sale_sale_id` = `mt_sale`.`sale_id`
WHERE `mt_registered_sale`.`registered_sale_status` = 1
AND `mt_signup`.`signup_type` = 1
ERROR - 2021-04-28 19:15:26 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 112
ERROR - 2021-04-28 22:36:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
JOIN `mt_signup` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signu' at line 3 - Invalid query: SELECT `mt_sale`.`sale_location`
FROM `mt_registered_sale`
JOIN `mt_sale` USING ()
JOIN `mt_signup` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signup`.`signup_id`
WHERE `mt_registered_sale`.`registered_sale_status` = 1
AND `mt_signup`.`signup_type` = 1
ERROR - 2021-04-28 19:41:19 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 111
ERROR - 2021-04-28 19:41:24 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 111
ERROR - 2021-04-28 19:41:25 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 111
ERROR - 2021-04-28 22:54:44 --> Query error: Unknown column 'mt_signup.signup_signup_id' in 'field list' - Invalid query: SELECT `mt_sale`.`sale_location`, `mt_sale`.`sale_street`, `mt_sale`.`sale_city`, `mt_sale`.`sale_state`, `mt_sale`.`sale_zip`, `mt_sale`.`sale_start_date`, `mt_sale`.`sale_end_date`, `mt_signup`.`signup_signup_id`, `mt_signup`.`signup_firstname`, `mt_signup`.`signup_lastname`, `mt_signup`.`signup_email`, `mt_signup`.`signup_address`, `mt_signup`.`signup_city`, `mt_signup`.`signup_state`, `mt_signup`.`signup_zip`, `mt_signup`.`signup_phone`
FROM `mt_registered_sale`
JOIN `mt_sale` ON `mt_sale`.`sale_id` = `mt_registered_sale`.`registered_sale_sale_id`
JOIN `mt_signup` ON `mt_registered_sale`.`registered_sale_user_id` = `mt_signup`.`signup_id`
WHERE `mt_registered_sale`.`registered_sale_sale_id` = '5'
AND `mt_registered_sale`.`registered_sale_status` = 1
AND `mt_signup`.`signup_type` = 1
GROUP BY `mt_registered_sale`.`registered_sale_user_id`
ERROR - 2021-04-28 23:04:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND volunteer_shift_id NOT IN ()' at line 1 - Invalid query: SELECT  * FROM mt_volunteer_shift WHERE  volunteer_shift_sale_id = AND volunteer_shift_id NOT IN ()
ERROR - 2021-04-28 20:37:22 --> Severity: error --> Exception: syntax error, unexpected '$query' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 129
ERROR - 2021-04-28 23:49:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND volunteer_shift_id NOT IN ()' at line 1 - Invalid query: SELECT  * FROM mt_volunteer_shift WHERE  volunteer_shift_sale_id = AND volunteer_shift_id NOT IN ()
ERROR - 2021-04-28 21:14:54 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:23:28 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:25:55 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:26:34 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:27:56 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:28:20 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:34:09 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:37:59 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:57:33 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:57:33 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 21:57:33 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 22:54:45 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 23:07:18 --> 404 Page Not Found: Assets/global
ERROR - 2021-04-28 23:09:32 --> 404 Page Not Found: Assets/global
