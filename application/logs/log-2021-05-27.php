<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-27 00:00:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1) as' at line 1 - Invalid query: substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1) as val1,substring_index ( substring_index ( mt_financial_data.value,',',2 ), ',', -1) as val2,substring_index ( substring_index ( mt_financial_data.value,',',3 ), ',', -1) as val3,substring_index ( substring_index ( mt_financial_data.value,',',4 ), ',', -1) as val4
ERROR - 2021-05-27 00:04:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '}
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHER' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner, {$date_cols}
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value,GROUP_CONCAT(financial_data_createdon ORDER BY financial_data_createdon) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 00:12:07 --> Query error: Incorrect parameters in the call to native function 'CONCAT' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner), CONCAT('$',substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1) as val1,substring_index ( substring_index ( mt_financial_data.value,',',2 ), ',', -1) as val2,substring_index ( substring_index ( mt_financial_data.value,',',3 ), ',', -1) as val3)
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value,GROUP_CONCAT(financial_data_createdon ORDER BY financial_data_createdon) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 01:59:46 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1 ), ',','-0',-1) as val1,substring_index (substring_index (mt_financial_data.value,',',2 ), ',','-0',-1) as val2,substring_index (substring_index (mt_financial_data.value,',',3 ), ',','-0',-1) as val3,substring_index (substring_index (mt_financial_data.value,',',4 ), ',','-0',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 01:59:55 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1 ), ',','0',-1) as val1,substring_index (substring_index (mt_financial_data.value,',',2 ), ',','0',-1) as val2,substring_index (substring_index (mt_financial_data.value,',',3 ), ',','0',-1) as val3,substring_index (substring_index (mt_financial_data.value,',',4 ), ',','0',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:00:02 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1 ), ',',0,-1) as val1,substring_index (substring_index (mt_financial_data.value,',',2 ), ',',0,-1) as val2,substring_index (substring_index (mt_financial_data.value,',',3 ), ',',0,-1) as val3,substring_index (substring_index (mt_financial_data.value,',',4 ), ',',0,-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:01:47 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1 ), ',',-1,1) as val1,substring_index (substring_index (mt_financial_data.value,',',2 ), ',',-1,1) as val2,substring_index (substring_index (mt_financial_data.value,',',3 ), ',',-1,1) as val3,substring_index (substring_index (mt_financial_data.value,',',4 ), ',',-1,1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:02:59 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1,1 ), ',',-1) as val1,substring_index (substring_index (mt_financial_data.value,',',1,2 ), ',',-1) as val2,substring_index (substring_index (mt_financial_data.value,',',1,3 ), ',',-1) as val3,substring_index (substring_index (mt_financial_data.value,',',1,4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:03:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(substring_index (mt_financial_data.value,',',2 ), ',',-1) as valsubstring_index' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index (mt_financial_data.value,',',1 ), ',',-1) as valsubstring_index (substring_index (mt_financial_data.value,',',2 ), ',',-1) as valsubstring_index (substring_index (mt_financial_data.value,',',3 ), ',',-1) as valsubstring_index (substring_index (mt_financial_data.value,',',4 ), ',',-1) as val
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:49:13 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',','
',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',','
',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',','
',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',','
',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:49:26 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',','
',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',','
',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',','
',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',','
',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 02:54:10 --> Severity: Error --> Out of memory (allocated 503316480) (tried to allocate 499122232 bytes) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 94
ERROR - 2021-05-27 03:16:31 --> Query error: Unknown column 'mt_financial_data' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:17:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,','1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,','2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,','3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,','4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:38:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'financial_data_createdon')) as value
  FROM mt_financial_data 
  WHERE (finan' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout == 'financial_data_createdon')) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:38:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= financial_data_createdon)) as value
  FROM mt_financial_data 
  WHERE (financi' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout == financial_data_createdon)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:38:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= financial_data_createdon)) as value
  FROM mt_financial_data 
  WHERE (financi' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout == financial_data_createdon)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:39:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout = substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:41:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout = substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:42:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1' at line 22 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  AND financial_data_consignor_payout = substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:43:02 --> Query error: Unknown column 'mt_financial_data.value' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value,substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:01 --> Query error: Incorrect parameters in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1 '-2') as val1,substring_index(mt_financial_data.value,',',2 '-2') as val2,substring_index(mt_financial_data.value,',',3 '-2') as val3,substring_index(mt_financial_data.value,',',4 '-2') as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:14 --> Query error: Incorrect parameters in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1 '2') as val1,substring_index(mt_financial_data.value,',',2 '2') as val2,substring_index(mt_financial_data.value,',',3 '2') as val3,substring_index(mt_financial_data.value,',',4 '2') as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:18 --> Query error: Incorrect parameters in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1 '1') as val1,substring_index(mt_financial_data.value,',',2 '1') as val2,substring_index(mt_financial_data.value,',',3 '1') as val3,substring_index(mt_financial_data.value,',',4 '1') as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:28 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1 ,-2) as val1,substring_index(mt_financial_data.value,',',2 ,-2) as val2,substring_index(mt_financial_data.value,',',3 ,-2) as val3,substring_index(mt_financial_data.value,',',4 ,-2) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:31 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1 ,2) as val1,substring_index(mt_financial_data.value,',',2 ,2) as val2,substring_index(mt_financial_data.value,',',3 ,2) as val3,substring_index(mt_financial_data.value,',',4 ,2) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 03:54:41 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index(mt_financial_data.value,',',1,'2') as val1,substring_index(mt_financial_data.value,',',2,'2') as val2,substring_index(mt_financial_data.value,',',3,'2') as val3,substring_index(mt_financial_data.value,',',4,'2') as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 04:38:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = 5/22/2021
        
