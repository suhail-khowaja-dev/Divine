<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-28 01:08:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:10:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:12:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(financial_data_createdon, ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:12:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
ERROR - 2021-05-28 01:13:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:13:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value, GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:13:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL'  ORDER BY financial_data_user_id)) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:17:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:17:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:21:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,CONCAT('$',mt_financial_data.consigner),SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,SUM(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,CONCAT('$',GROUP_CONCAT(financial_data_consignor_payout)) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as `date`
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id 
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:31:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 6 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,
  sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
  ELSE ''
  END) AS val1,
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:33:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:33:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:33:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:33:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:36:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 01:36:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,mt_financial_data.consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:04:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner),sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:06:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.v' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner),'.sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4.'

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:09:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner),sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) AS val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) AS val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) AS val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) AS val5

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(IFNULL(financial_data_consignor_payout, 'NULL') ORDER BY financial_data_user_id) as value,GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:53:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ';
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( sub' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1);
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1);
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1);
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1);
    ELSE NULL
    END) as val4

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:54:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financ' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 
    END) as val4

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:56:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:56:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = '5/22/2021' THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) AS val1

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 02:58:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '".$i.",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,",",1), ",", -1),"%c/%d/%Y") = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,",",".$i."), ",", -1)
    ELSE NULL
    END) as val".$i.",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,",",2), ",", -1),"%c/%d/%Y") = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,",",".$i."), ",", -1)
    ELSE NULL
    END) as val".$i.",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,",",3), ",", -1),"%c/%d/%Y") = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,",",".$i."), ",", -1)
    ELSE NULL
    END) as val".$i.",sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,",",4), ",", -1),"%c/%d/%Y") = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,",",".$i."), ",", -1)
    ELSE NULL
    END) as val".$i."

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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' )ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id
ERROR - 2021-05-28 03:02:00 --> Severity: error --> Exception: Call to a member function num_rows() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 89
ERROR - 2021-05-28 03:02:33 --> Severity: error --> Exception: Call to a member function num_rows() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 88
ERROR - 2021-05-28 03:08:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:08:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:08:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:09:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:09:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:10:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:12:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:12:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:15:36 --> Severity: Error --> Out of memory (allocated 507510784) (tried to allocate 503316696 bytes) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 03:15:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:15:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE NULL
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:16:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE NULL
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE NULL
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE NULL
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE NULL
    END) as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE NULL
    END) as val5
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:16:03 --> Severity: Error --> Out of memory (allocated 505413632) (tried to allocate 501219496 bytes) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 03:24:03 --> Severity: Error --> Out of memory (allocated 505413632) (tried to allocate 501219416 bytes) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 03:24:28 --> Severity: Error --> Out of memory (allocated 505413632) (tried to allocate 501219416 bytes) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 03:24:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:29:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:29:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:29:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1' at line 8 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:29:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:29:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:31:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',0), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',0), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',0), ',', -1)
    ELSE 0
    END) as val0,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:32:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financia' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4) as data
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:32:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financia' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4) 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:32:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financia' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END) as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END) as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END) as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END) as val4) as data
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:37:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
    ELSE 0
    END as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substri' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1))
    ELSE 0
    END as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1))
    ELSE 0
    END as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1))
    ELSE 0
    END as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1))
    ELSE 0
    END as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financia' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
    END as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (m' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0)
    END as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0)
    END as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0)
    END as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0)
    END as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4,)
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4,)
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4,)
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4,)
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 03:38:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financi' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0
    END as val1,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0
    END as val2,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0
    END as val3,)sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0
    END as val4,)
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 00:38:32 --> Severity: error --> Exception: syntax error, unexpected ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 00:38:39 --> Severity: error --> Exception: syntax error, unexpected ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 00:38:41 --> Severity: error --> Exception: syntax error, unexpected ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 04:07:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:07:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0  
    END )as val1,sum( DATE_FORMAT(substring_index ( substring_index (mt' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 AND substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 AND substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 AND substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum( DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 AND substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:09:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as data
  from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 as data
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0  
    END )as val5,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',6), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',6), ',', -1)
    ELSE 0  
    END )as val6,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',7), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',7), ',', -1)
    ELSE 0  
    END )as val7,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',8), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',8), ',', -1)
    ELSE 0  
    END )as val8,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',9), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',9), ',', -1)
    ELSE 0  
    END )as val9,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',10), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',10), ',', -1)
    ELSE 0  
    END )as val10,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',11), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',11), ',', -1)
    ELSE 0  
    END )as val11,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',12), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',12), ',', -1)
    ELSE 0  
    END )as val12,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',13), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',13), ',', -1)
    ELSE 0  
    END )as val13,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',14), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',14), ',', -1)
    ELSE 0  
    END )as val14,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',15), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',15), ',', -1)
    ELSE 0  
    END )as val15,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',16), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',16), ',', -1)
    ELSE 0  
    END )as val16,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',17), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',17), ',', -1)
    ELSE 0  
    END )as val17,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',18), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',18), ',', -1)
    ELSE 0  
    END )as val18,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',19), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',19), ',', -1)
    ELSE 0  
    END )as val19,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',20), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',20), ',', -1)
    ELSE 0  
    END )as val20,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',21), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',21), ',', -1)
    ELSE 0  
    END )as val21,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',22), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',22), ',', -1)
    ELSE 0  
    END )as val22,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',23), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',23), ',', -1)
    ELSE 0  
    END )as val23,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',24), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',24), ',', -1)
    ELSE 0  
    END )as val24,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',25), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',25), ',', -1)
    ELSE 0  
    END )as val25,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',26), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',26), ',', -1)
    ELSE 0  
    END )as val26,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',27), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',27), ',', -1)
    ELSE 0  
    END )as val27,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',28), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',28), ',', -1)
    ELSE 0  
    END )as val28,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',29), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',29), ',', -1)
    ELSE 0  
    END )as val29,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',30), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',30), ',', -1)
    ELSE 0  
    END )as val30 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:13:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0  
    END )as val5 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:13:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0  
    END )as val5 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:13:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0  
    END )as val5 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:13:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1' at line 10 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',5), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1)
    ELSE 0  
    END )as val5 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:14:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 11 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:14:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 11 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 01:14:37 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 111
