<?php

//CONNECTION VARIABLES
    $DSN = 'mysql:host=localhost;dbname=gstore';
    $USER = 'root';
    $PASS = '';
    $OPTIONS = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        
//QUERIES
    $MAIN_QUERY = 'SELECT
                        P.Product_id,
                        P.Product_name,
                        P.Price,
                        P.Product_description,
                        P.Units,
                        P.Picture
                    FROM
                        PRODUCT P
                    ORDER BY 2;';
    

    $PRODUCT_QUERY = 'SELECT
                        P.Product_id,
                        P.Product_name,
                        P.Price,
                        P.Product_description,
                        P.Units,
                        P.Picture
                    FROM
                        PRODUCT P
                    WHERE P.Product_id = :product_id;';

    $USER_QUERY = 'SELECT
                        U.user_id,
                        U.email_id,
                        U.password,
                        U.rol,
                        U.first_name,
                        U.last_name,
                        U.mobile_no
                    FROM
                        USER U;';

    $REGISTER_USER_QUERY = 'INSERT INTO USER (user_id, email_id, password, rol, first_name, last_name, mobile_no) VALUES
                                               (:user_id, :email_id, :password, :rol, :first_name, :last_name, :mobile_no );';

    $UPDATE_TOKEN_QUERY = 'UPDATE USER SET token = :token WHERE USER.user_id = :user_id;';

    $DELETE_TOKEN_QUERY = 'UPDATE USER SET token = null WHERE USER.user_id = :user_id;';

    $GET_USER_FROM_TOKEN_QUERY = 'SELECT
                            U.user_id,
                            U.email_id,
                            U.password,
                            U.rol,
                            U.first_name,
                            U.last_name,
                            U.mobile_no
                            U.token
                        FROM
                            USER U
                        WHERE U.token = :token;';
