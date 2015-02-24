<?php
class WineTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c; //
    }
    
    public function getWines() {
        // execute a query to get all wines
        $sqlQuery = "SELECT * FROM wine";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve wines");
        }
        
        return $statement;
    }
    
    public function getWineById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM wine WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve wines");
        }
        
        return $statement;
    }
    
    public function insertWine($n, $d, $y, $t, $st) {
        $sqlQuery = "INSERT INTO wine " .
                "(name, description, year, type, servingTemp) " .
                "VALUES (:name, :description, :year, :type, :servingTemp)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "description" => $d,
            "year" => $y,
            "type" => $t,
            "servingTemp" => $st
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert wine");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteWine($id) {
        $sqlQuery = "DELETE FROM wine WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete wine");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateWine($id, $n, $d, $y, $t, $st) {
        $sqlQuery =
                "UPDATE wine SET " .
                "name = :name, " .
                "description = :description, " .
                "year = :year, " .
                "type = :type, " .
                "servingTemp = :servingTemp " .
                "WHERE id = :id";
        
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "description" => $d,
            "year" => $y,
            "type" => $t,
            "servingTemp" => $st,
            "id" => $id
        );
        
        //echo '<pre>';
        //print_r($params);
        //print_r($statement);
        //echo '</pre>';

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
    
    
}



