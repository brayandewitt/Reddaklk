<?php

/**
 * database class
 */

class Database
{
    private function connect()
    {
        $str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($str, DBUSER, DBPASS);
    }
    public function query($query, $data = [], $type = 'object')
    {

        $con = $this->connect();
        $stm = $con->prepare($query);
        if ($stm) {
            $check = $stm->execute($data);
            if ($check) {
                if ($type == 'object') {
                    $type = pdo::FETCH_OBJ;
                } else {
                    $type = pdo::FETCH_ASSOC;
                }

                $result = $stm->fetchAll($type);
                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }

        return false;
    }
    public function create_table()
    {
        //price table

        $query = "
			CREATE TABLE IF NOT EXISTS `prices` (
            `id` int NOT NULL AUTO_INCREMENT,
            `name` varchar(30) NOT NULL DEFAULT '0',
            `price` decimal(10,0) NOT NULL DEFAULT (0),
            `disable` tinytext NOT NULL,
            PRIMARY KEY (`id`)
)           ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 
            COLLATE=utf8mb4_0900_ai_ci;
		";
        $this->query($query);
        // Insert price table

        $query = "
			INSERT INTO `prices` (`id`, `name`, `price`, `disable`) VALUES (1, 'Free', 0, '0');
		";
        $this->query($query);

        //user table
        $query = "
			CREATE TABLE IF NOT EXISTS `users`(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`email`varchar(100) NOT NULL,
			`firstname`varchar(30) NOT NULL,
            `lastname`varchar(30) NOT NULL,
            `password`varchar(255) NOT NULL,
		    `role`varchar(20) NOT NULL,
            `date` date DEFAULT NULL,
			PRIMARY KEY (`id`),
			key `email` (`email`),	
			key `firstname` (`firstname`),	
			key `lastname` (`lastname`),	
			key `date` (`date`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
		";
        $this->query($query);

        //product table
        $query = "
        CREATE TABLE IF NOT EXISTS `product` (
        `id` int NOT NULL AUTO_INCREMENT,
        `users_id` int NOT NULL,
        `name` varchar(100) DEFAULT NULL,
        `category_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
        `description` varchar(1000) DEFAULT NULL,
        `price_id` double DEFAULT NULL,
        `date` date DEFAULT NULL,
        `stock` varchar(10) DEFAULT NULL,
        `color` varchar(20) DEFAULT NULL,
        `tags` varchar(1000) DEFAULT NULL,
        `image1` varchar(1024) DEFAULT NULL,
        `image2` varchar(1024) DEFAULT NULL,
        `image3` varchar(1024) DEFAULT NULL,
        `image4` varchar(1024) DEFAULT NULL,
        `approved` tinytext,
        `published` tinytext,
        PRIMARY KEY (`id`),
        KEY `fk_product_users1_idx` (`users_id`),
        KEY `name` (`name`),
        KEY `date` (`date`),
        KEY `color` (`color`),
        KEY `category` (`category_id`) USING BTREE,
        CONSTRAINT `fk_product_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

        ";
        $this->query($query);
    }
}