ERROR - 2021-05-27 04:40:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        mt_financial_data.financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        mt_financial_data.financial_data_user_id = 
        AND
        mt_financial_data.financial_data_createdon = 5/22/2021
        
ERROR - 2021-05-27 04:41:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
      financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
      FROM
      mt_financial_data
      WHERE
      financial_data_user_id = 
      AND
      financial_data_createdon = 5/22/2021
      
ERROR - 2021-05-27 04:41:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 
        AND
        financial_data_createdon == 5/22/2021' at line 6 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id == 
        AND
        financial_data_createdon == 5/22/2021
        
ERROR - 2021-05-27 04:44:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = 5/22/2021
        
ERROR - 2021-05-27 04:46:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = '5/22/2021'' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = '5/22/2021'
        
ERROR - 2021-05-27 04:48:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = '5/22/2021'' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = '5/22/2021'
        
ERROR - 2021-05-27 04:49:07 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = Array
        AND
        financial_data_createdon = '5/22/2021'
        
ERROR - 2021-05-27 04:51:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND financial_data_createdon = '5/22/2021'' at line 1 - Invalid query: SELECT * FROM mt_financial_data WHERE financial_data_user_id =  AND financial_data_createdon = '5/22/2021' 
ERROR - 2021-05-27 04:53:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = 5/22/2021
        
ERROR - 2021-05-27 04:54:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')}
        AND
        financial_data_createdon = {echo(5/22/2021)}' at line 6 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = {echo()}
        AND
        financial_data_createdon = {echo(5/22/2021)}
        
ERROR - 2021-05-27 01:55:33 --> Severity: error --> Exception: syntax error, unexpected '<' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 01:55:42 --> Severity: error --> Exception: syntax error, unexpected '?' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 01:56:12 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 01:56:26 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 04:56:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'AND
        financial_data_createdon = 5/22/2021' at line 7 - Invalid query: SELECT
        *
        FROM
        mt_financial_data
        WHERE
        financial_data_user_id = 
        AND
        financial_data_createdon = 5/22/2021;
        
