<?php

try{
    $pdo = new PDO ('mysql:host=localhost', 'projet_restr', 'Dev_Projet_Restaurant');

    $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);

    if($pdo->exec('CREATE DATABASE restaurant_server') !== false){

        $serveur = new PDO ('mysql:host=localhost;dbname=restaurant_server', 'projet_restr', 'Dev_Projet_Restaurant');

            if($serveur->exec('CREATE TABLE users(
                user_id INT not null PRIMARY KEY AUTO_INCREMENT,
                user_email text not null,
                user_role ENUM(1, 2, 3),
                user_password text not null,
                user_phone INT not null,
                user_gender BOOLEAN null
            )') !== false){

                if($serveur->exec('CREATE TABLE restaurant(
                    restaurant_id INT not null PRIMARY KEY AUTO_INCREMENT,
                    max_rapacity INT not null,
                    stock_reservation INT not null
                )') !== false){

                if($serveur->exec('CREATE TABLE reservation(
                    reservation_id INT not null PRIMARY KEY AUTO_INCREMENT,
                    reservation_date datetime not null,
                    numberOfPeople INT not null,
                    userId INT not null,
                    restaurantId INT not null,
                    FOREIGN KEY (restaurantId) REFERENCES restaurant(restaurant_Id),
                    FOREIGN KEY (userId) REFERENCES users (user_id)
                )') !== false){

                    if($serveur->exec('CREATE TABLE allergies(
                        allergies_id INT not null PRIMARY KEY AUTO_INCREMENT,
                        allergies_list text not null,
                        reservationId INT not null,
                        FOREIGN KEY (reservationId) REFERENCES reservation (reservation_Id)
                    )') !== false){

                            if($serveur->exec('CREATE TABLE meals(
                                meals_id INT not null PRIMARY KEY AUTO_INCREMENT,
                                meals_title varchar(200) not null,
                                meals_description varchar(200) not null,
                                meals_price DOUBLE not null,
                                restaurantId INT not null,
                                FOREIGN KEY (restaurantId) REFERENCES restaurant (restaurant_Id)
                            )') !== false){

                                if($serveur->exec('CREATE TABLE mealsPhoto(
                                    mealsPhoto_id INT not null PRIMARY KEY AUTO_INCREMENT,
                                    mealsPhoto_title VARCHAR(200) not null,
                                    mealsPhoto_image BLOB not null,
                                    mealsId INT not null,
                                    FOREIGN KEY (mealsId) REFERENCES meals (meals_Id)
                                )') !== false){

                                     if($serveur->exec('CREATE TABLE mealsCategory(
                                        mealsCategory_id INT not null PRIMARY KEY AUTO_INCREMENT,
                                        mealsCategory_name VARCHAR(200) not null,
                                        mealsId INT not null,
                                        FOREIGN KEY (mealsId) REFERENCES meals (meals_Id)
                                    )') !== false){

                                        if($serveur->exec('CREATE TABLE menu(
                                            menu_id INT not null PRIMARY KEY AUTO_INCREMENT,
                                            menu_title VARCHAR(200) not null,
                                            menu_price DOUBLE not null,
                                            mealsId INT not null,
                                            FOREIGN KEY (mealsId) REFERENCES meals (meals_Id)
                                        )') !== false){

                                            if($serveur->exec('CREATE TABLE formula(
                                                formula_id INT not null PRIMARY KEY AUTO_INCREMENT,
                                                fromula_name VARCHAR(200) not null,
                                                formula_price DOUBLE not null,
                                                formula_description text not null,
                                                menuId INT not null,
                                                FOREIGN KEY (menuId) REFERENCES menu (menu_Id)
                                            )') !== false){
                                                echo "Installation BDD réussie";
                                            }else{echo "Impossible de créer table formula";}                                        }
                                        }else {echo "Impossible de créer table menu";}
                                        }else{ echo "Impossible de créer table meals";}
                                }else{echo "Impossible de créer table mealsCategory";}
                            }else{echo "Impossible de créer table mealsPhoto";}
                        }else{ echo "Impossible de créer table meals"; }
                    }else{echo "Impossible de créer table restaurant";}
                }else{
                    echo "Impossible de créer table allergies";}
            }else{echo "Impossible de créer table reservation";}
    }catch(PDOException $err){
    $err->getMessage();
}

/*if($serveur->exec('CREATE TABLE administrator(
            admin_id INT not null PRIMARY KEY AUTO_INCREMENT,
            admin_email text not null,
            admin_password text not null
        )') !==false){
*/