ERROR - 2021-05-28 04:14:55 --> Severity: Warning --> rtrim() expects at most 2 parameters, 3 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 112
ERROR - 2021-05-28 04:14:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:15:02 --> Severity: Warning --> rtrim() expects at most 2 parameters, 3 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 112
ERROR - 2021-05-28 04:15:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:15:06 --> Severity: Warning --> rtrim() expects at most 2 parameters, 3 given D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 112
ERROR - 2021-05-28 04:15:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:15:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 01:15:43 --> Severity: error --> Exception: syntax error, unexpected '=' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 108
ERROR - 2021-05-28 04:15:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 01:16:59 --> Severity: error --> Exception: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting ']' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 108
ERROR - 2021-05-28 04:17:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE  DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE  DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE  DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE  DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:17:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum( WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum( WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum( WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum( WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:17:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0  
    END )as val1,(
    ELSE 0  
    END )as val2,(
    ELSE 0  
    END' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,(
    ELSE 0  
    END )as val1,(
    ELSE 0  
    END )as val2,(
    ELSE 0  
    END )as val3,(
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:17:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0  
    END )as val1,(sum
    ELSE 0  
    END )as val2,(sum
    ELSE 0  
 ' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,(sum
    ELSE 0  
    END )as val1,(sum
    ELSE 0  
    END )as val2,(sum
    ELSE 0  
    END )as val3,(sum
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:18:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:21:41 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:22:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as' at line 7 - Invalid query: SELECT
    COUNT(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd 
    GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:22:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as' at line 7 - Invalid query: SELECT
    COUNT(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd 
    GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:22:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as' at line 7 - Invalid query: SELECT
    COUNT(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd 
    GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:22:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as' at line 7 - Invalid query: SELECT
    COUNT(t.dd)  as total_dates
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd 
    GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:23:32 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,mt_financial_data.data
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:23:56 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,sum(mt_financial_data.data) as data
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:23:57 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,sum(mt_financial_data.data) as data
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:31:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:31:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:33:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
    SELECT
    mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
      ELSE 0  
      END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
      ELSE 0  
      END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
      ELSE 0  
      END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
      ELSE 0  
      END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
      ELSE 0  
      END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
      ELSE 0  
      END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
      ELSE 0  
      END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
      ELSE 0  
      END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
      ELSE 0  
      END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
      ELSE 0  
      END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
      ELSE 0  
      END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
      ELSE 0  
      END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
      ELSE 0  
      END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
      ELSE 0  
      END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
      ELSE 0  
      END )as val4,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
      ELSE 0  
      END )as val4 
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
    SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data 
    WHERE (financial_data_consignor_payout >0) 
    GROUP BY financial_data_user_id,financial_data_createdon
    ) as mt_financial_data
    on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
    GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:33:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
    (
    SELECT registered_sale_user_id
    FROM mt_registered_sale 
    ' at line 3 - Invalid query: 
    SELECT
    mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
    SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
    FROM mt_financial_data 
    WHERE (financial_data_consignor_payout >0) 
    GROUP BY financial_data_user_id,financial_data_createdon
    ) as mt_financial_data
    on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
    GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:49:26 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( Array,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( Array,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( Array,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( Array,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as data
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 04:50:50 --> Query error: Unknown column 't.financial_data_consignor_payout' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,(t.financial_data_consignor_payout) as value
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:50:51 --> Query error: Unknown column 't.financial_data_consignor_payout' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,(t.financial_data_consignor_payout) as value
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:50:51 --> Query error: Unknown column 't.financial_data_consignor_payout' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,(t.financial_data_consignor_payout) as value
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 04:50:52 --> Query error: Unknown column 't.financial_data_consignor_payout' in 'field list' - Invalid query: SELECT
    COUNT(t.dd)  as total_dates,(t.financial_data_consignor_payout) as value
    FROM
    ( 
    SELECT
    COUNT(financial_data_createdon) AS dd FROM mt_financial_data
    GROUP BY DATE_FORMAT(financial_data_createdon,'%c/%d/%Y')
  ) AS t
ERROR - 2021-05-28 05:19:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,','1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,','1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,','2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,','2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,','3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,','3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,','4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,','4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 05:20:19 --> Query error: Unknown column 'mt_financial_data.financial_data_createdon' in 'group statement' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout > 0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_createdon 
ERROR - 2021-05-28 02:21:00 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 05:23:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 05:23:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( subs' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 05:23:53 --> Query error: Incorrect parameter count in the call to native function 'substring_index' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ()
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ()
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ()
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ()
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 05:23:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_inde' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 05:29:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,','' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') == 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') == 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') == 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') == 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 02:32:32 --> Severity: error --> Exception: syntax error, unexpected '" THEN substring_index ( subst' (T_CONSTANT_ENCAPSED_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 02:32:45 --> Severity: error --> Exception: syntax error, unexpected 'NULL' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 02:32:53 --> Severity: error --> Exception: syntax error, unexpected 'NULL' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:02:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:18:39 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:18:48 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = Array THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:19:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:46:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:47:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 21:47:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1)
    ELSE 0  
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1)
    ELSE 0  
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1)
    ELSE 0  
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') =  THEN substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1)
    ELSE 0  
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  WHERE (financial_data_consignor_payout >0) 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 19:26:15 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) D:\XAMMP\htdocs\divine_dev\application\models\Model_sale.php 129
ERROR - 2021-05-28 23:07:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.d' at line 1 - Invalid query: sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:07:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.d' at line 1 - Invalid query: sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:08:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.d' at line 1 - Invalid query: sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:08:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'SUM (CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.' at line 1 - Invalid query: SUM (CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:08:37 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:08:42 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:08:50 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:08:52 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:09:02 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:09:04 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:09:04 --> Severity: error --> Exception: Call to a member function result_array() on string D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 117
ERROR - 2021-05-28 23:21:19 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_createdon) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id  
ERROR - 2021-05-28 23:21:55 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 23:21:57 --> Query error: Unknown column 'mt_financial_data.data' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.data ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 23:30:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
  (
  SELECT registered_sale_user_id
  FROM mt_registered_sale 
  WHERE (r' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner, 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 20:34:59 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 114
ERROR - 2021-05-28 23:40:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:41:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:41:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1,
ERROR - 2021-05-28 23:42:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1
ERROR - 2021-05-28 23:42:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1
ERROR - 2021-05-28 23:44:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data 
ERROR - 2021-05-28 23:44:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data 
ERROR - 2021-05-28 23:45:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:45:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:45:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:45:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:45:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:45:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:46:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_c' at line 2 - Invalid query: SELECT 
      sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.financial_data_createdon ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021'' THEN   substring_index ( substring_index ( mt_financial_data.financial_data_consignor_payout,',',1), ',', -1) 
      ELSE 0
      END )as val1 
      FROM mt_financial_data
ERROR - 2021-05-28 23:50:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE 0
    END )as val1sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE 0
    END )as val2sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE 0
    END )as val3sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE 0
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 20:55:44 --> Severity: error --> Exception: syntax error, unexpected '0' (T_LNUMBER) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 112
ERROR - 2021-05-28 23:56:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financia' at line 4 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 23:57:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_d' at line 3 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    END )as val1,
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    END )as val2,
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    END )as val3,
    ELSE sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 23:58:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'THEN   substring_index ( substring_index ( mt_financial_data.value,',',5), ',', ' at line 2 - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',5), ',', -1),'%c/%d/%Y') =  THEN   substring_index ( substring_index ( mt_financial_data.value,',',5), ',', -1) 
  ELSE 0
  END )as val5 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 23:59:42 --> Query error: Unknown column 'abc' in 'field list' - Invalid query: 
  SELECT
  mt_financial_data.financial_data_user_id, mt_signup.signup_firstname,mt_signup.signup_lastname,sum(mt_financial_data.consigner) as consigner,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',1), ',', -1),'%c/%d/%Y') = 5/22/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',1), ',', -1) 
    ELSE abc
    END )as val1,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',2), ',', -1),'%c/%d/%Y') = 5/25/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',2), ',', -1) 
    ELSE abc
    END )as val2,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',3), ',', -1),'%c/%d/%Y') = 5/26/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',3), ',', -1) 
    ELSE abc
    END )as val3,sum(CASE WHEN DATE_FORMAT(substring_index ( substring_index (mt_financial_data.date ,',',4), ',', -1),'%c/%d/%Y') = 5/30/2021 THEN   substring_index ( substring_index ( mt_financial_data.value,',',4), ',', -1) 
    ELSE abc
    END )as val4 
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
  SELECT sum(financial_data_consignor_payout) as consigner,financial_data_user_id,GROUP_CONCAT(financial_data_consignor_payout ORDER BY financial_data_user_id) as value , GROUP_CONCAT(IFNULL(financial_data_createdon,'NULL' ) ORDER BY financial_data_user_id) as date
  FROM mt_financial_data 
  GROUP BY financial_data_user_id,financial_data_createdon
  ) as mt_financial_data
  on mt_financial_data.financial_data_user_id = mt_registered_sale.registered_sale_user_id
  GROUP BY mt_financial_data.financial_data_user_id 
ERROR - 2021-05-28 21:25:46 --> Severity: error --> Exception: syntax error, unexpected 'NULL' (T_STRING) D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 138
ERROR - 2021-05-28 21:52:40 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:53:47 --> Severity: error --> Exception: syntax error, unexpected '.' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:53:48 --> Severity: error --> Exception: syntax error, unexpected '.' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:53:49 --> Severity: error --> Exception: syntax error, unexpected '.' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:53:50 --> Severity: error --> Exception: syntax error, unexpected '.' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:03 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:06 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:19 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:20 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:46 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 21:57:47 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:19 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:20 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:20 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:20 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:20 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:21 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:21 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:01:40 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:57 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:58 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:58 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:59 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:59 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:59 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
ERROR - 2021-05-28 22:03:59 --> Severity: error --> Exception: syntax error, unexpected ',' D:\XAMMP\htdocs\divine_dev\application\controllers\Sale_report.php 109