ERROR - 2021-05-27 01:57:47 --> Severity: error --> Exception: syntax error, unexpected 'fputcsv' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 155
ERROR - 2021-05-27 01:57:48 --> Severity: error --> Exception: syntax error, unexpected 'fputcsv' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 155
ERROR - 2021-05-27 01:57:49 --> Severity: error --> Exception: syntax error, unexpected 'fputcsv' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 155
ERROR - 2021-05-27 02:02:09 --> Severity: error --> Exception: syntax error, unexpected ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 170
ERROR - 2021-05-27 02:06:39 --> Severity: error --> Exception: syntax error, unexpected '{', expecting ']' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 02:06:46 --> Severity: error --> Exception: syntax error, unexpected '{', expecting ']' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 05:08:41 --> Severity: Warning --> Use of undefined constant val - assumed 'val' (this will throw an Error in a future version of PHP) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 02:10:00 --> Severity: error --> Exception: syntax error, unexpected ']', expecting :: (T_PAAMAYIM_NEKUDOTAYIM) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 158
ERROR - 2021-05-27 05:19:05 --> Severity: Warning --> fputcsv() expects parameter 3 to be string, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 151
ERROR - 2021-05-27 05:19:05 --> Severity: Warning --> fputcsv() expects parameter 3 to be string, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 151
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:21:57 --> Severity: Warning --> fputcsv() expects at least 2 parameters, 1 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 05:22:24 --> Severity: Warning --> fputcsv() expects parameter 1 to be resource, array given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 162
ERROR - 2021-05-27 18:35:07 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) or const (T_CONST) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 156
ERROR - 2021-05-27 21:46:59 --> Query error: Unknown column 'mt_financial_data.financial_data_consignor_payout' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 21:47:07 --> Query error: Unknown column 'financial_data_consignor_payout' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(financial_data_consignor_payout,',',1 ), ',',-1) as val1,substring_index (substring_index(financial_data_consignor_payout,',',2 ), ',',-1) as val2,substring_index (substring_index(financial_data_consignor_payout,',',3 ), ',',-1) as val3,substring_index (substring_index(financial_data_consignor_payout,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 21:47:13 --> Query error: Unknown column 'financial_data_consignor_payout' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(financial_data_consignor_payout,',',1 ), ',',-1) as val1,substring_index (substring_index(financial_data_consignor_payout,',',2 ), ',',-1) as val2,substring_index (substring_index(financial_data_consignor_payout,',',3 ), ',',-1) as val3,substring_index (substring_index(financial_data_consignor_payout,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) 
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 21:47:24 --> Query error: Unknown column 'mt_financial_data.financial_data_consignor_payout' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.financial_data_consignor_payout,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) 
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 21:56:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '<> 0
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM m' at line 2 - Invalid query: SELECT
    count(t.dd) as total_dates <> 0
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-27 21:56:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:01:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:01:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:01:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:01:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:02:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:02:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:02:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:03:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC)
  ) AS t' at line 8 - Invalid query: SELECT
    count(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
    ORDER BY (financial_data_createdon DESC)
  ) AS t
ERROR - 2021-05-27 22:04:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'DESC)
  ) AS t' at line 8 - Invalid query: SELECT
    count(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
    ORDER BY (financial_data_consignor_payout DESC)
  ) AS t
ERROR - 2021-05-27 22:04:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ASCE)
  ) AS t' at line 8 - Invalid query: SELECT
    count(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
    ORDER BY (financial_data_consignor_payout ASCE)
  ) AS t
ERROR - 2021-05-27 19:05:14 --> Severity: error --> Exception: syntax error, unexpected 'financial_data_consignor_payou' (T_STRING), expecting ',' or ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 91
ERROR - 2021-05-27 19:05:31 --> Severity: error --> Exception: syntax error, unexpected 'asc' (T_STRING), expecting ',' or ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 91
ERROR - 2021-05-27 22:05:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'asc)
  ) AS t' at line 8 - Invalid query: SELECT
    count(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
    ORDER BY (financial_data_consignor_payout, asc)
  ) AS t
