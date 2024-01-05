<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-19 03:47:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.,mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered' at line 1 - Invalid query: SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_lastname,mt_signup.signup_email,mt_signup.signup_address,mt_signup.signup_city,mt_signup.signup_state,mt_signup.signup_zip,mt_signup.signup_phone,.,.,mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_id
 FROM mt_registered_sale
 INNER JOIN mt_signup
 ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
 WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-19 04:18:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'BY mt_registered_sale.registered_sale_dropoff_id' at line 7 - Invalid query: SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_lastname, COUNT(*)
 FROM mt_registered_sale
 INNER JOIN mt_signup
 ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
 WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_sale_id = 3GROUP BY mt_registered_sale.registered_sale_dropoff_id
ERROR - 2021-05-19 04:19:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sal' at line 6 - Invalid query: SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_lastname, COUNT(*)
 FROM mt_registered_sale
 INNER JOIN mt_signup
 ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
 GROUP BY mt_registered_sale.registered_sale_dropoff_id
 WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-19 01:22:08 --> Severity: error --> Exception: syntax error, unexpected 'GROUP' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 96
ERROR - 2021-05-19 04:22:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_signup
 ON mt_signup.signup_id = mt_registered_sale.registered_sal' at line 4 - Invalid query: SELECT mt_signup.signup_id, mt_signup.signup_firstname, mt_signup.signup_lastname, COUNT(*)
 FROM mt_registered_sale
 GROUP BY mt_registered_sale.registered_sale_dropoff_id
 INNER JOIN mt_signup
 ON mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
 WHERE mt_registered_sale.registered_sale_volunteer_id > 0
 AND mt_registered_sale.registered_sale_status = 1
 AND mt_registered_sale.registered_sale_sale_id = 3
ERROR - 2021-05-19 19:11:46 --> Severity: error --> Exception: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting '-' or identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 146
ERROR - 2021-05-19 19:37:45 --> Severity: error --> Exception: syntax error, unexpected 'Group' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 146
ERROR - 2021-05-19 19:38:07 --> Severity: error --> Exception: syntax error, unexpected 'Group' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\sale_report.php 146
ERROR - 2021-05-19 23:06:29 --> Query error: Unknown column 'mt_sale.sale_status' in 'where clause' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,COUNT(*) as Total,mt_registered_sale.registered_sale_sale_start_date
 FROM mt_sale_transaction
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_id = mt_sale_transaction.sale_transaction_registered_sale_id
 WHERE mt_sale.sale_status = 1
 GROUP BY mt_sale_transaction.sale_transaction_registered_sale_id 
ERROR - 2021-05-19 23:06:34 --> Query error: Unknown column 'mt_sale.sale_status' in 'where clause' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,COUNT(*) as Total,mt_registered_sale.registered_sale_sale_start_date
 FROM mt_sale_transaction
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_id = mt_sale_transaction.sale_transaction_registered_sale_id
 WHERE mt_sale.sale_status = 1
 GROUP BY mt_sale_transaction.sale_transaction_registered_sale_id 
ERROR - 2021-05-19 23:06:55 --> Query error: Unknown column 'mt_sale.sale_status' in 'where clause' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,COUNT( mt_sale_transaction.sale_transaction_registered_sale_id) as Total,mt_registered_sale.registered_sale_sale_start_date
 FROM mt_sale_transaction
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_id = mt_sale_transaction.sale_transaction_registered_sale_id
 WHERE mt_sale.sale_status = 1
 GROUP BY mt_sale_transaction.sale_transaction_registered_sale_id 
ERROR - 2021-05-19 23:13:22 --> Query error: Unknown column 'mt_registered_sale.sale_transaction_registered_sale_id' in 'group statement' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,COUNT(*) as Total,mt_registered_sale.registered_sale_sale_start_date
 FROM mt_sale_transaction
 INNER JOIN mt_registered_sale
 ON mt_registered_sale.registered_sale_id = mt_sale_transaction.sale_transaction_registered_sale_id
 WHERE mt_registered_sale.registered_sale_status = 1
 GROUP BY mt_registered_sale.sale_transaction_registered_sale_id 
