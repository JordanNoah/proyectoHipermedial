<?php
class Db {
    protected static $connection;
    public function connect() {
        if(!isset(self::$connection)) {
            self::$connection = new mysqli('localhost',"root","2352169","proyecto");
            mysqli_query(self::$connection,"SET NAMES 'utf8'");
        }
        if(self::$connection === false) {
            return false;
        }
        return self::$connection;
    }
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
       $result = $connection -> query($query);

if (!$result){
   echo '[0,"'.$connection ->error.'"]';
   $aux["query"]=$query;
   $aux["error"]=$connection ->error;
   $connection -> query("INSERT INTO errores (info,mensaje) VALUES ('Error en query','".http_build_query($aux)."')");
   die;
}

        return $result;
    }

    public function query_id($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
       $result = $connection -> query($query);

        if (!$result){
           echo '[0,"'.$connection ->error.'"]';
           $aux["query"]=$query;
           $aux["error"]=$connection ->error;
           $connection -> query("INSERT INTO errores (info,mensaje) VALUES ('Error en queryid','".http_build_query($aux)."')");
           die;
        }

        return $connection->insert_id;
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
        return $connection -> real_escape_string($value);
    }
}

?>