ERROR - 2021-05-27 22:24:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(CONCAT(financial_data_consignor_payout, '=',IFNULL(financial_data_consignor_payout, 'NULL'))) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:25:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(IFNULL(financial_data_consignor_payout, '=' 'NULL')) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:25:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(IFNULL(financial_data_consignor_payout, '=' 'NULL')) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:25:50 --> Query error: Incorrect parameter count in the call to native function 'IFNULL' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',IFNULL(GROUP_CONCAT(financial_data_consignor_payout, '=' 'NULL')) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:26:00 --> Query error: Incorrect parameter count in the call to native function 'IFNULL' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',IFNULL(GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:26:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',(GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:26:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) ' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:26:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) ' at line 19 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:33:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:42:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1)  as val1, substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) as val2
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:43:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1)  as val1, substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) as val2
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:43:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1)  as val1,substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) as val2
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:46:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1)  as val1, substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) as val2
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:46:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',1 ), ',', -1)  as val1, substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) as val2
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:48:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '), ',', -1)  as val1 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_reg' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',), ',', -1)  as val1 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:48:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '), ',', -1)  as val1 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_reg' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index ( substring_index ( mt_financial_data.value,',',), ',', -1)  as val1 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:49:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:49:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:49:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY' at line 20 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:54:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:54:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:54:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:55:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val4,
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:57:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(substring_index(mt_financial_data.value,',',2 ), ',',-1) as valsubstring_index ' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as valsubstring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as valsubstring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as valsubstring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 19:57:47 --> Severity: error --> Exception: syntax error, unexpected '","' (T_CONSTANT_ENCAPSED_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 94
ERROR - 2021-05-27 19:58:04 --> Severity: error --> Exception: syntax error, unexpected '""' (T_CONSTANT_ENCAPSED_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 94
ERROR - 2021-05-27 19:58:11 --> Severity: error --> Exception: syntax error, unexpected '""' (T_CONSTANT_ENCAPSED_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 94
ERROR - 2021-05-27 23:10:37 --> Query error: Unknown column 'mt_financial_data.dd' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.dd,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.dd,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.dd,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.dd,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 23:10:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.,','' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.,',',1 ), ',',-1) as val1,substring_index (substring_index(mt_financial_data.,',',2 ), ',',-1) as val2,substring_index (substring_index(mt_financial_data.,',',3 ), ',',-1) as val3,substring_index (substring_index(mt_financial_data.,',',4 ), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 20:12:41 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 97
ERROR - 2021-05-27 20:13:15 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ',' or ';' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 102
ERROR - 2021-05-27 20:14:25 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 154
ERROR - 2021-05-27 20:15:29 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 149
ERROR - 2021-05-27 23:22:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,',',1 ), ',',-1) as val substring_index (substring_index(mt_financial_data.value,',',2 ), ',',-1) as val substring_index (substring_index(mt_financial_data.value,',',3 ), ',',-1) as val substring_index (substring_index(mt_financial_data.value,',',4 ), ',',-1) as val 
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 23:24:07 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),substring_index (substring_index(mt_financial_data.value,','), ',',-1) as val1,substring_index (substring_index(mt_financial_data.value,','), ',',-1) as val2,substring_index (substring_index(mt_financial_data.value,','), ',',-1) as val3,substring_index (substring_index(mt_financial_data.value,','), ',',-1) as val4
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (registered_sale_status = 1) 
  AND (registered_sale_user_type = 1)
  GROUP BY registered_sale_user_id 
  ) as  mt_registered_sale
  inner join
  (
  SELECT *
  FROM mt_signup
  ) as mt_signup
  on mt_signup.signup_id = mt_registered_sale.registered_sale_user_id
  inner join
  (
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
ERROR - 2021-05-27 22:08:37 --> Severity: error --> Exception: syntax error, unexpected '}' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 108
ERROR - 2021-05-27 23:14:32 --> Severity: error --> Exception: syntax error, unexpected '0' (T_LNUMBER) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 107
ERROR - 2021-05-27 23:56:55 --> Severity: error --> Exception: syntax error, unexpected '%' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:57:10 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:57:11 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:57:46 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:57:48 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:58:06 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
ERROR - 2021-05-27 23:58:16 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 106
