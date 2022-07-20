<?php

class Db {

    // The database connection
    protected static $connection;
    
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            self::$connection = new mysqli('localhost','root', '', 'twitter_clone');
        }
 
        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }
 
   
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();
 
        // Query the database
        $result = self::$connection -> query($query);
 
        return $result;
    }
 

    public function select($query) {

        $rows = array();
        $result = $this -> query($query);

        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }


    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}

?>