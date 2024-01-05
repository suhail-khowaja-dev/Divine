<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-23 02:08:56 --> Severity: error --> Exception: Too few arguments to function Model_sale_transaction::export_sale_summary(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php on line 157 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale_transaction.php 28
ERROR - 2021-05-23 02:09:15 --> Severity: error --> Exception: Too few arguments to function Model_sale_transaction::export_sale_summary(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php on line 157 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale_transaction.php 28
ERROR - 2021-05-23 02:09:25 --> Severity: error --> Exception: Too few arguments to function Model_sale_transaction::export_sale_summary(), 0 passed in D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php on line 157 and exactly 1 expected D:\XAMMP\htdocs\divine_dev\application\models\Model_sale_transaction.php 28
ERROR - 2021-05-23 02:45:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'COUNT(*) as Item
  FROM mt_registered_sale
  INNER JOIN mt_financial_data
  ON  ' at line 7 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_idSELECT COUNT(*) as Item
  FROM mt_registered_sale
  INNER JOIN mt_financial_data
  ON  mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
  AND mt_financial_data.financial_data_consignor_payout > 0 
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:47:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_s' at line 7 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_idSELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Paid_Consignors
  FROM mt_registered_sale
  INNER JOIN mt_financial_data
  ON  mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
  AND mt_financial_data.financial_data_consignor_payout > 0 
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:51:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sa' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
  WHERE mt_financial_data.financial_data_registered_sale_id=mt_registered_sale.registered_sale_id
  AND mt_financial_data.financial_data_consignor_payout > 0
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:52:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sa' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
  WHERE mt_financial_data.financial_data_registered_sale_id=mt_registered_sale.registered_sale_id
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:52:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sa' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:52:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sa' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_registered_sale_id = mt_registered_sale.registered_sale_id
ERROR - 2021-05-23 02:54:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_regis' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_registered_sale.registered_sale_id
  WHERE mt_financial_data.financial_data_registered_sale_id=mt_registered_sale.registered_sale_id
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:54:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_regis' at line 8 - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id 
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_registered_sale.registered_sale_id
  WHERE mt_financial_data.financial_data_registered_sale_id=mt_registered_sale.registered_sale_id
  GROUP BY mt_financial_data.financial_data_consignor_payout
ERROR - 2021-05-23 02:55:45 --> Query error: Unknown column 'mt_financial_data.financial_data_consignor_payout' in 'having clause' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_registered_sale.registered_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id
  Having mt_financial_data.financial_data_consignor_payout > 0
ERROR - 2021-05-23 02:56:00 --> Query error: Unknown column 'mt_financial_data.financial_data_consignor_payout' in 'having clause' - Invalid query: SELECT mt_registered_sale.registered_sale_sale_id, mt_registered_sale.registered_sale_sale_location,mt_registered_sale.registered_sale_sale_state,mt_registered_sale.registered_sale_sale_start_date,COUNT(*) as Total,COUNT(*) as item
  FROM mt_registered_sale
  INNER JOIN mt_sale
  ON mt_sale.sale_id = mt_registered_sale.registered_sale_sale_id
  INNER JOIN mt_financial_data
  ON mt_financial_data.financial_data_id = mt_registered_sale.registered_sale_id
  WHERE mt_registered_sale.registered_sale_status = 1
  AND mt_registered_sale.registered_sale_user_type = 1
  GROUP BY mt_registered_sale.registered_sale_sale_id
  Having mt_financial_data.financial_data_consignor_payout
