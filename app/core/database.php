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
                }else{
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
	public function create_table(){
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
	}


}
