<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel";
            $database = "N00134378";
            $username = "N00134378";
            $password = "N00134378";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            //create PDO objectwith 3 arguements (dsn, username and password of database being accessed)
            
            if (!Connection::$connection) { //check connection
                die("Could not connect to database"); 
            }
        }
        //if connection is unsuccessful exit programme and pring message
        return Connection::$connection;
    }
}
