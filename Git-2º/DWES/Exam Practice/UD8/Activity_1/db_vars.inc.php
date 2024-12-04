<?php

    $DSN = 'mysql:host=localhost;dbname=gstore';
    $USER = 'root';
    $PASS = '';
    $OPTIONS = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    $MAIN_QUERY = 'SELECT
                        P.Product_id,
                        P.Product_name,
                        P.Units,
                        P.Picture,
                        P.Weight,
                        P.Category_id,
                        P.Price,
                        P.Product_description,
                        P.Manufacturer_id
                    FROM
                        PRODUCT P;';
                    
    $PRODUCT_ID_QUERY = 'SELECT
                        P.Product_name,
                        P.Units,
                        P.Picture,
                        P.Weight,
                        P.Category_id,
                        P.Price,
                        P.Product_description,
                        P.Manufacturer_id
                    FROM
                        PRODUCT P
                    WHERE
                        P.Product_id = :product_id
                    ;';