<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-18 00:25:21 --> Query error: Unknown column 'financial_data_sale_price' in 'field list' - Invalid query: SELECT SQL_CALC_FOUND_ROWS financial_data_id, financial_data_user_id, financial_data_registered_sale_id, financial_data_sale_price, financial_data_tax, financial_data_half_off, financial_data_status
FROM `mt_financial_data`
WHERE `mt_financial_data`.`financial_data_status` != 2
ORDER BY 1 desc
 LIMIT 20
ERROR - 2021-05-18 00:03:40 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 128
ERROR - 2021-05-18 03:48:18 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\views\sale_report\index.php 33
ERROR - 2021-05-18 03:50:26 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\views\sale_report\index.php 33
ERROR - 2021-05-18 03:54:11 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\views\sale_report\index.php 33
ERROR - 2021-05-18 01:16:42 --> Severity: Warning --> Declaration of sale_report::index($report_name) should be compatible with MY_Controller_Admin::index() D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 24
ERROR - 2021-05-18 04:16:42 --> Severity: error --> Exception: Too few arguments to function sale_report::index(), 0 passed in D:\XAMMP\htdocs\divine_dev\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 13
ERROR - 2021-05-18 01:17:37 --> Severity: error --> Exception: syntax error, unexpected 'debug' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 16
ERROR - 2021-05-18 01:20:03 --> Severity: Warning --> Declaration of sale_report::index($user_type) should be compatible with MY_Controller_Admin::index() D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 24
ERROR - 2021-05-18 04:20:03 --> Severity: error --> Exception: Too few arguments to function sale_report::index(), 0 passed in D:\XAMMP\htdocs\divine_dev\system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 13
ERROR - 2021-05-18 01:39:00 --> Severity: error --> Exception: syntax error, unexpected '{', expecting '(' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 59
ERROR - 2021-05-18 04:46:45 --> Severity: error --> Exception: Call to a member function cosnignor_report() on null D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 21
ERROR - 2021-05-18 04:48:37 --> Query error: Unknown column 'signup_company' in 'field list' - Invalid query: SELECT `signup_id`, `signup_firstname`, `signup_lastname`, `signup_email`, `signup_static_password`, `signup_address`, `signup_city`, `signup_state`, `signup_zip`, `signup_phone`, `signup_name`, `signup_username`, `signup_country`, `signup_company`, `signup_business_name`, `signup_address2`, `created_on`
FROM `mt_signup`
WHERE `signup_type` IS NULL
ERROR - 2021-05-18 02:07:29 --> Severity: error --> Exception: syntax error, unexpected '{', expecting '(' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 62
ERROR - 2021-05-18 02:14:40 --> Severity: error --> Exception: syntax error, unexpected '$que12' (T_VARIABLE) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 28
ERROR - 2021-05-18 02:14:48 --> Severity: error --> Exception: syntax error, unexpected 'debug' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 32
ERROR - 2021-05-18 02:17:46 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting function (T_FUNCTION) or const (T_CONST) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 117
ERROR - 2021-05-18 02:18:52 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 52
ERROR - 2021-05-18 02:19:20 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 51
ERROR - 2021-05-18 02:19:22 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 51
ERROR - 2021-05-18 02:19:32 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 52
ERROR - 2021-05-18 02:19:35 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 53
ERROR - 2021-05-18 05:22:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '[0].registered_sale_user_id
     FROM mt_registered_sale' at line 1 - Invalid query: SELECT mt_registered_sale[0].registered_sale_user_id
     FROM mt_registered_sale
ERROR - 2021-05-18 02:38:19 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 120
ERROR - 2021-05-18 02:38:21 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 120
ERROR - 2021-05-18 02:39:01 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 106
ERROR - 2021-05-18 21:01:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'where mt_registered_sale.registered_sale_id = 1,
     FROM mt_registered_sale' at line 2 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id,mt_registered_sale.registered_sale_sale_title
     where mt_registered_sale.registered_sale_id = 1,
     FROM mt_registered_sale
ERROR - 2021-05-18 23:00:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE mt_registered_sale.registered_sale_volunteer_id > 0' at line 8 - Invalid query: SELECT mt_signup.signup_id, mt_sale.sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     INNER JOIN mt_sale
     ON mt_registered_sale.registered_sale_sale_id=mt_sale.sale_id
     INNER JOIN mt_signup
     ON mt_registered_sale.registered_sale_user_id=mt_signup.signup_id
     WHERE mt_registered_sale.registered_sale_sale_id=mt_sale.sale_id
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0
ERROR - 2021-05-18 23:10:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE mt_registered_sale.registered_sale_volunteer_id =' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0
     WHERE mt_registered_sale.registered_sale_volunteer_id = 
ERROR - 2021-05-18 23:11:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0
     OR mt_registered_sale.registered_sale_volunteer_id = 
ERROR - 2021-05-18 23:12:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0
     OR mt_registered_sale.registered_sale_sale_id = 
ERROR - 2021-05-18 23:14:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE (mt_registered_sale.registered_sale_volunteer_id > 0)
     AND (mt_registered_sale.registered_sale_sale_id = )
ERROR - 2021-05-18 23:15:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE (mt_registered_sale.registered_sale_volunteer_id > 0)
     AND (mt_registered_sale.registered_sale_sale_id = )
ERROR - 2021-05-18 23:15:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE (mt_registered_sale.registered_sale_volunteer_id > 0)
     AND (mt_registered_sale.registered_sale_sale_id = )
ERROR - 2021-05-18 23:19:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     -- WHERE mt_registered_sale.registered_sale_volunteer_id > 0
     WHERE mt_registered_sale.registered_sale_sale_id = 
ERROR - 2021-05-18 23:21:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 3 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE  registered_sale_sale_id =
ERROR - 2021-05-18 23:22:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 3 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE  registered_sale_sale_id =
ERROR - 2021-05-18 23:31:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 3 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_sale_id =  
ERROR - 2021-05-18 23:34:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE mt_registered_sale.registered_sale_sale_id = 3' at line 4 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0
     WHERE mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-18 23:34:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '
     WHERE mt_registered_sale.registered_sale_sale_id = 3' at line 3 - Invalid query: SELECT mt_registered_sale.registered_sale_user_id, mt_registered_sale.registered_sale_sale_title, mt_registered_sale.registered_sale_volunteer_shift_start_time,mt_registered_sale.registered_sale_volunteer_shift_end_time,mt_registered_sale.registered_sale_volunteer_shift_activity_desc
     FROM mt_registered_sale
     WHERE mt_registered_sale.registered_sale_volunteer_id > 0,
     WHERE mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-18 22:03:36 --> 404 Page Not Found: admin/Sale_report/index
ERROR - 2021-05-18 22:04:46 --> 404 Page Not Found: admin/Sale_report/index
ERROR - 2021-05-18 22:05:10 --> 404 Page Not Found: admin/Sale_report/index
ERROR - 2021-05-18 22:07:12 --> 404 Page Not Found: admin/Sale_report/index
ERROR - 2021-05-18 22:12:26 --> 404 Page Not Found: admin/Http:/localhost
ERROR - 2021-05-18 22:12:50 --> 404 Page Not Found: admin/Divine_dev/sale_report
ERROR - 2021-05-18 23:34:50 --> Severity: error --> Exception: syntax error, unexpected '=' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 100
ERROR - 2021-05-18 23:35:01 --> Severity: error --> Exception: syntax error, unexpected '=' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 100
ERROR - 2021-05-18 23:35:07 --> Severity: error --> Exception: syntax error, unexpected '=' D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 100
